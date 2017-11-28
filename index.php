<?php
include ('Src/Controleur/Controleur.php');
include ('Src/Function/Rss.php');
require ('Src/Modele/Controleur_bdd.php');
$Controleur = new Controleur();
$unModele = new Modele('localhost', 'paris_2024', 'user_paris2024', '123');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paris 2024</title>
    <link rel="icon" type="image/png" href="Web/Images/Profile_site/Logo_paris_2024_simple.png" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->




    <!--css bootstrap -->
    <link rel="stylesheet" href="Web/Css/Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Web/Css/Bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="Web/Css/Bootstrap/css/bootstrap-reboot.css">

    <!-- css font awesome -->
    <link rel="stylesheet" href="Web/Css/Font_awesome/css/font-awesome.css">

    <!-- css perso -->
    <link rel="stylesheet" href="Web/Css/My_css/Header.css">
    <link rel="stylesheet" href="Web/Css/My_css/accueil.css">
    <link rel="stylesheet" href="Web/Css/My_css/Sport_Pays.css">
</head>
<body>

<?php
$Controleur->header();

//Switch menu


if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = "NAN";
}

switch ($page)
{
    case "inscription":
        $Controleur->inscription();
        break;

    case "accueil":
        $Controleur->accueil();
        break;

    case "event":
        echo "event";
        break;

    case "pays":
        echo "pays";
        $unModele->setTable("Pays"); //on pointe vers la table
        $tab = array("Image_pays", "Libelle_pays");
        $resultats = $unModele->selectChamps($tab);
        include ('Src/Vue/Vue_pays.php');
        break;

    case "sport":
        $unModele->setTable("Sport"); //on pointe vers la table
        $tab = array("Image_sport", "Libelle_sport");
        $resultats = $unModele->selectChamps($tab);
        include ('Src/Vue/Vue_sports.php');
        break;
    case strstr($page,"Pays_"):
        $pays = str_replace("Pays_","",$page);
        $champ = 'Libelle_pays';
        $unModele->setTable("pays"); //on pointe vers la table
        $result = $unModele->selectWhere("Libelle_pays, Image_Pays, Description_Pays",$champ,$pays);
        $unModele->setTable("pays_detaille"); //on pointe vers la table
        $resultats = $unModele->selectWhere("*",$champ,$pays);
        include ('Src/Vue/Pays_detail.php');
        break;

    case strstr($page,"Sport_"):
        $sport = str_replace("Sport_","",$page);
        $champ = 'Libelle_sport';
        $unModele->setTable("sport"); //on pointe vers la table
        $result = $unModele->selectWhere("Libelle_sport, Image_sport, Description_sport",$champ,$sport);
        $unModele->setTable("sport_detaille"); //on pointe vers la table
        $resultats = $unModele->selectWhere("*",$champ,$sport);
        include ('Src/Vue/Sport_detail.php');
        break;

    case strstr($page,"Athlete_"):
        $athlete = str_replace("Athlete_","",$page);
        $champ = 'Libelle_sport';
        $unModele->setTable("sport_detaille"); //on pointe vers la table
        $resultats = $unModele->selectWhere("*",$champ,$sport);
        include ('Src/Vue/Sport_detail.php');
        break;

    case "galerie":
        echo "galerie";
        break;

    case "contact":
        echo "contact";
        break;

    case "NAN":
        echo " ";
        break;
}
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
