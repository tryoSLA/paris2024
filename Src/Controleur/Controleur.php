<?php
class Controleur
{
    public function header()
    {
        include ('Src/Vue/Vue_header.php');
    }

    public function header2()
    {
        include ('Src/Vue/Vue_header_2.php');
    }

    public function inscription()
    {
        include ('Src/Form/Form_inscription.php');
    }

    public function accueil()
    {
        include ('Src/Vue/Accueil.php');
    }

    public function event($unModele)
    {
        $unModele->setTable("evenement");
        $tab = array("Titre_event","Description_event","Date_evenement","Photo_evenement","id_ville", "id_type_event");
        $resultats = $unModele->selectChamps($tab);
        include ('Src/Vue/Evenement.php');
    }

    public function pays($unModele)
    {
        $unModele->setTable("Pays"); //on pointe vers la table
        $tab = array("Image_pays", "Libelle_pays");
        $resultats = $unModele->selectChamps($tab);
        include ('Src/Vue/Vue_pays.php');
    }

    public function details_pays($unModele, $page)
    {
        $pays = str_replace("Pays_","",$page);
        $where = " WHERE Libelle_pays = '".$pays."'";
        $unModele->setTable("pays"); //on pointe vers la table
        $result = $unModele->selectWhere("Libelle_pays, Image_Pays, Description_Pays",$where);
        $unModele->setTable("pays_detaille"); //on pointe vers la table
        $resultats = $unModele->selectWhere("*",$where);
        include ('Src/Vue/Pays_detail.php');
    }

    public function details_sport($unModele, $page)
    {
        $sport = str_replace("Sport_","",$page);
        $where = " WHERE Libelle_sport = '".$sport."'";
        $unModele->setTable("sport"); //on pointe vers la table
        $result = $unModele->selectWhere("Libelle_sport, Image_sport, Description_sport",$where);
        $unModele->setTable("sport_detaille"); //on pointe vers la table
        $resultats = $unModele->selectWhere("*",$where);
        include ('Src/Vue/Sport_detail.php');
    }

    public function sports($unModele)
    {
        $unModele->setTable("Sport"); //on pointe vers la table
        $tab = array("Image_sport", "Libelle_sport");
        $resultats = $unModele->selectChamps($tab);
        include ('Src/Vue/Vue_sports.php');
    }

    public  function  details_athlete($unModele, $page)
    {
        $athlete = str_replace("Athlete_","",$page);//split
        $tableau = explode("_", $athlete);
        //echo $tableau[0]."__".$tableau[1];
        $where = " WHERE prenom = '".$tableau[0]."' AND nom = '".$tableau[1]."'";
        $unModele->setTable("athlete_detaille"); //on pointe vers la table
        $resultats = $unModele->selectWhere("*",$where);
        include ('Src/Vue/Athlete_detail.php');
    }

    public function galerie()
    {
        include ('Src/Vue/Vue_galerie.php');
    }

    public function contact()
    {
        include ('Src/Vue/Vue_contact.php');
    }

    public function rssAfficher($url)
    {
        $rss = new Rss();
        $rss->rssArticle($url);
    }

    function connexion($mail, $password, $unModele)
    {
        $unModele->setTable("Utilisateur");
        $recherche = 'email="'.$mail.'" AND mot_de_passe="'.md5($password).'" ';
        $resultat = $unModele->selectWhere("count(*) as nb, pseudo, id_personne ",$recherche, " where " );
        if ($resultat["0"]["nb"] == 1) {
            $_SESSION['mail'] = $mail;
            $_SESSION['pseudo'] = $resultat["0"]["pseudo"];
            $_SESSION['id'] = $resultat["0"]["id_personne"];
            $unModele->setTable("Personne");
            $recherche = ' id_personne='.$_SESSION['id'].' ';
            $resultat = $unModele->selectWhere(" * ",$recherche, " where ");
            $_SESSION['nom'] = $resultat[0]['Nom'];
            $_SESSION['prenom'] = $resultat[0]['Prenom'];
            $_SESSION['age'] = $resultat[0]['Age'];
            $_SESSION['genre'] = $resultat[0]['Genre'];
        }
        elseif ($resultat[0] == 0) {
            $erreur = '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Compte non reconnu.
                    </div>';
            echo $erreur;
        } // sinon, alors la, il y a un gros problème :)
        else {
            $erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
            echo $erreur;
        }
    }

    public function saveArticle($urlJournal, $unModele, $con)
    {
        $unModele->setTable("FluxRSS");
        $url = $urlJournal;
        $rss = simplexml_load_file($url);
        $i = 0;
        foreach ($rss->channel->item as $item) {
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, "Y/m/d H:i:s");
            $title = $item->title;
            $link = $item->link;
            $description = $item->description;
            $desc = mysqli_real_escape_string($con, $description);
            $titre = mysqli_real_escape_string($con, $title);
            $i++;
            $value = 'NULL, "'.$urlJournal.'", "'.$link.'", "'.$titre.'", "'.$desc.'", "'.$date.'"';
            $unModele->insert($value);
        }
    }

    public function afficherArticle($unModele, $rss)
    {
        $where = " WHERE rss = '".$rss."'";
        $unModele->setTable("fluxrss"); //on pointe vers la table
        $resultat = $unModele->selectWhere("Lien, Titre, Description, Date",$where);

        foreach ($resultat as $unResultat)
        {
            $link = $unResultat['Lien'];
            echo "
            <div class=\"col-sm-12\" style='margin-bottom: 10px '>
                <div class='card card-block h-100 justify-content-center'>
                    <div class='card-block'>
                    <center>
                    <br>
                        <h5 class='card-title'><a href='$link'>" .$unResultat['Description']  . "</a></h5>
                        " . $unResultat['Date'] . "<a href='$link'>
                        <br>
                        <small>Lien</small></a><br>
                        <br>
                     </center>
                    </div>
                </div>
            </div>
            ";
        }
    }
}
?>
