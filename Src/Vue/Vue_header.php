<header>
    <!-- div du header -->
    <div class="container-fluid">
        <div class="row" id="header">
            <div class="col-sm-4">
                <img src="Web/Images/Profile_site/Logo_paris_2024_simple.png" id="logo">
            </div>

            <div class="col-sm-4 d-flex align-items-center justify-content-center">
                <a href="#" id="titre">Tout Paris 2024 !</a>
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
                            <button type="submit" class="btn btn-success" name="connexion">Connexion</button>
                        </div>
                        <div class="col d-flex align-items-center">
                            <a class="btn btn-light" href="#">Inscription</a>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-controls="settings">Settings</a>
                </li>
            </ul>
        </div>
    </div>

</header>
<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">...</div>
    <div class="tab-pane" id="profile" role="tabpanel">...</div>
    <div class="tab-pane" id="messages" role="tabpanel">...</div>
    <div class="tab-pane" id="settings" role="tabpanel">...</div>
</div>
