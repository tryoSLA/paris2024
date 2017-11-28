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


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!--css bootstrap -->
    <link rel="stylesheet" href="Web/Css/Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Web/Css/Bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="Web/Css/Bootstrap/css/bootstrap-reboot.css">

    <!-- css font awesome -->
    <link rel="stylesheet" href="Web/Css/Font_awesome/css/font-awesome.css">

    <!-- css perso -->
    <link rel="stylesheet" href="Web/Css/My_css/Header.css">
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

</body>
</html>
