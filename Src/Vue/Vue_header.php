<header>
    <!-- div du header -->
    <div class="container-fluid">
        <div class="row" id="header">
            <div class="col-sm-4">
                <a href="index.php"><img src="Web/Images/Profile_site/Logo_paris_2024_simple.png" id="logo"></a>
            </div>

            <div class="col-sm-4 d-flex align-items-center justify-content-center">
                <a href="index.php" id="titre">Tout Paris 2024 !</a>
            </div>

            <div class="col-sm-4 d-flex justify-content-end" id="formulaire">
                <form>
                    <div class="row">
                        <!-- pseudo -->
                        <div class="input-group" id="pseudo">
                                <span class="input-group-addon">
                                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                </span>
                            <input type="text" name="pseudo" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="row">
                        <!-- mot de passe -->
                        <div class="input-group" id="passe">
                                <span class="input-group-addon">
                                    <i class="fa fa-key" aria-hidden="true"></i>
                                </span>
                            <input type="password" name="mot de passe" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="row">
                        <!-- boutons -->
                        <div class="col">
                            <button type="submit" class="btn-sm btn-success" name="connexion">Connexion</button>
                        </div>
                        <div class="col d-flex align-items-center">
                            <a class="btn-sm btn-light" href="inscription.php">Inscription</a>
                        </div>
                    </div>
                </form>
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



<!--            <ul class="nav nav-tabs" id="myTab" role="tablist">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" data-toggle="tab" href="#accueil" role="tab" aria-controls="home">Accueil</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" data-toggle="tab" href="#event" role="tab" aria-controls="profile">Evenements</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" data-toggle="tab" href="?page=pays" role="tab"-->
<!--                       aria-controls="messages">Pays des JO</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" data-toggle="tab" href="#sports" role="tab"-->
<!--                       aria-controls="settings">Sports des JO</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" data-toggle="tab" href="#galerie" role="tab"-->
<!--                       aria-controls="settings">Galerie</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" data-toggle="tab" href="#contact" role="tab"-->
<!--                       aria-controls="settings">Contact</a>-->
<!--                </li>-->
<!--            </ul>-->
        </div>
    </div>
</header>

