<?php 
class CliniqueDTO{
    private  $nom;
    private  $adresse;
    private  $ville;
    private  $province;
    private  $codePostal;
    private  $telephone;
    private  $courriel;
    public function __construct($nom="",$adresse="",$ville="",$province="",$codePostal="",$telephone="",$courriel=""){
            $this->nom=$nom;
            $this->adresse=$adresse;
            $this->ville=$ville;
            $this->province=$province;
            $this->codePostal=$codePostal;
            $this->telephone=$telephone;
            $this->courriel=$courriel;
    }
    public function __toString() {
        return  $this->nom.$this->adresse;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getProvince(){
        return $this->province;
    }
    public function getCodePostal(){
        return $this->codePostal;
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function getCourriel(){
        return $this->courriel;
    }
}
?>