<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/formulaire_inscription.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/v4-shims.js"></script>
    <title>Document</title>
</head>
<body>
<?php 
    require_once('includes/header.php');
    
?>
<div class="container-fluid">
        <form action="#" id="signUpForm" method="POST" style="border:1px solid #ccc">
            <div class="container">
              <h1>Inscription</h1>
              <p>s'il vous plait de remplir ce formulaire pour vous inscrire a notre plateforme</p>
              <hr>
                
              <label for="nom"><b>Nom</b></label>
              <input type="text" placeholder="Entrez votre nom svp" name="nom" id="nom" required>
              <label for="prenom"><b>Prenom</b></label>
              <input type="text" placeholder="Entrez votre prenom" name="prenom" id="prenom" required>
              <label for="num_cin"><b>Numero de carte d'identité</b></label>
              <input type="text" placeholder="Entrez votre numéro de carte d'identité" name="num_cin" id="num_cin" required>
              <label for="numtel"><b>Numero de telephone </b></label>
              <input type="text" placeholder="Entrez votre numéro de téléphone " id="numtel" name="numtel" required>
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Entrez votre email" name="email" id="email" required>
          
              <label for="psw"><b>Mot de passe </b></label>
              <input type="password" placeholder="Entrez un mot de passe" name="psw" id="psw" required>
          
              <label for="pswRepeat"><b>Retaper le mot de passe</b></label>
              <input type="password" placeholder="Retaper le mot de passe" name="pswRepeat" id="pswRepeat" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>
              
              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
          
              <div class="clearfix">
                <button type="button" id="cncl" onclick="cancel()" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="sign" id="sign" disabled>Sign Up</button>
              </div>
            </div>
          </form>
      </div>
      <?php 
      
        if (isset ($_POST['sign'])) {
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $numtel = $_POST['numtel'];
            $email = $_POST['email'];
            $psw=$_POST['psw'];
            $psw2=$_POST['pswRepeat'];
            
            $numero_carte_identite=$_POST['num_cin'];
            
            
           if ($psw2 != $psw){
            
           }
           else {
            /*********************************************************/

            try{
                $vkey=md5(time().$nom);
                $psw=md5($psw);
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "INSERT INTO agent(nom,prenom,numero_de_telephone,email,mot_de_passe,cle_de_verific,numero_carte_identite,role) VALUES('$nom','$prenom','$numtel','$email','$psw','$vkey','$numero_carte_identite','client')";
                
                $dbco->exec($sql);
                $subject="Verification de l' adresse e-mail";
                $message="Bonjour Mr ".$nom."\nBienvenue à notre pépinière El-baraka\n une seule étape vous manque d'être inscrit dans notre plateforme\n cliquez sur ce lien pour compléter votre inscription \n <a href='http://localhost/siteWebStage/verification.php?vkey=$vkey'>lien</a>";
                  $headers  = 'From: ksibijaouher@gmail.com' . "\r\n" .
                  'MIME-Version: 1.0' . "\r\n" .
                  'Content-type: text/html; charset=utf-8';

                if(mail($email,$subject,$message,$headers))
                {
                  
                  header('location:thankyou.php');ob_end_flush();
                }
                
            
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
          }
            
            
            
        }
        ?>
        
<script src="js/signUp.js"></script>
<?php 
    require_once('includes/footer.php');
?>
</body>
</html>