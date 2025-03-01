<?php 
require_once(__DIR__ . '/../class/PatientDTO.class.php');
require_once(__DIR__ . '/../class/Repository.class.php');
require_once(__DIR__ . '/../class/CliniqueRepository.class.php');


class PatientRepository extends Repository{
    private static ?PatientRepository $_instance = null;
    private function __construct(){

    }
    public static function getInstance(){
        if (self::$_instance === null) {
            self::$_instance = new PatientRepository();
        }
        
        // Retourne l'instance unique de la classe
        return self::$_instance;
    }
    public function obtenirListePatient($nomClinique) {
        $listePatient = array();
        try {
          $id=CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
            // Connexion à la base de données
           
            $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
            $ins = $pdo->prepare("SELECT * FROM patients where  idClinique=?");
            $ins->execute(array($id));
           
            $ins->setFetchMode(PDO::FETCH_ASSOC);
            // Récupère les résultats
            $tab = $ins->fetchAll();
 
           
            // Vérifie si le tableau est vide
            if (empty($tab)) {
                echo "Aucune donnée trouvée dans la base de données!";
            }
    
            // Crée un tableau d'objets CliniqueDTO
          $listePatient=array();
            for ($i = 0; $i < count($tab); $i++) {
                 $patient= new PatientDTO(
                    $tab[$i]["noDossier"], 
                    $tab[$i]["noAssuranceMaladie"], 
                    $tab[$i]["nom"], 
                    $tab[$i]["prenom"], 
                    $tab[$i]["adresse"], 
                    $tab[$i]["ville"], 
                    $tab[$i]["province"],
                    $tab[$i]["codePostal"],
                    $tab[$i]["telephone"],
                    $tab[$i]["courriel"],
                );
                array_push($listePatient,$patient );
            }
    
            // Retourne la liste des cliniques
          
        } catch (PDOException $e) {
            // Capture l'exception PDO et affiche l'erreur
            echo "Erreur : " . $e->getMessage();
        }
        
        return $listePatient;
    }
    
    public function ObtenirPatient($nomClinique,$noDossier){
        try {
            $id=CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
            $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
            $ins = $pdo->prepare("SELECT * FROM patients WHERE idClinique =? AND noDossier =?");
            $ins->setFetchMode(PDO::FETCH_ASSOC);
            $ins->execute(array($id, $noDossier));
            $row = $ins->fetch();
            $patientDTO = new PatientDTO($row['noDossier'],$row['noAssuranceMaladie'],$row['nom'],$row['prenom'],$row['adresse'],$row['ville'],$row['province'],$row['codePostal'],$row['telephone'],$row['courriel']);
            }
        catch (PDOException $e) {
            // Capture l'exception PDO et affiche l'erreur
            echo "Erreur : " . $e->getMessage();
        }
        return $patientDTO;
    }
    public function ajouterPatient($nomClinique, $patientDTO) {
        
        try {
            // Récupération de l'ID de la clinique
            $id=CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
        // Déboguer les variables avant de poursuivre l'exécution
  /*  echo "<pre>";  // Utiliser <pre> pour un affichage plus lisible
        echo "Nom de la clinique : " . $nomClinique. "\n";
        echo "Contenu du patientDTO : \n";
      
        print_r($patientDTO);
        print_r($id);

        echo "</pre>";
    
        exit;  // Cela arrêtera l'exécution du script ici
       */
            // Connexion à la base de données
            $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
            
            // Préparation de la requête d'insertion
            $ins = $pdo->prepare("INSERT INTO patients (noDossier, noAssuranceMaladie, nom, prenom, adresse, ville, province, codePostal, telephone, courriel, idClinique) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      
          
            $ins->execute(array(
                $patientDTO->getNoDossier(),
                $patientDTO->getNoAssuranceMaladie(),
                $patientDTO->getNom(),
                $patientDTO->getPrenom(),
                $patientDTO->getAdresse(),
                $patientDTO->getVille(),
                $patientDTO->getProvince(),
                $patientDTO->getCodePostal(),
                $patientDTO->getTelephone(),
                $patientDTO->getCourriel(),
                $id
            ));
         
        
        } catch (PDOException $e) {
            // Affichage d'une erreur dans la console pour débogage
            echo "<script>console.error('Erreur lors de l\'ajout du patient: " . $e->getMessage() . "');</script>";
        }
    }
    
    public function modifierPatient($nomClinique,$patientDTO){
            try {
                $id=CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
        echo "Nom de la clinique : " . $nomClinique. "\n";
        echo "Contenu du patientDTO : \n";
      
        print_r($patientDTO);
        print_r($id);

      

  $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);

  $ins = $pdo->prepare("UPDATE patients SET 
  noDossier=?, noAssuranceMaladie=?, nom=?, prenom=?, adresse=?, ville=?, province=?, codePostal=?, telephone=?, courriel=? 
  WHERE idClinique=? AND noDossier=?");
$ins->execute(array(
  $patientDTO->getNoDossier(),
  $patientDTO->getNoAssuranceMaladie(),
  $patientDTO->getNom(),
  $patientDTO->getPrenom(),
  $patientDTO->getAdresse(),
  $patientDTO->getVille(),
  $patientDTO->getProvince(),
  $patientDTO->getCodePostal(),
  $patientDTO->getTelephone(),
  $patientDTO->getCourriel(),
  $id ,
  $patientDTO->getNoDossier()
));
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        
    }
    public function supprimerPatient($nomClinique,$noDossier){
        try {
            $id=CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
            $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
        $ins = $pdo->prepare("DELETE FROM patients WHERE idClinique = ? AND noDossier = ?");
        $ins->execute(array($id,$noDossier));
    }
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
	public function obtenirIdPatient($nomClinique,$noDossier)
		{
            $id=CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);
			$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
			$ins = $pdo->prepare("SELECT id FROM  patients WHERE noDossier=? AND idClinique=?");
				$ins->setFetchMode(PDO::FETCH_ASSOC);
				$ins->execute(array($noDossier,$id));
				$resultat = $ins->fetch();
				$idPatient = $resultat["id"];
				return $idPatient;
		}
}
?>