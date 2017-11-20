<h2>Pays</h2>
<div class="container">
    <div class="pays">
        <div class="row">
            <?php
                foreach ($resultats as $unResultat)
                {
                    echo "<div class='col'><a href='Src/Vue/Vue_pays_detaille_".$unResultat['Libelle_pays'].".php'><img src='Web/Images/Pays/"
                        .$unResultat['Image_pays']."'></img></br>"
                        .$unResultat['Libelle_pays']."</a></div>";
                }
            ?>
        </div>
    <div>
</div>
