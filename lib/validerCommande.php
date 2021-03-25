<?php session_start();
include("Agent.php");
include("GestionPannierSession.php");
include_once("../GestionProduit.php");
$position_produit_panier=$_GET['val'];
$gp=new GestionProduit();
$ge=new GestionPannierSession();
if (isset($_SESSION['user'])) {
    $user=unserialize($_SESSION['user']);
}else {
    header("Location: ./login.php");
}
$produit=$gp->getProduitById($_SESSION['pannier'][$position_produit_panier][1]);
$prop=$ge->getProprietaire();
var_dump($_SESSION['pannier']);//totes les infos de l'utilisateur

$cat=$gp->getCategorieById($produit['idcategorie']);
echo($_SESSION['pannier'][$position_produit_panier][0].'<br>');//id panier on va determiner le user
echo($_SESSION['pannier'][$position_produit_panier][1].'<br>');//id produit on va determiner les caracteristiques du produit
echo($_SESSION['pannier'][$position_produit_panier][2].'<br>');//qté commandée
echo($_SESSION['pannier'][$position_produit_panier][3].'<br>');//le prix de cette commande 
$subject="activation d'une commande";
$emailclient=$user->getEmail();
$emailproprietaire=$prop['email'];
$nom=$prop['nom'];
$message="Bonjour Mr ".$nom."\nJe suis ".$user->getNom()." ".$user->getPrenom()." je souhaite commander ".$_SESSION['pannier'][$position_produit_panier][2].' '.$produit['nom'].' '."<h1>user information</h1>"."<p>nom: ".
$user->getNom()."</p><p>prenom:".$user->getPrenom()."</p><p>email: ".$user->getEmail()."</p><p>email: ".$user->getEmail()."</p><p>numero de telephone: ".$user->getNumeroTelephone()."</p><h1>Produit information :</h1><p>Nom: ".$produit['nom'].
"</p><p>Nom Categorie: ".$cat['nomcategorie']."</p><h1 >Quantité:<span style='color:red;'>".$_SESSION['pannier'][$position_produit_panier][3]."</span></h1>"."<h1 >prix unitaire :<span style='color:red;'>".$produit['prix']."</span></h1>"."<h1 >Montant à payer :<span style='color:red;'>".$_SESSION['pannier'][$position_produit_panier][3]."</span></h1>";
                  $headers  = "From:$emailclient " . "\r\n" .
                  'MIME-Version: 1.0' . "\r\n" .
                  'Content-type: text/html; charset=utf-8';

                if(mail($emailproprietaire,$subject,$message,$headers))
                {
                    $ge->supprimerLigne($_SESSION['pannier'][$position_produit_panier][0],$_SESSION['pannier'][$position_produit_panier][1]);
                    $user->setSommePaye($user->getSommePaye()+$_SESSION['pannier'][$position_produit_panier][3]);
                    $_SESSION["user"]=serialize($user);
                    $gp->modifierMontantAchete($user->getId(),$user->getSommePaye());
                    $gp->modifierNbFoix($_SESSION['pannier'][$position_produit_panier][1],$produit['nombreDeFoisAchete']+1);
                    unset($_SESSION['pannier'][$position_produit_panier]);
                    header('location:afficherPannier.php');ob_end_flush();
                }
                

?>