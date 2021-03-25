<?php session_start();
include("Agent.php");
include("GestionPannierSession.php");
include_once("../GestionProduit.php");
if (isset($_SESSION['user'])) {
    $user=unserialize($_SESSION['user']);
}else {
    header("Location: ./login.php");
}
$gestion=new GestionPannierSession();
$id=$_GET['id'];
$test=0;
$quantite=(int)$_POST['quantite'];
$g=new GestionProduit();
$prixUn=$g->getPrixByIdProduit($id);
foreach ($_SESSION['pannier'] as $ligne) {
    if($ligne[1]==$id){
        $q=array_search($ligne,$_SESSION['pannier']);
        $_SESSION['pannier'][$q][2]=(int)($_SESSION['pannier'][$q][2])+$quantite;
        $_SESSION['pannier'][$q][3]=($_SESSION['pannier'][$q][2])*$prixUn;
        $g->modifierNombreEnStockProduit($id,($g->getNombreEnStock($id)['nombreEnStock'])-$quantite);
        $test=1;
        header('Location: ../accueil.php');
    }
}

if ($test==0) {
    $gestion->addProduitToPannier($user->getId(),$id,$quantite);
    $g->modifierNombreEnStockProduit($id,($g->getNombreEnStock($id)['nombreEnStock'])-$quantite);
    header('Location: ../accueil.php');
}

?>
<h1></h1>