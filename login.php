<?php session_start();
ob_start();
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/v4-shims.js"></script>
    <title>Document</title>
    
</head>
<body>
<?php 
    require_once('includes/header.php');
    include("lib/Agent.php");
?>
<div class='row' style="margin-top:25px;">
    
        <form action="#" id="formLoginIn" method="post">
        
            <div class="container">
                <label for="uname"><b>Adresse E-mail</b></label>
                <input type="text" placeholder="Entrez votre adresse email" name="uname" id='uname' required>

                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez votre mot de passe " name="psw" id='psw' required>

                <button type="submit" name="sb" id="sb" disabled>Login</button>
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn" id='cncl' onclick="cancel()">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
</div>
      <?php 
    require_once('includes/footer.php');
?>
<?php 
 if (isset($_POST['sb'])) {
    $servername = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname='stage_ete';
    
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    $psw=md5($psw);
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id,email,mot_de_passe,nom,prenom,numero_carte_identite,numero_de_telephone,cle_de_verific,verifiee,role,somme_payye,date_de_creation FROM agent where (email='$uname' and mot_de_passe='$psw') LIMIT 1";
    $stmt= $dbco->prepare($sql);      
    $user=$stmt->execute(array('id','email','mot_de_passe','nom','prenom','numero_carte_identite','numero_de_telephone','cle_de_verific','verifiee','role','somme_payye','date_de_creation'));
//
        if($stmt->rowCount()==1){
            // il existe un user 
            //les infos de l'utilisateur 
            $userinfo=$stmt->fetch();          
            $nom=$userinfo['prenom'];
            $id=$userinfo['id'];
            $motDePasse=$userinfo['mot_de_passe'];
            $prenom=$userinfo['nom'];
            $numeroCarteIdentite=$userinfo['numero_carte_identite'];
            $nom=$userinfo['prenom'];
            $sommePaye=$userinfo['somme_payye'];
            $role=$userinfo['role'];
            $email=$userinfo['email'];
            $numeroTelephone=$userinfo['numero_de_telephone'];
            $verifiee=$userinfo['verifiee'];
            $dateDeCreation=$userinfo['date_de_creation'];


            /*********************************************** 
             * 
             * tout le travail est ici 
             * 
             * 
            *************************************************/


            if($verifiee==1){
                include('C:\wamp64\www\siteWebStage\lib\GestionPannierSession.php');
                $gestion=new GestionPannierSession('localhost:3308','root','','stage_ete');
                //user verifié il faut creer une session 
                $trueUser=new Agent($id,$nom,$prenom,$numeroTelephone,$email,$motDePasse,$dateDeCreation,$sommePaye,$role,$numeroCarteIdentite);
                $_SESSION["user"]=serialize($trueUser);
                $pannier=$gestion->getPannierByIdUser($id);
                if($pannier==null){
                   $gestion->creerUnPannier($id);
                }
                $pannier=$gestion->getPannierByIdUser($id);
                if (!$_SESSION['pannier']) {
                   $_SESSION['pannier']=array();
                }
                $products=$gestion->getAllLignesByIdPanier($pannier['id']);
                foreach ($products as $product) {
                    array_push($_SESSION['pannier'],array($product['idPanier'] ,$product["idProduit"] ,$product['quantite'] ,$product['prixtot']));
                }
                header('Location: ./accueil.php');ob_end_flush();
            }
            else if($verifiee==0){
                //user non verifie mais il est inscrit il faut lui envoyer un message
                echo("<input name='exist' id='exist' hidden value='true'>");
                echo("<h1>non verifie<h1/>");
            }
        }
        else{
           echo("<h1>nonnnnn<h1>");
            
        } }
?>
<script src="js/signIn.js"></script>
</body>
</html>