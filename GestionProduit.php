<?php include("lib/Produit.php");?>
<?php
    class GestionProduit{
        private $servername = 'localhost:3308';
        private $username = 'root';
        private $password = '';
        private $dbname='stage_ete';
        /*private $dbco= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);*/
        public function __constructor(){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        function ajouterUnProduit($produit)
            {
                $servername = 'localhost:3308';
                $username = 'root';
                $password = '';
                $dbname='stage_ete';
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "INSERT INTO produit(nom,description,image,idcategorie,nombreEnStock,prix) VALUES('".$produit->getNomProduit()."','".$produit->getDescription()."','".$produit->getImage()."',".$produit->getIdCategorie().",".$produit->getNombreEnStock().','.$produit->getPrix().')';
                $dbco->exec($sql);
            }
        function modifierNomProduit($id,$nom)
        {
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET nom=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$nom);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function modifierPrixProduit($id,$prix)
        {
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET prix=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$prix);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function modifierNombreEnStockProduit($id,$nb)
        {
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET nombreEnStock=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$nb);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function modifierIdCategorie($id,$nb)
        {
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET idcategorie=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$nb);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function modifierDescriptionProduit($id,$description){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET description=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$description);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function modifierImageProduit($id,$image){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET image=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$image);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        /*function modifierProduit($produit)
        {
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            if ($produit->getNom()!="") {
                $this->modifierNomProduit($produit->id,$produit->nom);
            }
            if ($produit->getDescription()!="") {
                $this->modifierDescriptionProduit($produit,$description);
            }
            if ($produit->getImage()!="") {
                $this->modifierImageProduit($produit);
            }
            if ($produit->getNombreEnStock()!=0) {
                $this->modifierNombreEnStockProduit($produit);
            }
            if ($produit->getPrix()!=0) {
                $this->modifierPrixProduit($produit);
            }
        }*/
        function supprimerProduitAvecId($id){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "DELETE FROM  produit  WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function chercherUnProduitParNom($nom){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM produit where nom like $nom";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetchAll();
            return $jiji;
        }
        function chercherUnProduitParIdCategorie($idCategorie){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM produit where idcategorie=$idCategorie";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetchAll();
            return $jiji;
        }
        function topThreeProduit(){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM produit ORDER BY nombre_achat,date_ajout";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetchAll();
            return $jiji;
        }
        function topThreeClient(){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM agent ORDER BY sommepaye,createdate";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetchAll();
            return $jiji;
        }
        function getAllProduit(){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM produit";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetchAll();
            return $jiji;
        }
        function getAllCategories(){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT id,nomcategorie FROM categorie";
            $stmt= $dbco->prepare($sql); 
            $stmt->execute();     
            $jiji=$stmt->fetchAll();
            return $jiji;
        }
        function getCategorieById($id){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT id,nomcategorie FROM categorie WHERE id=$id";
            $stmt= $dbco->prepare($sql); 
            $stmt->execute();     
            $jiji=$stmt->fetch();
            return $jiji;
        }
        function getPrixByIdProduit($idProduit){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM produit WHERE id=$idProduit";
            $stmt= $dbco->prepare($sql); 
            $stmt->execute();     
            $jiji=$stmt->fetch();
            return $jiji['prix'];
        }
        function getNombreEnStock($id){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT nombreEnStock FROM produit where id=$id";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetch();
            return $jiji;
        }
        function getProduitById($id){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql = "SELECT * FROM produit where id=$id";
            $stmt= $dbco->prepare($sql);      
            $stmt->execute();     
            $jiji=$stmt->fetch();
            return $jiji;
        }
        function modifierNbFoix($id,$nb){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE produit SET nombreDeFoisAchete=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$nb);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        function modifierMontantAchete($id,$montant){
            $servername = 'localhost:3308';
            $username = 'root';
            $password = '';
            $dbname='stage_ete';
            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $sql1 = "UPDATE agent SET somme_payye=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$montant);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
    }
    
     
?>