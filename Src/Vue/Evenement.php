<h2>Evenements</h2>
<div class="container">
    <div class="pays_detail">
        <?php
        $ancienne_date = "";
        foreach ($resultats as $unResultat)
        {
            if ($unResultat['Date_evenement'] == $ancienne_date)
            {
                echo "<div class='row'>
                            <div class=''>".date("dd M Y", strtotime($unResultat['Date_evenement']))."</div>
                        </div>";
            }
            else
            {
                echo "<div class='row'>".$unResultat['Date_evenement']."</div>
                        <div class='row'>
                            <div class=''>".$unResultat['Titre_event']."</br></div>
                        </div>
                        <div class='row'>
                            <div class='col-2'><img src='Web/Images/Evenements/".$unResultat['Photo_evenement']."'></div>
                            <div class='col-10'>".$unResultat['Description_event']."</div>
                        </div>
                        ";
            }
            $ancienne_date = $unResultat['Date_evenement'];
        }


        ?>
        <div>
        </div>
