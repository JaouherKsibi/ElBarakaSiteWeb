<?php session_start();
    include("./GestionAdmin.php");
    $gestionAdmin=new GestionAdmin();
    if (isset($_POST['id'])) {
        $id=$_POST['id'];
    }
    if (isset($_POST['nom'])) {
        $gestionAdmin->modifierNomAdmin($id,$_POST['nom']);
        header('Location: ./modifierAdmin.php?id='.$id);
    }
    if (isset($_POST['prenom'])) {
        $gestionAdmin->modifierPrenomAdmin($id,$_POST['prenom']);
        header('Location: ./modifierAdmin.php?id='.$id);
    }
    if (isset($_POST['email'])) {
        $gestionAdmin->modifierAdresseEmail($id,$_POST['email']);
        header('Location: ./modifierAdmin.php?id='.$id);
    }
    if (isset($_POST['psw'])) {
        $gestionAdmin->modifierMotDePasse($id,md5($_POST['psw']));
        header('Location: ./modifierAdmin.php?id='.$id);
    }
    if (isset($_POST['numcin'])) {
        $gestionAdmin->modifierNumCin($id,$_POST['numcin']);
        header('Location: ./modifierAdmin.php?id='.$id);
    }
    if (isset($_POST['numtel'])) {
        $gestionAdmin->modifierNumTel($id,$_POST['numtel']);
       header('Location: ./modifierAdmin.php?id='.$id);
    }
    if(isset($_GET['id'])){
        $gestionAdmin->supprimerAdminById($_GET['id']);
        header('Location: ../accueil.php');
    }
?>