<?php session_start();
    include("../GestionProduit.php");
    $gestionProduit=new GestionProduit();
    if (isset($_POST['id'])) {
        $id=$_POST['id'];
    }
    if (isset($_POST['nomProduit'])) {
        $gestionProduit->modifierNomProduit($id,$_POST['nomProduit']);
        header('Location: ./produitModifier.php?id='.$id);
    }
    if (isset($_POST['idCategorie'])) {
        $gestionProduit->modifierIdCategorie($id,$_POST['idCategorie']);
        header('Location: ./produitModifier.php?id='.$id);
    }
    if (isset($_POST['description'])) {
        $gestionProduit->modifierDescriptionProduit($id,$_POST['description']);
        header('Location: ./produitModifier.php?id='.$id);
    }
    if (isset($_FILES['imageProduit'])) {
        move_uploaded_file($_FILES['imageProduit']['tmp_name'],"C:\wamp64\www\siteWebStage\img/".$_FILES['imageProduit']['name']);
        $imageProduit="C:\wamp64\www\siteWebStage\img/".$_FILES['imageProduit']['name'];
        $gestionProduit->modifierImageProduit($id,$imageProduit);
        header('Location: ./produitModifier.php?id='.$id);
    }
    if (isset($_POST['prix'])) {
        $gestionProduit->modifierPrixProduit($id,$_POST['prix']);
        header('Location: ./produitModifier.php?id='.$id);
    }
    if (isset($_POST['nombreEnStock'])) {
        $gestionProduit->modifierNombreEnStockProduit($id,$_POST['nombreEnStock']);
       header('Location: ./produitModifier.php?id='.$id);
    }
    if(isset($_GET['id'])){
        $gestionProduit->supprimerProduitAvecId($_GET['id']);
        header('Location: ../accueil.php');
    }
?>