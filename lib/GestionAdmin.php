<?php 
    class GestionAdmin{
        private $servername = 'localhost:3308';
        private $username = 'root';
        private $password = '';
        private $dbname='stage_ete';
        //private $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        public function __construct()
        {
            $dbco = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function modifierNomAdmin($id,$nom){
            $sql1 = "UPDATE agent SET nom=:n1 WHERE id=:n2";
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$nom);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        public function getAllAdmin(){
            $sql1 = "SELECT * FROM agent where role=:n1";
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $stmt1= $dbco->prepare($sql1);
            $admin="admin";
            $stmt1->bindParam('n1',$admin);
            $stmt1->execute();
            $jiji=$stmt1->fetchAll();
            return $jiji;
        }
        public function modifierPrenomAdmin($id,$prenom){
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $sql1 = "UPDATE agent SET prenom=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$prenom);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        public function modifierAdresseEmail($id,$email){
            $sql1 = "UPDATE agent SET email=:n1 WHERE id=:n2";
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$email);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        public function modifierNumTel($id,$numtel){
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $sql1 = "UPDATE agent SET numtel=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$numtel);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        public function modifierNumCin($id,$numcin){
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $sql1 = "UPDATE agent SET numcin=:n1 WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n1',$numcin);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();
        }
        public function modifierMotDePasse($id,$mdp){
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

        }
        public function supprimerAdminById($id){
            $dbco=new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $sql1 = "DELETE FROM  agent  WHERE id=:n2";
            $stmt1= $dbco->prepare($sql1);
            $stmt1->bindParam('n2',$id);
            $stmt1->execute();

        }

    }



?>