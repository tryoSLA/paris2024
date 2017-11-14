<!-- formulaire d'inscription -->
<inscription>
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
            <h2>Inscription</h2>
        </div>
        <br>
        <form>
            <!-- entrees form -->
            <div class="row">
                <!-- premiere colonne du form -->
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-3" for="nom">Nom</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nom" placeholder="Entrez le nom" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="prenom">Prénom</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="prenom" placeholder="Entrez le prénom" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="age">Age</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="age" placeholder="Entrez l'age" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="genre">Genre</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- colonne vide pour l'espacement -->
                                </div>
                                <div class="col-sm-3" id="femme">
                                    <img src="Web/Images/Icons/Logo_femme_petit.png">
                                    <input type="radio" class="genre" name="genre" required>
                                </div>
                                <div class="col-sm-3" id="homme">
                                    <img src="Web/Images/Icons/Logo_homme_petit.png">
                                    <input type="radio" class="genre" name="genre" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- deuxieme colonne du form -->
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-3" for="email">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" placeholder="Entrez l'email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="pseudo">Pseudo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pseudo" placeholder="Entrez le pseudo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="password">Mot de passe</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" placeholder="Entrez le mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="conf_password">Confirmation mot de passe</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="conf_password" placeholder="Confirmez le mot de passe" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- boutons form -->
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success" id="valider">Valider</button>
                </div>
                <div class="col-sm-6">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</inscription>
