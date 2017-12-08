<?php
include ('Src/Controleur/Controleur.php');
include ('Src/Function/Rss.php');
include ('Src/Modele/Controleur_bdd.php');
include ('bdd/database.php');
$Controleur = new Controleur();

session_start();
//----------------Appel de la sauvegarde des flux en BDDD-------------------
$Controleur->saveArticle("https://news.google.com/news/rss/search/section/q/paris%202024/paris%202024?hl=fr&gl=FR&ned=fr",$unModele, $con);
$Controleur->saveArticle("https://queryfeed.net/twitter?q=%23paris2024&title-type=tweet-text-full&geocode=",$unModele, $con);
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>

<?php
//------------------Appel du Header/menu----------------------
$Controleur->header();

//-----------------Gestion de l'inscription-------------------
$Controleur->inscriptionBdd($unModele);

//------------------------Gestion de la Connexion-------------
if (isset($_POST['connexion'])) {
    $mail = $_POST["mail"];
    $password = $_POST["pass"];
    $Controleur->connexion($mail, $password, $unModele);
}

//------------------------------Switch menu-------------------
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
    case "accueil":
        $Controleur->accueil();
        break;

    case "event":
        $Controleur->event($unModele);
        break;

    case "pays":
        $Controleur->pays($unModele);
        break;

    case "sport":
        $Controleur->sports($unModele);
        break;

    case strstr($page,"Pays_"):
        $Controleur->details_pays($unModele, $page);
        break;

    case strstr($page,"Sport_"):
        $Controleur->details_sport($unModele, $page);
        break;

    case strstr($page,"Athlete_"):
        $Controleur->details_athlete($unModele, $page);
        break;

    case "my_events":
            $Controleur->my_events($unModele);
        break;

    case "galerie":
        $Controleur->galerie();
        break;

    case "contact":
        $Controleur->contact();
        break;

    case "NAN":
        $Controleur->accueil();
        break;
}
?>
</body>
</html>
