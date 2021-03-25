<?php session_start();
include("lib/Agent.php");
if (isset($_SESSION['user'])) {
    $user=unserialize($_SESSION['user']);
}else {
    header("Location: ./login.php");
}

/*$gestion=new GestionProduit();
$stmt=$gestion->getAllCategories();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Accueil</title>
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
            <button id="pannier1" style="background-color: transparent;border:transparent;"><div class="navbar-item"><i class="fa fa-shopping-cart" style="font-size:24px;margin-right: 5px;"></i>pannier</div></button>
            <button id="user1" style="background-color: transparent;border:transparent;"><div class="navbar-item"> <i class="fa fa-user-circle-o" style="font-size:24px;margin-right: 5px;"></i><?php echo($user->getNom().' '.$user->getPrenom());?></div></button>
            <div class="navbar-item">
              <div class="buttons">
                <a href="./lib/deconnexion.php" class="button is-light">
                  Log Out
                </a>
              </div>
            </div>
            
          </div>
        </div>
      </nav>

</header>
    <?php
        /*require_once("includes/header.php");*/
        /*include("lib/Produit.php");
        include("lib/Categorie.php");*/
        include("GestionProduit.php");
        $gb=new GestionProduit();
        $stmt=$gb->getAllCategories();
        /*$produits=$stmt->fetchAll();*/
    ?> 
    <!-- ici on trouvera tout l'apperçu qui s'affichera à nos admins  -->
    <?php if($user->getRole()=='admin'){?>
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-3">
                    <div class="list-group"> 
                        <div class="list-group-item active"><span>Actions sur produit</span></div> 
                        <a href="" class="list-group-item">ajouter un produit</a>
                        <a href="" class="list-group-item">modifier un produit</a>
                        <div class="list-group-item active"><span>Actions sur categorie</span></div> 
                        <a href="./ajouterUneCategorie.php" class="list-group-item">ajouter une categorie</a>
                        <a href="./lib/modifierCategorie.php" class="list-group-item">modifier une categorie</a>
                    </div> 
                </div>
                <div class="col-md-9"> 
                    <?php 
                        $produits=$gb->getAllProduit();
                        foreach ($produits as $produit ) {?>
                        <div class="col-md-4"> 
                            <div class="thumbnail"> 
                                <?php if ($produit['nombreEnStock']==0) {?>
                                    
                            

                                    <div> 
                                    <span class="badge"> Rupture </span> 
                                    

                                    </div> 
                                <?php }?>
                                <?php if ($produit['nombreEnStock']>0) {?>

                                    <div> 

                                    <span class="badge"> En stock </span> 

                                    </div> 

                            
                                <?php }?>
                                <div> 

                                <br> 

                            </div> 
                            <?php
                                echo('<img src="https://th.bing.com/th/id/Rf32e99db378cd3e447ae58afe5982ef2?rik=%2bfC9IaUqGrropw&pid=ImgRaw">');/*'.$produit['image'].'*/
                            ?>
                            <div class="caption"> 

                                <?php
                                echo("<h3>".$produit['nom']."</h3>");
                                echo("<h4 >".$gb->getCategorieById($produit['idcategorie'])['nomcategorie']."</h4>");/* afficher le nom de la categorie  */
                                ?>
                                <p> 
                                    <a href="#" class="btn btn-success">supprimer</a> 
                                    <a href="./lib/produitModifier.php" class="btn btn-success">modifier</a> 
                                    <a href="#" class="btn btn-danger pull-right"><?php echo($produit['prix']); ?>DT</a> 

                                </p> 

                            </div> 
                            </div>
                            
                    </div><?php }?>
                        </div>
                    
                </div>

            </div>
        </div>
    <?php } ?>
    <!-- ici on trouvera tout l'apperçu qui s'affichera à nos clients -->
    <?php if($user->getRole()=='client'){?>
        <div class="container-fluid">
            <div class="row" > <!--style="margin-top: 80px;"-->
                <div class="col-md-3">
                    <div class="list-group"> 
                        <div class="list-group-item active"><span>Catégories </span></div> 
                        <?php
                            $src="";
                            foreach ($stmt as $categorie) {
                                /**********inserer un lien svp  */
                                $src='<a href="./lib/afficherProduitsParCategorie.php?id='.$categorie['id'].'" class="list-group-item">'.$categorie['nomcategorie'].'</a>';
                                echo($src);}
                        ?>
                    </div> 
                </div>
                <div class="col-md-9"> 
                <?php 
                    $produits=$gb->getAllProduit();
                    foreach ($produits as $produit ) {
                        //var_dump($produit); ?>
                    <div class="col-md-4"> 
                        <div class="thumbnail"> 
                            <?php if ($produit['nombreEnStock']==0) {?>
                                
                        

                                <div> 
                                <span class="badge"> Rupture </span> 
                                

                                </div> 
                            <?php }?>
                            <?php if ($produit['nombreEnStock']>0) {?>

                                <div> 

                                <span class="badge"> En stock </span> 

                                </div> 

                        
                            <?php }?>
                            <div> 

                            <br> 

                        </div> 
                        <?php
                            echo('<img src="https://th.bing.com/th/id/Rf32e99db378cd3e447ae58afe5982ef2?rik=%2bfC9IaUqGrropw&pid=ImgRaw">');/*'.$produit['image'].'*/
                        ?>
                        <div class="caption"> 

                            <?php
                            echo("<h3>".$produit['nom']."</h3>");
                            echo("<h4 >".$gb->getCategorieById($produit['idcategorie'])['nomcategorie']."</h4>");/* afficher le nom de la categorie  */
                            ?>
                            <p> 
                                <form action="./lib/processAjoutPannier.php?id=<?= $produit['id']?>" method="POST">
                                    <?php
                                        if($produit['nombreEnStock']>0){ ?>
                                            <select name="quantite" id="quantite" class="quantite">
                                                <?php 
                                                    for ($i=1; $i <= $produit['nombreEnStock']; $i++) { ?>

                                                        <option><?= $i ?></option>
                                                        
                                                    <?php }
                                                
                                                ?>
                                        
                                            </select>
                                            <button class="btn btn-success buttonAdd" type="submit">Ajouter Panier</button>
                                            <a href="#" class="btn btn-danger pull-right"><?php echo($produit['prix']); ?>DT</a> 
                                    <?php } else { ?>
                                        <button class="btn btn-success buttonAdd" type="submit" disabled>Ajouter Panier</button>
                                        <a href="#" class="btn btn-danger pull-right"><?php echo($produit['prix']); ?>DT</a> 
                                   <?php }                                                                                                                                               
                                    ?>
                                    
                                    
                                </form>

                            </p> 

                        </div> 
                        </div>
                        
                </div><?php }?>
                    </div>
                
                
                

            </div>
        </div>
    <?php } ?>
    <!-- ici on trouvera tout l'apperçu qui s'affichera au propriétaire du site web  -->
    <?php if($user->getRole()=='proprietaire'){?>
        <div class="container-fluid">
            <div class="row" > 
                <div class="col-md-3">
                    <div class="list-group"> 
                        <div class="list-group-item active"><span>Actions sur produit</span></div> 
                        <a href="./lib/ajoutNouveauProduit.php" class="list-group-item">ajouter un produit</a>
                        <a href="" class="list-group-item">modifier un produit</a>
                        <div class="list-group-item active"><span>Actions sur categorie</span></div> 
                        <a href="./ajouterUneCategorie.php" class="list-group-item">ajouter une categorie</a>
                        <a href="./lib/modifierCategorie.php" class="list-group-item">modifier une categorie</a>
                        <div class="list-group-item active"><span>Actions sur admin</span></div> 
                        <a href="./lib/ajouterUnAdmin.php" class="list-group-item">ajouter un admin</a>
                        <a href="./lib/afficherTousLesAdmins.php" class="list-group-item">afficher les admins</a>
                        <a href="" class="list-group-item">modifier un admin</a>
                    </div> 
                </div>
                <div class="col-md-9"> 
                <?php 
                        $produits=$gb->getAllProduit();
                        foreach ($produits as $produit ) {?>
                        <div class="col-md-4"> 
                            <div class="thumbnail"> 
                                <?php if ($produit['nombreEnStock']==0) {?>
                                    
                            

                                    <div> 
                                    <span class="badge"> Rupture </span> 
                                    

                                    </div> 
                                <?php }?>
                                <?php if ($produit['nombreEnStock']>0) {?>

                                    <div> 

                                    <span class="badge"> En stock </span> 

                                    </div> 

                            
                                <?php }?>
                                <div> 

                                <br> 

                            </div> 
                            <?php
                                echo('<img src="https://th.bing.com/th/id/Rf32e99db378cd3e447ae58afe5982ef2?rik=%2bfC9IaUqGrropw&pid=ImgRaw">');/*'.$produit['image'].'*/
                            ?>
                            <div class="caption"> 

                                <?php
                                echo("<h3>".$produit['nom']."</h3>");
                                echo("<h4 >".$gb->getCategorieById($produit['idcategorie'])['nomcategorie']."</h4>");/* afficher le nom de la categorie  */
                                ?>
                                <p> 
                                <?php
                                    echo("<a href='./lib/modifierProduit.php?id=".$produit['id']."' class='btn btn-success'>supprimer</a>"); ?>
                                   <?php
                                    echo("<a href='./lib/produitModifier.php?id=".$produit['id']."' class='btn btn-success'>modifier</a>"); ?>
                                    <!--a href="./lib/produitModifier.php" class="btn btn-success">modifier</!--a--> 
                                    <a href="#" class="btn btn-danger pull-right"><?php echo($produit['prix']); ?>DT</a> 

                                </p> 

                            </div> 
                            </div>
                            
                            </div><?php }?>
                </div>
                    
                </div>

            </div>
        </div>
    <?php } ?>
<script src="./js/gestionButton.js">
</script>
</body>
</html>