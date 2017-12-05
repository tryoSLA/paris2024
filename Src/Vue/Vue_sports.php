<nav class="navbar sticky-top navbar-inverse justify-content-center" style="background-color: #3e3e88;">
    <a class="navbar-brand" href="" style="color:white">
        <i class="fa fa-trophy" aria-hidden="true"></i> Les Sports <i class="fa fa-trophy" aria-hidden="true"></i>
    </a>
</nav>
<br>
<div class="container">
    <div class="sport">
        <div class="row">
            <?php
            foreach ($resultats as $unResultat)
            {
                echo "<div class='col'><a href='index.php?page=Sport_".$unResultat['Libelle_sport']."'><img src='Web/Images/Sports/"
                    .$unResultat['Image_sport']."'></img></br>"
                    .$unResultat['Libelle_sport']."</a></div>";
            }
            ?>
        </div>
    <div>
</div>

