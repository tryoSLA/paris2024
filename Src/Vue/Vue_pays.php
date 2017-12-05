<nav class="navbar sticky-top navbar-inverse justify-content-center" style="background-color: #3e3e88;">
    <a class="navbar-brand" href="" style="color:white">
        <i class="fa fa-globe" aria-hidden="true"></i> Les Pays <i class="fa fa-globe" aria-hidden="true"></i>
    </a>
</nav>
<br>
<div class="container">
    <div class="pays">
        <div class="row">
            <?php
                foreach ($resultat as $unResultat)
                {
                    echo "<div class='col'><a href='index.php?page=Pays_".$unResultat['Libelle_pays']."'><img src='Web/Images/Pays/"
                        .$unResultat['Image_pays']."'></img></br>"
                        .$unResultat['Libelle_pays']."</a></div>";
                }
            ?>
        </div>
    <div>
</div>
