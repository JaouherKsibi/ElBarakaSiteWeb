<?php session_start();
include("Agent.php");
if (isset($_SESSION['user'])) {
    $user=unserialize($_SESSION['user']);
}else {
    header("Location: ./login.php");
}
include_once('GestionPannierSession.php');
$gestion=new GestionPannierSession();
$lignes=$gestion->getAllLignePanierByIdUser($user->getId());
echo('pannier');
var_dump($_SESSION['pannier']);
echo('bd');
var_dump($lignes);
if(empty($lignes)&&!empty($_SESSION['pannier'])){
    foreach ($_SESSION['pannier'] as $lignePannierSession) {
        $gestion->addLignePanier($lignePannierSession[0],$lignePannierSession[1],$lignePannierSession[2],$lignePannierSession[3]);
    }
}
elseif (empty($_SESSION['pannier'])&& !empty($lignes)){
    foreach ($lignes as $ligne) {
        $gestion->supprimerLigneById($ligne['id']);
    }
}elseif (!empty($_SESSION['pannier'])&& !empty($lignes)){
    foreach ($lignes as $ligne) {//les lignes de la base de données 
        $i=0;
        foreach ($_SESSION['pannier'] as $unit) {
            
            if ($ligne['idProduit']==$unit[1]){//tester si le client a déja acheté le produit 
                
                    $i=1;        //le client a deja acheté le produit   
                    if ($ligne['quantite']!=$unit[2]) {
                        
                        $gestion->modifierQuantite($ligne['id'],$unit[2]);
                        $gestion->modifierPrixTot($ligne['id'],$unit[3]);
                    }     
            }
            
        }
        if ($i==0) {
                $gestion->supprimerLigneById($ligne['id']);
            }
    }
}





/*
foreach ($lignes as $ligne) {
    if (!empty($_SESSION['pannier'])) {
        $i=0;
        foreach ($_SESSION['pannier'] as $unit) {
            if ($unit[1]==$ligne['idProduit']){
                    $i=1;                
            }
            if ($i==0) {
                $gestion->supprimerLigne($ligne['idPanier'],$ligne['idProduit']);
            }
        }
    }
    else {
        $gestion->supprimerLigne($ligne['idPanier'],$ligne['idProduit']);
    }
}*/
/*if ($lignes==null) {
    foreach ($_SESSION['pannier'] as $unit) {
        $gestion->addLignePanier($unit[0],$unit[1],$unit[2],$unit[3]);
    }
}/*
else {
    /*foreach ($lignes as $ligne) {
        
        if (!empty($_SESSION['pannier'])) {
            $i=0;
            foreach ($_SESSION['pannier'] as $unit) {
                if ($unit[1]==$ligne['idProduit']){
                    $i=1;
                }
            }
            if ($i==0) {
            $gestion->supprimerLigne($ligne['idPanier'],$ligne['idProduit']);
            }
        }
        else {
            $gestion->supprimerLigne($ligne['idPanier'],$ligne['idProduit']);
        }
    }
    foreach ($_SESSION['pannier'] as $unit) {
        $ki=0;
        foreach ($lignes as $ligne) {
            if($unit[0]==$ligne['idPanier'] && $unit[1]==$ligne['idProduit']){
                if ($unit[2] != $ligne['quantite']) {
                    $gestion->modifierQuantite($ligne['id'],$unit[2]);
                }
                $ki=1;
            }
            if ($ki==0) {
                $gestion->addLignePanier($unit[0],$unit[1],$unit[2],$unit[3]);
            }
    }
    
    
}
}*/

session_destroy();
header('Location: ../login.php');
exit;
?>


