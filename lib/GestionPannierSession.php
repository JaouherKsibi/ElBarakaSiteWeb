<?php 
include_once('./LignePannier.php') ;
    class GestionPannierSession{
        public function __construct(){
            }
    function getPannierByIdUser($idUser){
        $servername = 'localhost:3308';
                $username = 'root';
                $password = '';
                $dbname='stage_ete';
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "SELECT * FROM panier WHERE idClient=$idUser";
                $stmt= $dbco->prepare($sql); 
                $stmt->execute();     
                $jiji=$stmt->fetch();
                return $jiji;
    }
    function creerUnPannier($idUser){
                $servername = 'localhost:3308';
                $username = 'root';
                $password = '';
                $dbname='stage_ete';
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = "INSERT INTO panier(idClient) VALUES($idUser)";
                $dbco->exec($sql);
    }
    function getAllLignesByIdPanier($id){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM lignePanier WHERE idPanier=$id";
        $stmt= $dbco->prepare($sql); 
        $stmt->execute();     
        $jiji=$stmt->fetchAll();
        return $jiji;
    }
    function addProduitToPannier($idClient,$idProduit,$quantite){
        $res=$this->getPannierByIdUser($idClient);
        $idPannier=$res['id'];
        $ligne=new LignePannier(1,$idPannier,$quantite,$idProduit);
        array_push($_SESSION['pannier'],array($ligne->getIdPannier(),$ligne->getIdProduit(),$ligne->getQuantite(),$ligne->getPrixTotale()));
    }
    function getAllLignePanierByIdUser($idUser){
        return $this->getAllLignesByIdPanier($this->getPannierByIdUser($idUser)['id']);
    }
    function modifierQuantite($id,$quantite){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql1 = "UPDATE lignePanier SET quantite=:n1 WHERE id=:n2";
        $stmt1= $dbco->prepare($sql1);
        $stmt1->bindParam('n1',$quantite);
        $stmt1->bindParam('n2',$id);
        $stmt1->execute();
    }
    function addLignePanier($idPanier,$idProduit,$quantite,$prixTot){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "INSERT INTO lignePanier(idPanier,idProduit,quantite,prixtot) VALUES($idPanier,$idProduit,$quantite,$prixTot)";
        $dbco->exec($sql);
    }
    function supprimerLigne($idPanier,$idProduit){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql1 = "DELETE FROM  lignepanier  WHERE idProduit=:n1 && idPanier=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$idProduit);
            $stmt1->bindParam('n2',$idPanier);
            $stmt1->execute();
    }
    function supprimerLigneById($id){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql1 = "DELETE FROM  lignepanier  WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
    }
    function modifierPrixTot($id,$prixTot){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql1 = "UPDATE lignePanier SET prixtot=:n1 WHERE id=:n2";
        $stmt1= $dbco->prepare($sql1);
        $stmt1->bindParam('n1',$prixTot);
        $stmt1->bindParam('n2',$id);
        $stmt1->execute();
    }
    function getProprietaire(){
        $servername = 'localhost:3308';
        $username = 'root';
        $password = '';
        $dbname='stage_ete';
        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "SELECT * FROM agent WHERE role='proprietaire'";
        $stmt= $dbco->prepare($sql); 
        $stmt->execute();     
        $jiji=$stmt->fetch();
        return $jiji;
    }
}
?>