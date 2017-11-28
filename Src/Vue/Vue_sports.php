<h2>Sports</h2>
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

