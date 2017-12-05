<h2>Evenements</h2>
<div class="container">
    <div class="pays_detail">
        <?php
        $ancienne_date = "";

        foreach ($resultats as $unResultat) {
            if ($unResultat['Date_evenement'] == $ancienne_date) {
                echo "
                        <div class='card'><div class='card-block'>
                            <div class='row'>
                                <div class='col'><li>" . $unResultat['Titre_event'] . "</li></br></div>
                            </div>
                            <div class='row'>
                                <div class='col-2'><img src='Web/Images/Evenements/" . $unResultat['Photo_evenement'] . "'></div>
                                <div class='col-10'>" . $unResultat['Description_event'] . "</div></br>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col'>
                                <form>
                                    <div class=\"text-center\">
                                        <button type='submit' class='btn btn-outline-success'><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i></button>
                                        <button type='submit' class='btn btn-outline-danger'><i class=\"fa fa-times fa-2x\" aria-hidden=\"true\"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>";
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
                            <div class='col-2'><img src='Web/Images/Evenements/" . $unResultat['Photo_evenement'] . "'></div>
                            <div class='col-10'>" . $unResultat['Description_event'] . "</div>  
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            <form>
                                <div class=\"text-center\">
                                        <button type='submit' class='btn btn-outline-success'><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i></button>
                                        <button type='submit' class='btn btn-outline-danger'><i class=\"fa fa-times fa-2x\" aria-hidden=\"true\"></i></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    </div></br>";
            }
            $ancienne_date = $unResultat['Date_evenement'];
        }


        ?>
        <div>
        </div>
