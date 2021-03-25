<?php session_start();
    include("Agent.php");
    $user=unserialize($_SESSION['user']); 
    $id=$_GET['id'];
    $servername = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname='stage_ete';
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $sql1 = "DELETE FROM  categorie  WHERE id=:n2";
    $stmt1= $dbco->prepare($sql1);
    $stmt1->bindParam('n2',$id);
    $stmt1->execute();
    $sql2 = "DELETE FROM  produit  WHERE idcategorie=:n2";
    $stmt2= $dbco->prepare($sql2);
    $stmt2->bindParam('n2',$id);
    $stmt2->execute();
    header('Location: ../accueil.php');
?>