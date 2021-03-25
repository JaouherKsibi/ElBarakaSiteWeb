<?php session_start();
    include("Agent.php");
    if (isset($_SESSION['user'])) {
      $user=unserialize($_SESSION['user']);
  }else {
      header("Location: ../login.php");
  }
    include("../GestionProduit.php");
    $gb=new GestionProduit();
        $stmt=$gb->getAllCategories();
   /* include("GestionCategorie.php");
    $idCat=$_GET['id'];
    $gb=new GestionCategorie();
    $cat=$gb->getCategorieById($idCat);*/
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
            <img src="img/logo1.jpg" width="112" height="28">
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
    <div class="row" >
         <?php foreach($stmt as $categorie){?>
            <div class="col-lg-4">
            <div class="thumbnail"> 
                        <?php
                            echo('<img src="https://th.bing.com/th/id/Rf32e99db378cd3e447ae58afe5982ef2?rik=%2bfC9IaUqGrropw&pid=ImgRaw">');/*'.$produit['image'].'*/
                        ?>
                        <div class="caption"> 

                            <?php
                            echo("<h3>".$categorie['nomcategorie']."</h3>");
                            ?>
                            <p>
                                <?php 
                                echo("<a href='./modifierCategorie1.php?id=".$categorie['id']."' class='btn btn-success'>modifier</a>"); 
                                echo('<a href="supprimerCategorie.php?id='.$categorie['id'].'" class="btn btn-danger pull-right">supprimer</a> ');?>

                            </p> 

                        </div> 
            </div>
            </div>
        <?php }?>
        
    </div>
        
    </div>
</body>