<?php session_start();
include_once('../GestionProduit.php');
$gestion_produit=new GestionProduit();
    if (isset($_GET['del'])) {
        $i=$_GET['del'];
        $quantite=(int)$_SESSION['pannier'][$i][2];
        $quantiteEnStock=(int)($gestion_produit->getNombreEnStock($_SESSION['pannier'][$i][1]))['nombreEnStock'];
        echo("quantite:  ".$quantite);
        echo("quantite en stock : ".$quantiteEnStock);
        $gestion_produit->modifierNombreEnStockProduit($_SESSION['pannier'][$i][1],$quantiteEnStock+(int)$quantite);
        unset($_SESSION['pannier'][$i]);

        header('Location: ./afficherPannier.php');
    }
    if (isset($_GET['val'])) {
        
    }

?>