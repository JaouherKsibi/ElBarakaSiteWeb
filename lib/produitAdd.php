<?php session_start();
    #recupération des données 
    $nomproduit=$_POST['nomproduit'];
    $descriptionproduit=$_POST['descriptionproduit'];
    $nombreEnStock=(integer)$_POST['nombreEnStock'];
    $prix=(float)$_POST['prix'];
    move_uploaded_file($_FILES['imageProduit']['tmp_name'],"C:\wamp64\www\siteWebStage\img/".$_FILES['imageProduit']['name']);
    $imageProduit="C:\wamp64\www\siteWebStage\img/".$_FILES['imageProduit']['name'];
    #$imageProduit=$_POST['imageProduit'];
    $idCategorie=(integer)$_POST['idCategorie'];
    var_dump($nomproduit);
    var_dump($descriptionproduit);
    var_dump($nombreEnStock);
    var_dump($prix);
    #echo("imageProduit".$imageProduit);
    var_dump($idCategorie);
    #connexion base de données 
    $servername = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname='stage_ete';
    try {
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        #insertion dans la bdd
        $sql="INSERT INTO produit (nom,idcategorie,description,image,nombreEnStock,prix) VALUES(:nomproduit,:idcategorie,:descriptionproduit,:image,:nombreEnStock,:prix)";
        $stmt=$dbco->prepare($sql);
       $stmt->execute(['nomproduit'=>$nomproduit,'idcategorie'=>$idCategorie,'descriptionproduit'=>$descriptionproduit,'image'=>$imageProduit,'nombreEnStock'=>$nombreEnStock,'prix'=>$prix]);
       header('Location: ../accueil.php');
        //code...
    } catch (\Throwable $th) {
        var_dump($th);
    }
    
?>