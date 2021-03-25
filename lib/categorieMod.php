<?php session_start();
    include("Agent.php");
    $user=unserialize($_SESSION['user']); 
    include("../GestionProduit.php");
    $id=$_POST['idCategorie'];
    $nom=$_POST['nomCategorie'];
    $servername = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname='stage_ete';
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql1 = "UPDATE categorie SET nomcategorie=:n1 WHERE id=:n2";
    $stmt1= $dbco->prepare($sql1);
    $stmt1->bindParam('n1',$nom);
    $stmt1->bindParam('n2',$id);
    $stmt1->execute();
    header('Location: ../accueil.php');
?>