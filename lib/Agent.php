<?php 
class Agent{
    private $nom;
    private $prenom;
    private $numeroCarteIdentiteNationale;
    private $id;
    private $numeroTelephone;
    private $email;
    private $motDePasse;
    private $dateDeCreation;
    private $sommePaye;
    private $role;
    /***************************************//*

        constructeur  


    *************************************************/
    public function __construct($id,$nom,$prenom,$numeroTelephone,$email,$motDePasse,$dateDeCreation,$sommePaye,$role,$numeroCarteIdentiteNationale){
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->numeroTelephone=$numeroTelephone;
        $this->email=$email;
        $this->motDePasse=$motDePasse;
        $this->dateDeCreation=$dateDeCreation;
        $this->sommePaye=$sommePaye;
        $this->role=$role;
        $this->numeroCarteIdentiteNationale=$numeroCarteIdentiteNationale;
    }
    /***************************************//*

        getters  


    *************************************************/
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getId(){
        return $this->id;
    }
    public function getNumeroTelephone(){
        return $this->numeroTelephone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getMotDePasse(){
        return $this->motDePasse;

    }
    public function getDateDeCreation(){
        return $this->dateDeCreation;
    }
    public function getSommePaye(){
        return $this->sommePaye;
    }
    public function getRole(){
        return $this->role;
    }
    public function getNumeroCarteIdentiteNationale(){
        return $this->numeroCarteIdentiteNationale;
    }
    /***************************************//*

        setters  


    *************************************************/
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function setPrenom($prenom){
        $this->prenom=$prenom;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setRole ($role){
        $this->role=$role;
    }
    public function setSommePaye($sommePaye){
        $this->sommePaye=$sommePaye;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setNumeroTelephone($numeroTelephone){
        $this->numeroTelephone=$numeroTelephone;
    }
    
    public function setMotDePasse($motDePasse){
        $this->motDePasse=$motDePasse;
    }
    public function setDateDeCreation($dateDeCreation){
        $this->dateDeCreation=$dateDeCreation;
    }
    public function setNumeroCarteIdentiteNationale($num){
        $this->numeroCarteIdentiteNationale=$num;
    }
    
}


?>