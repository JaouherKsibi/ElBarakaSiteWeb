<?php
    $servername = 'localhost:3308';
    $username = 'root';
    $password = '';
    $dbname='stage_ete';
    $nb=0;
    $vkey="";
   if(isset($_GET['vkey'])){
       $vkey=$_GET['vkey']; 
       $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        $sql = "SELECT verifiee,cle_de_verific FROM agent where verifiee=0 and cle_de_verific='$vkey' LIMIT 1";
        $stmt= $dbco->prepare($sql);      
        $stmt->execute();
        $nb=$stmt->rowCount();
       /* if($stmt){
            $bool=1;
        }
        if ($bool==1) {
            $sql1 = "UPDATE agent SET verifiee=1 WHERE cle_de_verific=?";
            $stmt1= $dbco->prepare($sql1);
            $stmt->execute([$vkey]);
        }
         else{
            echo("cet email a été verifié ou c'est un compte invalide");
        }   
            
        if ($stmt1) {
           echo("ok");
        }
        else{
            echo("erreur sql");
        }*/
        
                
   }
   else {
       die("something went wrong");
   }
   if ($nb==1) {
    $sql1 = "UPDATE agent SET verifiee=1 WHERE cle_de_verific=:n";
    $stmt1= $dbco->prepare($sql1);
    $stmt1->bindParam('n',$vkey);
    $stmt1->execute();
   }
   else{
    echo("cet email a été verifié ou c'est un compte invalide");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>