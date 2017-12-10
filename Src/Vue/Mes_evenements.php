<nav class="navbar sticky-top navbar-inverse justify-content-center" style="background-color: #3e3e88;">
    <a class="navbar-brand" href="" style="color:white">
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Mes événements <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
    </a>
</nav>
<br>
<div class="container">
    <div class="pays">

            <?php
            foreach ($resultats as $unResultat)
            {
                echo "  <div class='card'><div class='card-block'>
                            <div class='row '>
                                <div style=\"font-size:21px; color: #3e3e88;\" class='col text-center font-weight-bold'>
                                    ".$unResultat['Titre_event']."
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class='col-4 text-center'><img class='photo' src='Web/Images/Evenements/".$unResultat['Photo_evenement']."'></img></div>
                                <div class='col-8 align-self-center text-center'>".$unResultat['Description_event']."</br></br> 
                                    Date : ".date('d/m/Y', strtotime($unResultat['Date_evenement']))."</br>
                                    Ville : ".$unResultat['Libelle_ville']."</br>
                                    Lieu : ".$unResultat['Libelle_lieu']."</br>
                                </div>
                            </div>
                            <div class='row text-left'>
                                <div class='col'></br>
                                    Date inscription à cet événement : ".date('d/m/Y', strtotime($unResultat['dateInscription']))." 
                                </div>
                            </div>
                        </div></div></br>";
            }
            ?>
        </div>
    </div>
</div>