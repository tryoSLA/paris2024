<?php
$Controleur = new Controleur();
?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-5">News</h1>
        <p class="lead">Retrouvez toute l'actualité sur les jeux de 2024.</p>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 journaux" >
            <center>
                <h3 class="card-title"><u>Journaux</u></h3>
                <h4 class="card-title"><i class="fa fa-newspaper-o" aria-hidden="true"></i></h4>
            </center>
            <div class="row">
                <?php
                $Controleur->rssAfficher("https://news.google.com/news/rss/search/section/q/paris%202024/paris%202024?hl=fr&gl=FR&ned=fr");
                ?>
            </div>
        </div>
        <div class="col-sm-6 reseaux">
            <center>
                <h3 class="card-title"><u>Réseaux Sociaux</u></h3>
                <h4 class="card-title">
                    <i class="fa fa-twitter-square" aria-hidden="true"></i></h4>
            </center>
            <div class="row">
                <?php
                $Controleur->rssAfficher("https://queryfeed.net/twitter?q=%23paris2024&title-type=tweet-text-full&geocode=");
                ?>
            </div>
        </div>
    </div>
</div>