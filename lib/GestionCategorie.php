<?php 
    include("./Categorie.php");
    class GestionCategorie{
        public function __construct(){
        }
        public function addCategorie($cat){
            $servername = 'localhost:3308';
                $username = 'root';
                $password = '';
                $dbname='stage_ete';
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $nom=$cat->getNomCategorie();
                $sql = "INSERT INTO categorie(nomcategorie) VALUES('$nom')";
                $dbco->exec($sql);
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
    }
?>