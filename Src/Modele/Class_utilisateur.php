<?php
	class Utilisateur
	{
		private $nom, $prenom, $age, $genre, $email, $pseudo, $mdp, $confmdp;
		public function __construct()
		{
			$this->nom = "";
			$this->prenom = "";
			$this->age = 0;
			$this->genre = "";
			$this->email = "";
			$this->pseudo = "";
			$this->mdp = "";
			$this->confmdp = "";
		}

		public function renseigner ($tab)
		{
			$this->nom = $tab["nom"];
			$this->prenom = $tab["prenom"];
			$this->age = $tab["age"];
			$this->genre = $tab["genre"];
			$this->email = $tab["email"];
			$this->pseudo = $tab["pseudo"];
			$this->mdp = $tab["mdp"];
			$this->confmdp = $tab["confmdp"];
		}

		public function serialiser ()
		{
			$tab = array();
			$tab["nom"] = $this->nom;
			$tab["prenom"] = $this->prenom;
			$tab["age"] = $this->age;
			$tab["genre"] = $this->genre;
			$tab["email"] = $this->email;
			$tab["pseudo"] = $this->pseudo;
			$tab["mdp"] = $this->mdp;
			$tab["confmdp"] = $this->confmdp;
			return $tab;

		}
		//Getter__setter
		public function getNom()
		{
			return $this->nom;
		}
		public function setNom($nom)
		{
			$this->nom = $nom;
		}
		public function getPrenom()
		{
			return $this->prenom;
		}
		public function setPrenom($prenom)
		{
			$this->prenom = $prenom;
		}
		public function getAge()
		{
			return $this->age;
		}
		public function setAge($age)
		{
			$this->age = $age;
		}
		public function getGenre()
		{
			return $this->genre;
		}
		public function setGenre($genre)
		{
			$this->genre = $genre;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function setEmail($email)
		{
			$this->email = $email;
		}
		public function getPseudo()
		{
			return $this->pseudo;
		}
		public function setPseudo($pseudo)
		{
			$this->pseudo = $pseudo;
		}
		public function getMdp()
		{
			return $this->mdp;
		}
		public function setMdp($mdp)
		{
			$this->mdp = $mdp;
		}
	}
?>