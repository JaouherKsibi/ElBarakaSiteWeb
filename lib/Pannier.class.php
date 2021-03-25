<?php 
class Pannier{
    private $id;
    private $idClient;
    private $sommeTotale;
    public function __construct($id,$idClient){
        $this->id=$id;
        $this->idClient=$idClient;
    }
    public function getId(){
        return $this->id;
    }
    public function getIdClient(){
        return $this->idClient;
    }
    public function getSommeTotale(){
        return $this->sommeTotale;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setIdClient($idClient){
        $this->idClient=$idClient;
    }
    public function setSommeTotale($sommeTotale){
        $this->sommeTotale=$sommeTotale;
    }
}
?>