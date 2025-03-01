<?php 
class patientDTO{
private $noDossier;
private $noAssuranceMaladie;
private $nom;
private $ville;
private $prenom;
private $adresse;
private $province;
private $codePostal;
private $telephone;
private $courriel;
 public function __construct($noDossier="",$noAssuranceMaladie="",$nom="",$prenom="",$adresse="",$ville="",$province="",$codePostal="",$telephone="",$courriel=""){
            $this->noDossier=$noDossier;
            $this->noAssuranceMaladie=$noAssuranceMaladie;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->adresse=$adresse;
            $this->province=$province;
            $this->codePostal=$codePostal;
            $this->telephone=$telephone;
            $this->courriel=$courriel;
            $this->ville=$ville;
         
    }
    public function __toString() {
        return  $this->noDossier;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getNoAssuranceMaladie(){
        return $this->noAssuranceMaladie;
    }
    public function getNoDossier(){
        return $this->noDossier;
    }
    public function getPrenom(){
        return $this->prenom;
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