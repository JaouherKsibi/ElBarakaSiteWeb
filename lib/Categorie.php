<?php 
class Categorie {
    /*******************************
     * 
     *          les attributs 
     * 
     * ******************************** */
    private $idCategorie;
    private $nomCategorie;
    /*******************************
     * 
     *          le constructeur
     * 
     * ******************************** */
    public function __construct($idCategorie1,$nomCategorie1){
        $this->idCategorie=$idCategorie1;
        $this->nomCategorie=$nomCategorie1;
    }
    /*******************************
     * 
     *          les getters 
     * 
     * ******************************** */
    public function getIdCategorie(){
        return $this->idCategorie;
    }
    public function getNomCategorie(){
        return $this->nomCategorie;
    }
    /*******************************
     * 
     *          les setters  
     * 
     * ******************************** */
    public function setIdCategorie($id){
        $this->idCategorie=$id;
    }
    public function setNomCategorie($nom){
        $this->nomCategorie=$nom;
    }

}
?>