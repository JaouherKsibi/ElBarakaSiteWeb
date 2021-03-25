<?php session_start();
    include("GestionCategorie.php");
    $nomNouvelleCategorie=$_POST['nomCategorie'];
    $cat=new Categorie(1,$nomNouvelleCategorie);
    $cat->setNomCategorie($nomNouvelleCategorie);
    $cat->setIdCategorie(1);
    $gb=new GestionCategorie();
    $gb->addCategorie($cat);
    header('Location: ../accueil.php');
?>
