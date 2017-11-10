<?php
 include ("Menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-beta-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="base.css">
	<link rel="stylesheet" type="text/css" href="Inscription.css">
	<title>Inscription</title>
</head>
<body>
	<div class="contenu">
        <div class="row">
            <div class="col align-self-center">
                <h2 id="titre">Inscription</h2>
            </div>
        </div>
        <div id="formulaire" class="formulaire">
            <form> <!--Formulaire d'inscription-->
                <!--id_personne en auto increment-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="nom">Nom : </label><input type="text" id="nom" name=""><br>
                            <label for="prenom">Prenom :</label><input type="text" id="prenom" name=""><br>
                            <label for="age">Age : </label><input type="number" id="age" name=""><br>
                            <label id="genre" for="genre">Genre : </label>
                                <div id="femme">
                                    <img src="Images/Logo_femme_petit.png">  <input type="radio" class="genre" name="genre"> 
                                </div>             
                                <div id="homme">
                                    <img src="Images/Logo_homme_petit.png">  <input type="radio" class="genre" name="genre"><br>
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email : </label><input type="email" id="email" name=""><br>
                            <label for="pseudo">Pseudo : </label><input type="text" id="pseudo" name=""><br>
                            <label for="motdepasse">Mot de passe : </label><input type="password" id="mdp" name=""><br>
                            <label for="confirmmdp">Confirmation : </label><input type="password" id="confmdp" name=""><br><br>
                            <input type="submit" name="inscription" value="S'inscrire">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


<?php
include ("Class_utilisateur.php");
include ("Controleur.php");
$uneBdd = new Bdd("localhost","paris_2024", "user_paris2024","123","personne");
if(isset($_POST['inscription']))
{
    $unUtilisateur = new Utilisateur();
    $unUtilisateur->renseigner($_POST);
    $unC->insert($unUtilisateur);
    echo "Insertion réussie";
}


?>