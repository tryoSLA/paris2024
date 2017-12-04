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

        if (isset($_POST['connexion'])) {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $age = $_POST["age"];
            $mail = $_POST["mail"];
            $pseudo = $_POST["pseudo"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];

            inscription($mail, $password1,$password2, $firstName, $age, $pseudo, $lastName);
        }
    }

    public function accueil()
    {
        include ('Src/Vue/Accueil.php');
    }

    public function event()
    {
        include ('Src/Vue/Evenement.php');
    }

    public function pays()
    {
        include ('Src/Vue/Vue_pays.php');
    }

    public function sports()
    {
        include ('Src/Vue/Vue_sports.php');
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
}
?>
