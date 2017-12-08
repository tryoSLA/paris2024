<nav class="navbar sticky-top navbar-inverse justify-content-center" style="background-color: #3e3e88;">
    <a class="navbar-brand" href="" style="color:white">
        <i class="fa fa-calendar" aria-hidden="true"></i> Evenement <i class="fa fa-calendar" aria-hidden="true"></i>
    </a>
</nav>
<br>
<div class="container">
    <div class="pays_detail">
        <?php
        $ancienne_date = "";
        $i = 0;
        foreach ($resultats as $unResultat) {
            if (isset($_SESSION['id'])) {
                $unModele->setTable("Inscrire");
                $where = " WHERE id_personne = ".$_SESSION['id']." AND id_event = ".$unResultat['id_event'];
                $result = $unModele->selectCount($where);
            }
            if ($unResultat['Date_evenement'] == $ancienne_date) {
                echo "
                        <div class='card'><div class='card-block'>
                            <div class='row'>
                                <div class='col'><li>" . $unResultat['Titre_event'] . "</li></br></div>
                            </div>
                            <div class='row'>
                                <div class='col-4 text-center'><img class='photo' src='Web/Images/Evenements/" . $unResultat['Photo_evenement'] . "'></div>
                                <div class='col-8 align-self-center text-center'>" . $unResultat['Description_event'] . "</div></br>
                            </div>
                        </div>";
                if (isset($_SESSION['nom'])) {
                    echo "
                        <div class='row'>
                            <div class='col'>
                                <form method='post'>
                                    <div class=\"text-center\">";
                                        if ($result['nb'] == 0)
                                        {
                                            echo "<button name='participe' value='" . $unResultat['id_event'] . "' type='submit' class='btn btn-outline-success'><i class=\"fa fa-calendar-plus-o fa-2x\" aria-hidden=\"true\"></i></button>";
                                        }
                                        elseif ($result['nb'] >= 1)
                                        {
                                            echo "<button name='non_participe' value='" . $unResultat['id_event'] . "' type='submit' class='btn btn-outline-danger'><i class=\"fa fa-calendar-minus-o fa-2x\" aria-hidden=\"true\"></i></button>";
                                        }
                                    echo "</div>
                                </form>
                            </div>
                        </div>";
                }
                //echo "</div>";
            } else {
                echo "
                    <div class='row'>
                        <div class='col'>
                            <div class=\"text-center\">
                                <h4 class=\"card-title\"><i class=\"fa fa-calendar fa-2x text-primary\" aria-hidden=\"true\"></i></h4>
                                <p class=\"card-text\"> Le " . date('d/m/Y', strtotime($unResultat['Date_evenement'])) . " :</p></br>
                            </div>
                        </div>
                    </div>
                    <div class='card'><div class='card-block'>
                        <div class='row'>
                           <div class='col'><li>" . $unResultat['Titre_event'] . "</li></br></div>
                        </div>
                        <div class='row'>
                            <div class='col-4 text-center'><img class='photo' src='Web/Images/Evenements/" . $unResultat['Photo_evenement'] . "'></div>
                            <div class='col-8 align-self-center text-center'>" . $unResultat['Description_event'] . "</div>  
                        </div>
                    </div>";
                if (isset($_SESSION['nom'])){
                    echo"
                    <div class='row'>
                        <div class='col'>
                            <form method='post'>
                                <div class=\"text-center\">";
                                    if ($result['nb'] == 0) {
                                        echo "<button name='participe' value='" . $unResultat['id_event'] . "' type='submit' class='btn btn-outline-success'><i class=\"fa fa-calendar-plus-o fa-2x\" aria-hidden=\"true\"></i></button>";
                                    }
                                    else if ($result['nb'] >= 1)
                                    {
                                        echo "<button name='non_participe' value='" . $unResultat['id_event'] . "' type='submit' class='btn btn-outline-danger'><i class=\"fa fa-calendar-minus-o fa-2x\" aria-hidden=\"true\"></i></button>";
                                    }
                                echo "</div>
                            </form>
                        </div>
                    </div>";
                    };
                    echo"</div></br>";
            }
            $ancienne_date = $unResultat['Date_evenement'];
        }

        ?>