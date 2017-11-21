<h2>Pays</h2>
<div class="container">
    <div class="pays">
        <div class="row">
            <?php
                foreach ($resultats as $unResultat)
                {
                    echo "<div class='col'><a href='index.php?page=Pays_".$unResultat['Libelle_pays']."'><img src='Web/Images/Pays/"
                        .$unResultat['Image_pays']."'></img></br>"
                        .$unResultat['Libelle_pays']."</a></div>";
                }
            ?>
        </div>
    <div>
</div>
