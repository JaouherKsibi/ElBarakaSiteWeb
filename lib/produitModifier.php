<?php session_start();
include("Agent.php");
if (isset($_SESSION['user'])) {
  $user=unserialize($_SESSION['user']);
}else {
  header("Location: ../login.php");
}
include("../GestionProduit.php");
if (isset($_GET['id'])) {
    $id=$_GET['id'];
}

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
    <!--link rel="stylesheet" href="../css/bootstrap.css"-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Accueil</title>
    <style >
        
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
<div class="container">
    <section>
        <h1>Modifier Nom Produit </h1>
        <form action="modifierProduit.php" method="POST">
            <?php echo('<input type="text"  value="'.$id.'" hidden name="id">');?>
            <input class="form-control" type="text" name="nomProduit" id="nomProduit" required>
            <button class="btn" style="margin-top: 10px;" type="submit">modifier</button>
        </form>
    </section>
    <hr>
    <section>
        <h1>Modifier  Categorie </h1>
        <form action="modifierProduit.php" method="POST">
            <?php echo('<input type="text"  value="'.$id.'" hidden name="id">');?>
            <select class="form-control" id="idCategorie" name="idCategorie" required>
                    <?php 
                    foreach($stmt3 as $choix){
                        echo('<option value="'.$choix['id'].'">'.$choix['nomcategorie'].'</option>');
                    } ?>
                </select>   
            <button class="btn" style="margin-top: 10px;" type="submit">modifier</button>
        </form>
    </section>
    <hr>
    <section>
        <h1>Modifier la description </h1>
        <form action="modifierProduit.php" method="POST">
            <?php echo('<input type="text"  value="'.$id.'" hidden name="id">');?>    
            <input class="form-control" type="text" name="description" id="description" required>
            <button class="btn" style="margin-top: 10px;" type="submit">modifier</button>
        </form>
    </section>
    <hr>
    <section>
        <h1>Modifier l'image du Produit </h1>
        <form action="modifierProduit.php" method="POST" enctype="multipart/form-data">
            <?php echo('<input type="text"  value="'.$id.'" hidden name="id">');?>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="imageProduit" id="imageProduit" required>
                <label class="custom-file-label" for="imageProduit">Choose file</label>
            </div>
            <button class="btn" style="margin-top: 10px;" type="submit">modifier</button>
        </form>
    </section>
    <hr>
    <section>
        <h1>Modifier le prix du Produit </h1>
        <form action="modifierProduit.php" method="POST">
            <?php echo('<input type="text"  value="'.$id.'" hidden name="id">');?>
            <input class="form-control" type="text" name="prix" id="prix" required>
            <button class="btn" style="margin-top: 10px;" type="submit">modifier</button>
        </form>
    </section>
    <hr>
    <section>
        <h1>Modifier le stock du Produit </h1>
        <form action="modifierProduit.php" method="POST">
            <?php echo('<input type="text"  value="'.$id.'" hidden name="id">');?>
            <input class="form-control" type="number" name="nombreEnStock" id="nombreEnStock" required>
            <button class="btn" style="margin-top: 10px;" type="submit">modifier</button>
        </form>
    </section>
    <hr>
    
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>