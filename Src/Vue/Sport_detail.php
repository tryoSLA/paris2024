<h2><?php $sport ?></h2>
<div class="container">
    <div class="pays_detail">
        <?php
        foreach ($result as $sport)
        {
            echo "
<div class='row'>
    <div class='col-12'>
        <center>
            <h3>Fiche Sports: ".$sport['Libelle_sport']."</h3>
        </center>
    </div>
</div>
<hr>
<div class='row'>
                        <div class='col'>
                            <div class='image_sport'><img src='Web/Images/Sports/".$sport['Image_sport']."'></div>
                        </div>
                   </div>
                   <div class='row'>
                        <div class='titre_details'>Description :</br></div>" .$sport['Description_sport']."
                   </div>";
        }
        $ancien_pays = "";

        $titre = "debut";
        foreach ($resultats as $unResultat)
        {
            if ($titre == "debut")
            {
                echo "<div class='row'><div class='titre_details'>Pays et athlètes : </div></div>";
                $titre = "";
            }
            if ($unResultat['Libelle_pays'] == $ancien_pays)
            {
                echo "<div class='row'>
                            <div class='nom_prenom'><a href='index.php?page=Athlete_".$unResultat['Prenom']."_".$unResultat['Nom']."'>".$unResultat['Prenom']." ".$unResultat['Nom']."</a></div>
                        </div>";
            }
            else
            {
                echo "<div class='row pays'><a href='index.php?page=Pays_".
                    $unResultat['Libelle_pays']."'>".$unResultat['Libelle_pays']."</a>
                        </div>
                        <div class='row'>
                            <div class='nom_prenom'><a href='index.php?page=Athlete_".$unResultat['Prenom']."_".$unResultat['Nom']."'>".$unResultat['Prenom']." ".$unResultat['Nom']."</a></div>
                        </div>";
            }
            $ancien_pays = $unResultat['Libelle_pays'];
        }

        ?>
        <div>
        </div>
