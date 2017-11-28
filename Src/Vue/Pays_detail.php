<h2><?php $pays ?></h2>
<div class="container">
    <div class="pays_detail">
            <?php
            foreach ($result as $pays)
            {
                echo "<div class='row'>
                            <div class='col'><img src='Web/Images/Pays/" .$pays['Image_Pays']."'></br>".$pays['Libelle_pays']."</div>
                            <div class='col'>" .$pays['Description_Pays']. "</div>
                        </div>";
            }

            foreach ($resultats as $unResultat)
            {
                echo "<div class='row'>
                            <div class='col'>" .$unResultat['Libelle_sport']. "</div>
                            <div class='col'>" .$unResultat['Nom']. "</div>
                            <div class='col'>" .$unResultat['Prenom']. "</div>
                        </div>";
            }

            ?>
        </div>
    <div>
</div>
