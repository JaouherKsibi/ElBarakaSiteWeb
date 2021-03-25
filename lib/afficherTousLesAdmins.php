<?php session_start();
    include("./Agent.php");
    include('./GestionAdmin.php');
    if (isset($_SESSION['user'])) {
      $user=unserialize($_SESSION['user']);
  }else {
      header("Location: ../login.php");
  }
    $gb=new GestionAdmin();
    $admins=$gb->getAllAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Accueil</title>
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
    <!-- ici on trouvera tout l'apperçu qui s'affichera au propriétaire du site web  -->
    
        <div class="container" style="margin-top: 20px;">
            <div class="row" > 
                <?php 
                        foreach ($admins as $admin ) {?>
                        <div class="col-md-4"> 
                            <div class="thumbnail">
                                <?php
                                    echo('<img src="https://uploads.skyhighnetworks.com/2016/02/03175812/blog-image-unknown-person.jpg">');/*'.$produit['image'].'*/
                                ?>
                                
                                <div class="caption"> 
                                    <?php
                                    echo("<h3>".$admin['nom']." ".$admin['prenom']."</h3>");
                                    echo("<h4 >".$admin["email"]."</h4>");/* afficher le nom de la categorie  */
                                    ?>
                                    <p> 
                                    <?php
                                        echo("<a href='./adminModifier.php?id=".$admin['id']."' class='btn btn-success'>supprimer</a>"); ?>
                                    <?php
                                        echo("<a href='./modifierAdmin.php?id=".$admin['id']."' class='btn btn-success'>modifier</a>"); ?>
                                        <!--a href="./lib/produitModifier.php" class="btn btn-success">modifier</!--a--> 
                                    </p> 
                                </div> 
                            </div>
                            
                    </div>
                        </div>
                    <?php }?>
                </div>

            </div>
        </div>

</body>