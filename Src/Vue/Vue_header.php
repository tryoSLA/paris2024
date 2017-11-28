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

            <div class="col-sm-2 align-items-center justify-content-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Connexion">
                        Connexion
                    </button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="inscription.php">Inscription</a>

                    </div>
                </div>
            </div>
            <!-- menu -->
            <nav id="menu">
                <ul>
                    <li><a href="index.php?page=accueil">Accueil</a></li>
                    <li><a href="index.php?page=event">Evenements</a></li>
                    <li><a href="index.php?page=pays">Pays des JO</a></li>
                    <li><a href="index.php?page=sport">Sport des JO</a></li>
                    <li><a href="index.php?page=galerie">Galerie</a></li>
                    <li><a href="index.php?page=contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="modal fade" id="Connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <form>

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
                        <input class="form-control" type="text" placeholder="Email address">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input class="form-control" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="inscription.php">inscription</a>
                    <button type="submit" class="btn-sm btn-success" name="connexion">Connexion</button>
                </div>
            </div>
        </div>
    </form>
</div>

