<?php

include ("Modele.php");

class Controleur
{
    private $uneBdd;
    public function __construct($server,$bdd,$user,$mdp, $table)
    {
        $this->uneBdd = new Bdd ($server,$bdd,$user,$mdp);
        $this->uneBdd->setTable($table);
    }

    public function selectAll()
    {
        return $this->uneBdd->selectAll();
    }

    public function insert($unEleve){
        //traitement des donnée de l'élèves
        if ($unEleve->getAge() <= 0)
        {
            $unEleve->setAge(0);
        }
        $tab = $unEleve->serialiser();
        $this->uneBdd->insert($tab);
    }

    public function rechercher ($tab,$motcle)
    {
        return $this->uneBdd->rechercher($tab,$motcle);
    }

    public function supprimer ($tab)
    {
        $this->uneBdd->supprimer($tab);
    }

    public function selectChamps($tab)
    {
        return $this->uneBdd->selectChamps($tab);
    }

}


?>