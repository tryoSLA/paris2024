<?php
	class Fonction
	{
		private $pdo,$table;
		public function __construct($serveur,$bdd,$user,$mdp)
		{
			$this->pdo = null;
			try {
				$this->pdo = new PDO ("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
			}catch(Exception $exp){
				echo "Erreur de connexion a la base de donnee";
			}
		}
		public function setTable($uneTable)
		{
			$this->table = $uneTable;
		}
		/*public function selectAll()
		{
			if ($this->pdo != null)
			{
				$requete = "SELECT * FROM ".$this->table;
				$select = $this->pdo->prepare($requete);
				$select->execute();
				$resultat = $select->fetchAll();
				return $resultat;
			}
			else
			{
				return null;
			}
		}*/

		/*public function selectChamps($tab)
		{
			$champs = implode(",",$tab);
			$requete = "select ".$champs." from ".$this->table;
			if ($this->pdo != null)
			{
				$select = $this->pdo->prepare($requete);
				$select->execute();
				$resultat = $select->fetchAll();
				return $resultat;
			}
		}*/
		public function verif_champs($tab)
		{

		}
		public function insert($tab)
		{
			$donnees = array();
			$parametre = array();
			foreach ($tab as $cle => $valeur) 
			{
				$parametre[] = ":".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaine = implode(",",$parametre);
			$requete = "insert into ".$this->table." values(null,".$chaine.");";
			if ($this->pdo != null)
			{
				$insert = $this->pdo->prepare($requete);
				$insert->execute($donnees);
			}
		}

		/*public function rechercher($tab,$motcle)
		{
			$champs = array();

		foreach ($tab as $valeur) 
			{
				$champs[] = $valeur." like :motcle ";
			}	
			$chaine = implode(" or ", $champs);
			$requete = "select * from ".$this->table." where ".$chaine.";";
			$donnees = array(":motcle"=>"%".$motcle."%");
			if ($this->pdo != null)
			{
				$recherche = $this->pdo->prepare($requete);
				$recherche->execute($donnees);
				$resultats = $recherche->fetchAll();
				return $resultats;
				
			}
			else
			{
				return null;
				echo "La recherche n'a pas fonctionné";
			}
		}*/

		/*public function supprimer($tab)
		{
			$donnees = array();
			$champs = array();
			foreach ($tab as $cle => $valeur) 
			{
				$champs[] = $cle."= :".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaine = implode(" and ", $champs);
			$requete = "delete from ".$this->table." where ".$chaine." ;";
			if ($this->pdo != null)
			{
				$delete = $this->pdo->prepare($requete);
				$delete->execute($donnees);
			}
		}*/
	}
?>