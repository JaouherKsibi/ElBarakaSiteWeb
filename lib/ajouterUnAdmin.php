<?php session_start();
include("Agent.php");
include("../GestionProduit.php");
if (isset($_SESSION['user'])) {
  $user=unserialize($_SESSION['user']);
}else {
  header("Location: ../login.php");
}
$gb=new GestionProduit();
$stmt3=$gb->getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
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
    <!--div class="row"-->
        <form action="./adminAdd.php" method="POST" enctype="multipart/form-data">
            <h1>Ajout d'un admin </h1>
                <label for="nom">Nom du Admin </label>
                <input class="form-control"type="text" class="form-control" id="nom" placeholder="S'il vous plait d'entrer le nom" name="nom" required>
                <label for="prenom">Prenom Admin</label>
                <input class="form-control" type="text" class="form-control" id="prenom" placeholder="S'il vous plait d'entrer le prenom" name="prenom" required>
                <label for="numcin">Numéro Carte Identité National </label>
                <input class="form-control" type="text" class="form-control" id="numcin" placeholder="Numéro Carte Identité National ..." name="numcin" required>
                <label for="numtel">Numéro de Téléphone</label>
                <input class="form-control" type="text" class="form-control" id="numtel" name="numtel" required>
                <label for="email">email</label>
                <input class="form-control" type="email" class="form-control" id="email" placeholder="foulenBenFoulen@entreprise.com" name="email" required>
                <label for="password">password</label>
                <input class="form-control" type="password" class="form-control" id="password" name="password" required>
                <input type="text" name="role" value="admin" hidden> 
                <input type="text" name="verifie" value="1" hidden> 
            <button type="submit" class="btn btn-primary">ajouter</button>
        </form>
    <!--div-->
</div>
</body>
</html>