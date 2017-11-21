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
?>

<!-- css perso -->
<div class="tab-content">
    <!-- accueil -->
    <div class="tab-pane active" id="accueil" role="tabpanel">
        <?php
        $Controleur->accueil();
        ?>
    </div>
    <!-- event -->
    <div class="tab-pane" id="event" role="tabpanel">
        <?php
        $Controleur->event();
        ?>
    </div>
    <!-- pays -->
    <div class="tab-pane" id="pays" role="tabpanel">

        <?php
            $unModele->setTable("Pays"); //on pointe vers la table
            $tab = array("Image_pays", "Libelle_pays");
            $resultats = $unModele->selectChamps($tab);
            include ('Src/Vue/Vue_pays.php');
            exit();
        ?>
    </div>
    <!-- sport -->
    <div class="tab-pane" id="sports" role="tabpanel">
        <?php
        $Controleur->sports();
        ?>
    </div>
    <!-- galerie -->
    <div class="tab-pane" id="galerie" role="tabpanel">
        <?php
        $Controleur->galerie();
        ?>
    </div>
    <!-- contact -->
    <div class="tab-pane" id="contact" role="tabpanel">
        <?php
        $Controleur->contact();
        ?>
    </div>
</div>
<?php
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
    case stristr($page,'Pays_'):
        $Controleur->pays_detaille($page);
    case "NAN":
        echo " ";
        break;
}
?>

</body>
</html>
