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
                            <input type="text" name="lastName" class="form-control" id="nom" placeholder="Entrez le nom"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="prenom">Prénom</label>
                        <div class="col-sm-8">
                            <input type="text" name="firstName" class="form-control" id="prenom"
                                   placeholder="Entrez le prénom" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="age">Age</label>
                        <div class="col-sm-8">
                            <input name="age" type="number" class="form-control" id="age" placeholder="Entrez l'age"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <center>
                            <div class="form-group">

                                <select class="form-control" id="exampleSelect1">
                                    <option>Homme</option>
                                    <option>Femme</option>
                                    <i class="fa fa-male" aria-hidden="true"></i>
                                    <i class="fa fa-female" aria-hidden="true"></i>
                                </select>
                            </div>
                    </div>
                    </center>
                </div>
                <!-- deuxieme colonne du form -->
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-3" for="email">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="mail" class="form-control" id="email" placeholder="Entrez l'email"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="pseudo">Pseudo</label>
                        <div class="col-sm-8">
                            <input type="text" name="pseudo" class="form-control" id="pseudo"
                                   placeholder="Entrez le pseudo" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="password">Mot de passe</label>
                        <div class="col-sm-8">
                            <input type="password" name="password1" class="form-control" id="password"
                                   placeholder="Entrez le mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="conf_password">Confirmation mot de passe</label>
                        <div class="col-sm-8">
                            <input type="password" name="password2" class="form-control" id="conf_password"
                                   placeholder="Confirmez le mot de passe" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- boutons form -->
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <button type="reset" class="btn btn-danger">Annuler</button>
                        <button type="submit" class="btn btn-success" id="valider" name="inscription">Valider</button>
                    </center>
                </div>
            </div>
        </form>
    </div>
</inscription>

<?php
if (isset($_POST['connexion'])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $mail = $_POST["mail"];
    $pseudo = $_POST["pseudo"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
}
?>
