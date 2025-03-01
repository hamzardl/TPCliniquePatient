<?php
	//Importation des dépendances...
	require_once("Repository.class.php");
	require_once("CliniqueDTO.class.php");
	
	//Classe pour le repository des cliniques...
	class CliniqueRepository extends Repository
	{
		//Instance unique de la classe.
		private static $_instance;
		
		//Constructeur privée de la classe.
		private function __construct () {}
		
		//Méthode permettant d'obtenir l'instance unique de la classe.
		public static function getInstance () 
		{
			if (!(self::$_instance instanceof self))
				self::$_instance = new self();

			return self::$_instance;
		}
		
		//Méthode permetttant d'obtenir la liste des cliniques...
		public function obtenirListeClinique()
		{
			try
			{
				$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("SELECT * FROM clinique");
				$ins->setFetchMode(PDO::FETCH_ASSOC);
				$ins->execute();
				$tab = $ins->fetchAll();
				
				$listeClinique = array();
				
				for($i=0;$i<count($tab);$i++)
				{
				  array_push($listeClinique, new CliniqueDTO($tab[$i]["nom"], $tab[$i]["adresse"], $tab[$i]["ville"], $tab[$i]["province"], $tab[$i]["codePostal"], $tab[$i]["telephone"], $tab[$i]["courriel"]));
				}
			}	
			catch(Exception $e){}

			return $listeClinique;
		}

		//Méthode permettant d'obtenir une clinique par son nom...
		public function obtenirClinique($nomClinique)
		{
			$clinique = null;
			try
			{
				$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("SELECT * " . 
				                       "FROM clinique " . 
									  "WHERE nom=?");
				$ins->setFetchMode(PDO::FETCH_ASSOC);
				$ins->execute(array($nomClinique));
				$resultat = $ins->fetch();
				$clinique = new CliniqueDTO($resultat["nom"], $resultat["adresse"], $resultat["ville"], $resultat["province"], $resultat["codePostal"], $resultat["telephone"], $resultat["courriel"]);
			}	
			catch(Exception $e){}

			return $clinique;
			
		}

		//Méthode permettant d'ajouter une clinique...
		public function ajouterClinique($cliniqueDTO)
		{
			try
			{
				$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("INSERT INTO clinique (nom,adresse,ville,province,codePostal,telephone,courriel) " . 
				                     "VALUES(?,?,?,?,?,?,?)");
				$ins->execute(array($cliniqueDTO->getNom(),$cliniqueDTO->getAdresse(),$cliniqueDTO->getVille(),$cliniqueDTO->getProvince(),$cliniqueDTO->getCodePostal(),$cliniqueDTO->getTelephone(),$cliniqueDTO->getCourriel()));
			}	
			catch(Exception $e){}
		}
		
		//Méthode permettant de modifier une clinique avec un dto de type clinique...
		public function modifierClinique($cliniqueDTO)
		{
			try
			{
				$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("UPDATE clinique " . 
				                        "SET adresse=?,ville=?,province=?,codePostal=?,telephone=?,courriel=? " . 
									  "WHERE nom=?");
				$ins->execute(array($cliniqueDTO->getAdresse(),$cliniqueDTO->getVille(),$cliniqueDTO->getProvince(),$cliniqueDTO->getCodePostal(),$cliniqueDTO->getTelephone(),$cliniqueDTO->getCourriel(), $cliniqueDTO->getNom()));
			}	
			catch(Exception $e){}
		}
		
		//Méthode permettant de supprimer une clinique par son nom...
		public function supprimerClinique($nomClinique)
		{
			try
			{
				$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				$ins = $pdo->prepare("DELETE FROM clinique " . 
				                           "WHERE nom=?");
				$ins->execute(array($nomClinique));
			}	
			catch(Exception $e){}
		}

		//Méthode permettant d'obtenir le id d'une clinique par son nom...
		public function obtenirIdClinique($nomClinique)
		{
		
			$pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
			$ins = $pdo->prepare("SELECT id FROM clinique " . 
								  "WHERE nom=?");
				$ins->setFetchMode(PDO::FETCH_ASSOC);
				$ins->execute(array($nomClinique));
				$resultat = $ins->fetch();
				$idPatient = $resultat["id"];
				return $idPatient;
		}
	}
?>