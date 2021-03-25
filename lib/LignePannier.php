<?php 
    include_once("../GestionProduit.php");
    class LignePannier {
        private $id;
        private $idPannier;
        private $quantite;
        private $idProduit;
        private $prixTotale;
        public function __construct($id,$idPannier,$quantite,$idProduit){
            $this->id=$id;
            $this->idPannier=$idPannier;
            $this->quantite=$quantite;
            $this->idProduit=$idProduit;
        }
        public function getId(){
            return $this->id;
        }
        public function getIdPannier(){
            return $this->idPannier;
        }
        public function getIdProduit(){
            return $this->idProduit;
        }
        public function getQuantite(){
            return $this->quantite;
        }
        public function getPrixTotale(){
           $this->setPrixTotale();
            return $this->prixTotale;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function setIdPannier($idPannier){
            $this->idPannier=$idPannier;
        }
        public function setIdProduit($idProduit){
            $this->idProduit=$idProduit;
        }
        public function setQuantite($quantite){
            $this->quantite=$quantite;
        }
        public function setPrixTotale(){
            $gb=new GestionProduit();
            $prixUnitaire=$gb->getPrixByIdProduit($this->getIdProduit());
            $this->prixTotale=$this->quantite * $prixUnitaire ;
        }
    }
?>