<?php 
    $servername = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname='stage_ete';
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numtel = $_POST['numtel'];
    $email = $_POST['email'];
    $psw=$_POST['password'];
    $verifie=$_POST['verifie'];
    $role=$_POST['role'];
    $numero_carte_identite=$_POST['numcin'];
    $vkey=md5(time().$nom);
    $psw=md5($psw);
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO agent(nom,prenom,numero_de_telephone,email,mot_de_passe,cle_de_verific,numero_carte_identite,role,verifiee) VALUES('$nom','$prenom','$numtel','$email','$psw','$vkey','$numero_carte_identite','$role',$verifie)";        
    $dbco->exec($sql);
    header('Location: ../accueil.php');
?>