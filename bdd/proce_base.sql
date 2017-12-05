#------------------------------------------------------------
# Procedure insertion table athlete
#------------------------------------------------------------

DELIMITER |
CREATE PROCEDURE insert_athlete (IN nom varchar(25), prenom VARCHAR(25),
  age int, genre varchar (25), taille float, poids float, photo varchar(25),
  biographie text (1000),id_pays int, id_equipe int, id_sport int)
BEGIN
  INSERT INTO `Personne` (`id_personne`, `Nom`, `Prenom`, `Age`, `Genre`)  VALUES (NULL,nom,prenom,age,genre);
  #SELECT id_personne INTO @idp FROM personne WHERE nom =@nom and prenom = @prenom;
  INSERT INTO Athlete (`Taille`, `Poids`, `Photo`, `Biographie`,`id_personne`,`id_pays`,`id_equipe`,`id_sport`)
  VALUES (taille,poids,photo,biographie,last_insert_id(),id_pays,id_equipe,id_sport);
END |
DELIMITER ;

#------------------------------------------------------------
# Procedure insertion table utilisateur
#------------------------------------------------------------

DELIMITER |
CREATE PROCEDURE insert_user (IN nom varchar(25), prenom VARCHAR(25),
                                    Age int, genre varchar (25), email varchar (255), pseudo varchar (25), mot_de_passe varchar (255))

        BEGIN
                INSERT INTO `Personne` (`id_personne`, `Nom`, `Prenom`, `Age`, `Genre`)  VALUES (NULL,nom,prenom,age,genre);
                #SELECT id_personne INTO @idp FROM personne WHERE nom =@nom and prenom = @prenom;
                INSERT INTO `Utilisateur` (`email`, `pseudo`, `mot_de_passe`, `id_personne`)
                VALUES (email, pseudo, mot_de_passe, last_insert_id());
        END |
DELIMITER ;
