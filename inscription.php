<?php
include ('Src/Controleur/Controleur.php');
$Controleur = new Controleur();
include ('Src/Modele/Controleur_bdd.php');
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
</head>
<body>
<?php
$Controleur->header2();
$Controleur->inscription();

if (isset($_POST['inscription'])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $genre = $_POST["genre"];
    $mail = $_POST["mail"];
    $pseudo = $_POST["pseudo"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    $verifMail = $unModele->selectWhere("email", $mail);
    if ($password1 == $password2 && strlen($password2) <= 8){
        if (empty($verifMail)){
            $tab = "'".$firstName."','".$lastName."',".$age.",'".$genre."','".$mail."','".$pseudo."','".md5($password1)."'";
            $unModele->insertOne($tab);
        }else {
            echo "<br><div class=\"alert alert-danger\" role=\"alert\">
                    <center>
                      <strong>Erreur !</strong> Email déjà utilisé
                      </center>
                    </div>";
        }
    }
    else{
        echo "<br><div class=\"alert alert-danger\" role=\"alert\">
<center>
  <strong>Erreur !</strong> Le mots de passe est invalide ou n'est pas identique.
  </center>
</div>";
    }

}
?>
</body>
</html>