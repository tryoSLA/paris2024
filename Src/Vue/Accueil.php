<?php
$Controleur = new Controleur();
$unModele = new Modele('localhost', 'paris_2024', 'user_paris2024', '123');
?>
<nav class="navbar sticky-top navbar-inverse justify-content-center" style="background-color: #3e3e88;">
    <a class="navbar-brand" href="" style="color:white">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i> News <i class="fa fa-twitter-square" aria-hidden="true"></i>
    </a>
</nav>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 journaux" >
            <center>
                <h3 class="card-title"><u>Journaux</u></h3>
            </center>
            <div class="row">
                <?php
//                $Controleur->rssAfficher("https://news.google.com/news/rss/search/section/q/paris%202024/paris%202024?hl=fr&gl=FR&ned=fr");
                $Controleur->afficherArticle($unModele, "https://news.google.com/news/rss/search/section/q/paris%202024/paris%202024?hl=fr&gl=FR&ned=fr");

                ?>
            </div>
        </div>
        <div class="col-sm-6 reseaux">
            <center>
                <h3 class="card-title"><u>Twitter</u></h3>
            </center>
            <div class="row">
                <?php
//                $Controleur->rssAfficher("https://queryfeed.net/twitter?q=%23paris2024&title-type=tweet-text-full&geocode=");
                $Controleur->afficherArticle($unModele, "https://queryfeed.net/twitter?q=%23paris2024&title-type=tweet-text-full&geocode=");
                ?>
            </div>
        </div>
    </div>
</div>