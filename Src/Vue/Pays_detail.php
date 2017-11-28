<h2><?php $pays ?></h2>
<div class="container">
    <div class="pays_detail">
            <?php
            foreach ($result as $pays)
            {
                echo "<div class='row'>
                            <div class='col'>
                                <div class='image_pays'><img src='Web/Images/Pays/".$pays['Image_Pays']."'></div>
                                <div class='libelle_pays'>".$pays['Libelle_pays']."</div>
                            </div>
                       </div>
                       <div class='row'>
                            <div class='titre_details'>Description :</br></div>" .$pays['Description_Pays']."
                       </div>";
            }
            $ancien_sport = "";

            $titre = "debut";
            foreach ($resultats as $unResultat)
            {
                if ($titre == "debut")
                {
                    echo "<div class='row'><div class='titre_details'>Sport et athlètes : </div></div>";
                    $titre = "";
                }
                if ($unResultat['Libelle_sport'] == $ancien_sport)
                {
                    echo "<div class='row'>
                            <div class='nom_prenom'>" .$unResultat['Prenom']." ".$unResultat['Nom']."</div>
                        </div>";
                }
                else
                {
                    echo "<div class='row'><a href='index.php?page=Sport_".
                            $unResultat['Libelle_sport']. "'>".$unResultat['Libelle_sport']."</a>
                          </div>
                          <div class='row'>
                            <div class='nom_prenom'>" .$unResultat['Prenom']." ".$unResultat['Nom']. "</div>
                        </div>";
                }
                $ancien_sport = $unResultat['Libelle_sport'];
            }


            ?>
    <div>
</div>
