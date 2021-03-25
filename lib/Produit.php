<?php 
class Produit {
    private $idProduit;
    public $nomProduit;
    private $idCategorie;
    private $description;
    private $image;
    private $nombreDeFoisAchete;
    private $dateAjout;
    private $nombreEnStock;
    private $prix;
    public function __construct($idProduit,$nomProduit,$idCategorie,$description,$image,$nombreDeFoisAchete,$dateAjout,$nombreEnStock,$prix){
        $this->idProduit=$idProduit;
        $this->nomProduit=$nomProduit;
        $this->idCategorie=$idCategorie;
        $this->description=$description;
        $this->image=$image;
        $this->nombreDeFoisAchete=$nombreDeFoisAchete;
        $this->dateAjout=$dateAjout;
        $this->nombreEnStock=$nombreEnStock;
        $this->prix=$prix;
    }
    public function getNomProduit(){
        return $this->nomProduit;
    }
    public function getIdProduit(){
        return $this->idProduit;
    }
    public function getIdCategorie(){
        return $this->idCategorie;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getImage(){
        return $this->image;
    }
    public function getNombreDeFoisAchete(){
        return $this->nombreDeFoisAchete;
    }
    public function getDateAjout(){
        return $this->dateAjout;
    }
    public function getNombreEnStock(){
        return $this->nombreEnStock;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function setNomProduit($nomProduit){
        $this->nomProduit=$nomProduit;
    }
    public function setIdProduit($idProduit){
        $this->idProduit=$idProduit;
    }
    public function setIdCategorie($idCategorie){
       $this->idCategorie=$idCategorie;
    }
    public function setDescription($description){
        $this->description=$description;
    }
    public function setImage($image){
        $this->image=$image;
    }
    public function setNombreDeFoisAchete($nombreDeFoisAchete){
        $this->nombreDeFoisAchete=$nombreDeFoisAchete;
    }
    public function setDateAjout($dateAjout){
        $this->dateAjout=$dateAjout;
    }
    public function setNombreEnStock($nombreEnStock){
         $this->nombreEnStock=$nombreEnStock;
    }
    public function setPrix($prix){
         $this->prix=$prix;
    }
}
?>