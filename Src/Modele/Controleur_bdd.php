<?php

class Modele
{
   private $pdo, $table;
   public function __construct($serveur, $bdd, $user, $mdp)
   {
       $this->pdo = null;
       try
       {
           $this->pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user,$mdp);
           $this->pdo->exec("SET CHARACTER SET utf8");
       }
       catch(Exception $exp)
       {
            echo "Erreur de connexion a la base de donnee";
       }
   }

    public function setTable($uneTable)
    {
        $this->table = $uneTable;
    }

    public function selectAll()
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
    }

    public function selectChamps($tab)
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
    }

    public function selectWhere($selection, $where="" , $chaine="", $group="", $order="")
    {
        if ($this->pdo != null)
        {
            $requete = "SELECT ".$selection." FROM ".$this->table." ". $chaine."  ".$where." ".$group." ".$order;
            $select = $this->pdo->prepare($requete);
            $select->execute();
            $resultats = $select->fetchAll();
            return $resultats;
        }
        else
        {
            return null;
        }
    }

    public function insertOne($tab)
    {
        if ($this->pdo != null)
        {
            $requete = "call insert_user (".$tab.");";
            $select = $this->pdo->prepare($requete);
            $select->execute();
        }
        else
        {
            return null;
        }
    }

    public function insert($value)
    {
        if ($this->pdo != null)
        {
            $requete = "INSERT INTO ".$this->table." VALUES (".$value.");";
            $select = $this->pdo->prepare($requete);
            $select->execute();
        }
        else
        {
            return null;
        }
    }

}

?>
