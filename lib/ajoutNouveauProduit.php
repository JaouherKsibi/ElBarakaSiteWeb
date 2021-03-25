<?php session_start();
include("Agent.php");
if (isset($_SESSION['user'])) {
  $user=unserialize($_SESSION['user']);
}else {
  header("Location: ../login.php");
}
include("../GestionProduit.php");
$gb=new GestionProduit();
$stmt3=$gb->getAllCategories();
$user=unserialize($_SESSION['user']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Accueil</title>
    <style >
        *{
            background-image: url(https://www.marminpaysage.fr/wp-content/uploads/2017/04/pepiniere-marmin-olonne-vegetaux-arbres.jpg);
        }
        .formCentre{
            padding: 50px 50px 50px 50px;
            background-color: red;
            width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%); 
            color:black;   
         }
    </style>
</head>
<body>
<header>
<nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a href="index.php" class="navbar-item" href="#">
            <img src="../img/logo1.jpg" width="112" height="28">
          </a>
      
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a href="index.php" class="navbar-item">
              Home
            </a>
      
            <a class="navbar-item">
              Documentation
            </a>
      
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                More
              </a>
      
              <div class="navbar-dropdown">
                <a class="navbar-item">
                  About
                </a>
                <a class="navbar-item">
                  Jobs
                </a>
                <a class="navbar-item">
                  Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  Report an issue
                </a>
              </div>
            </div>
          </div>
      
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <a><?php echo($user->getNom().' '.$user->getPrenom());?></a>
                <a href="./deconnexion.php" class="button is-light">
                  Log Out
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>

</header>
<div class="container-fluid">
    <div class="row" style="margin: auto;padding: auto;">
        <!--div  style="margin:auto;"-->
        <form class="formCentre" action="./produitAdd.php" method="POST" enctype="multipart/form-data">
            <h1>Ajout d'un nouveau produit </h1>
            <div class="form-group">
                <label for="nomproduit">Nom du nouveau produit </label>
                <input type="text" class="form-control" id="nomproduit" placeholder="S'il vous plait d'entrer le nom  du nouveau produit" name="nomproduit" required>
                <label for="descriptionproduit">Description du nouveau produit </label>
                <input type="text" class="form-control" id="descriptionproduit" placeholder="S'il vous plait d'entrer la description du nouveau produit" name="descriptionproduit" required>
                <label for="nombreEnStock">Nombre En Stock  </label>
                <input type="text" class="form-control" id="nombreEnStock" placeholder="nombre en stock " name="nombreEnStock" required>
                <label for="prix">Prix</label>
                <input type="text" class="form-control" id="prix" placeholder="nombre en stock " name="prix" required>
                <label for="imageProduit">Image Produit</label>
                <input type="file" class="form-control" id="imageProduit" name="imageProduit" required>
                <label for="idCategorie">categorie</label>
                <select class="custom-select mr-sm-2" id="idCategorie" name="idCategorie" required>
                    <?php 
                    foreach($stmt3 as $choix){
                        echo('<option value="'.$choix['id'].'">'.$choix['nomcategorie'].'</option>');
                    } ?>
                </select>   
            
            </div>
            <button type="submit" class="btn btn-primary">ajouter</button>
        </form>
    </div>
</div>
</body>