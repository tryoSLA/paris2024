<h2>Pays</h2>
<table border="1">
<div class="row">
        <?php
            foreach ($resultats as $unResultat)
            {
                echo "<div class='col'><a href='Src/Vue/Vue_pays_detaille_".$unResultat['Libelle_pays'].".php'><img src='Web/Images/Pays/"
                    .$unResultat['Image_pays']."'></img></br>"
                    .$unResultat['Libelle_pays']."</a></div>";
            }
        ?>
<div>
