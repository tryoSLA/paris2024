<h2><?php $pays ?></h2>
<div class="container">
    <div class="pays_detail">
        <?php

        foreach ($resultats as $unResultat)
        {
                echo "<div class='row'>
                        <div class='col-2'>
                            <div class='nom_prenom_athlete'><img class='photo' src='Web/Images/Athlete/".$unResultat['Photo']."'></br>".$unResultat['Prenom']." ".$unResultat['Nom']."</div>
                        </div>
                        <div class='col align-self-center'>".$unResultat['Biographie']."</div>
                      </div>";
                echo "<div class='titre_details'>Informations complémentaires :</div>";
                echo "<div class='row'>
                        <div class='col info_compl'>
                            Genre : ".$unResultat['Genre']."</br>
                            Taille : ".$unResultat['Taille']."</br>
                            Poids : ".$unResultat['Poids']."</br>
                            Pays : ".$unResultat['Libelle_pays']."</br>
                            Sport : ".$unResultat['Libelle_sport']."</br>
                            </div>
                        </div>";

        }


        ?>
        <div>
        </div>
