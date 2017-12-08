<header>
    <!-- div du header -->
    <div class="container-fluid">
        <div class="row" id="header">
            <div class="col-sm-2">
                <a href="index.php"><img src="Web/Images/Profile_site/Logo_paris_2024_simple.png" id="logo"></a>
            </div>

            <div class="col-sm-8 d-flex align-items-center justify-content-center">
                <a href="index.php" id="titre">Tout Paris 2024 !</a>
            </div>
            <?php
            if (!isset($_SESSION['nom'])) {
                echo "<div class=\"col-sm-2 align-items-center justify-content-center\">
                <div class=\"btn-group\">
                    <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#Connexion\">
                        Connexion <i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>
                    </button>
                    <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <span class=\"sr-only\">Toggle Dropdown</span>
                    </button>
                    <div class=\"dropdown-menu\">
                        <a class=\"dropdown-item\" href=\"inscription.php\">Inscription</a>

                    </div>
                </div>
            </div>";
            }else{
                echo "<a href=\"deconnexion.php\">
                    <button class=\"btn btn-danger\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></button>
                </a>";
            }
                ?>

            <!-- menu -->
            <nav id="menu">
                <ul>
                    <a href="index.php?page=accueil"><li>Accueil</li></a>
                    <a href="index.php?page=event"><li>Événements</li></a>
                    <a href="index.php?page=pays"><li>Pays des JO</li></a>
                    <a href="index.php?page=sport"><li>Sport des JO</li></a>
                    <?php
                    if (isset($_SESSION['id']))
                    {
                        echo "<a href=\"index.php?page=my_events\"><li>Mes événements</li></a>";
                    }
                    ?>
                    <a href="index.php?page=galerie"><li>Galerie</li></a>
                    <a href="index.php?page=contact"><li>Contact</li></a>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="modal fade" id="Connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <form method="POST" action="index.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Connexion :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control" name="mail" type="text" placeholder="E-mail">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input class="form-control" name="pass" type="password" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="inscription.php">Inscription</a>
                    <button type="submit" class="btn-sm btn-success" name="connexion">Connexion</button>
                </div>
            </div>
        </div>
    </form>
</div>

