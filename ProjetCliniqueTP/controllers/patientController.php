<?php

	//Importation de l'en-tête...
	require_once(__DIR__ . "/../partials/header.php");
	//Importation des dépendances...
	require_once(__DIR__ . "/../class/PatientRepository.class.php");
	require_once(__DIR__ . "/../class/patientDTO.class.php");

?>
<?php
	$patientrepo = PatientRepository::getInstance();
	//Si la variable action ne contient pas de valeur...
	if(!isset($_GET["action"]))
		//On l'initialise à l'action pat défault...
		$_GET["action"] = "afficherListePatient";

	//Selon l'action...
	switch ($_GET["action"]) 
	{
		//On affiche la liste des cliniques...
		case "afficherListePatient":

   
			if (isset($_POST['nomClinique']) && $_POST['nomClinique'] != null) {
				$nomClinique = $_POST['nomClinique'];
			} else {
				$nomClinique = "rdl";  
			}
			$listePatient=PatientRepository::getInstance()->obtenirListePatient($nomClinique);
			$listeClinique = CliniqueRepository::getInstance()->obtenirListeClinique();
			require_once(__DIR__ . "/../views/afficherListePatient.php");
			break;
		//On ajoute la clinique...
		case "ajouterPatient":
		
     
    
			//Appel de l'ajout au repository...
				$noDossier = $_POST['noDossier'];
				$noAssuranceMaladie = $_POST['noAssuranceMaladie'];
				$prenom = $_POST['prenom'];
				$nom = $_POST['nom'];
				$adresse = $_POST['adresse'];
				$ville = $_POST['ville'];
				$province = $_POST['province']; 
				$telephone = $_POST['telephone']; 
				$courriel = $_POST['courriel']; 
				$codePostal = $_POST['codePostal']; 
				$nomClinique = $_POST['nomClinique']; 
				$patientDTO=new patientDTO($noDossier,$noAssuranceMaladie,$nom,$prenom,$adresse,$ville,$province,$codePostal,$telephone,$courriel);
				$listePatient=PatientRepository::getInstance()->obtenirListePatient($nomClinique);
				$flag=false;
				for ($i=0; $i <count($listePatient) ; $i++) { 
			
		
					if ($listePatient[$i]->getNoDossier()==$patientDTO->getNoDossier()) {
				
					
						
						header(header:'Location:patientController.php');
						$flag=true;
					
					}
					//Ou mettre le try catch 
				}
				if (!$flag) {
					PatientRepository::getInstance()->ajouterPatient($nomClinique,$patientDTO);
				header(header:'Location:patientController.php');
				}
			

			break;
		//On supprime la clinique...
		case "supprimerPatient":
			$nomClinique =$_POST['nomClinique'] ; 
		
			$noDossier = $_POST['noDossier'];
			//Appel de la suppression au repository...
			
			PatientRepository::getInstance()->supprimerPatient($nomClinique,$noDossier);
			//Redirection vers la page cliniqueController.php pour l'affichage.
			header(header:'Location:patientController.php');
			break;
		case "formulaireModifierPatient":
			$nomClinique =  $_GET['nomClinique'];
			$noDossier = $_GET['noDossier'];
			$patient=PatientRepository::getInstance()->ObtenirPatient($nomClinique,$noDossier);
			//Importation de la vue...
			require_once(__DIR__ . "/../views/FormulaireModifierPatient.php");
			break;
		//On modifie la clinique...
		case "modifierPatient":
			//Appel de la modification au repository...

			$noDossier = $_POST['noDossier'];
			$noAssuranceMaladie = $_POST['noAssuranceMaladie'];
			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$adresse = $_POST['adresse'];
			$ville = $_POST['ville']; 
			$province = $_POST['province']; 
			$telephone = $_POST['telephone']; 
			$courriel = $_POST['courriel']; 
			$codePostal = $_POST['codePostal']; 
			$nomClinique = $_POST['nomClinique']; 
			$patient=new PatientDTO($noDossier,$noAssuranceMaladie,$nom,$prenom,$adresse,$ville,$province,$codePostal,$telephone,$courriel);
			
			PatientRepository::getInstance()->modifierPatient($nomClinique,$patient);
			//Redirection vers la page cliniqueController.php pour l'affichage.
			header(header:'Location:patientController.php');
			break;
    }
	var_dump($_GET["action"]);
?>
<?php
	//Importation du pied de page...
	include(__DIR__ . "/../partials/footer.php");
?>