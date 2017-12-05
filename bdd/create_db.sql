#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE if exists paris_2024;
CREATE DATABASE paris_2024;
USE paris_2024;
#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        email       Varchar (255) NOT NULL ,
        pseudo      Varchar (25) NOT NULL ,
        mot_de_passe   Varchar (255) NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pays
#------------------------------------------------------------

CREATE TABLE Pays(
        id_pays          int (11) Auto_increment  NOT NULL ,
        Libelle_pays          Varchar (25) NOT NULL ,
        Image_pays       Varchar (25) ,
        Description_pays TEXT (1000) ,
        PRIMARY KEY (id_pays ) ,
        UNIQUE (Libelle_pays )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Sport
#------------------------------------------------------------

CREATE TABLE Sport(
        id_sport          int (11) Auto_increment  NOT NULL ,
        Libelle_sport     Varchar (25) NOT NULL ,
        Image_sport       Varchar (25) ,
        Description_sport TEXT (1000) ,
        PRIMARY KEY (id_sport ) ,
        UNIQUE (Libelle_sport )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Athlete
#------------------------------------------------------------

CREATE TABLE Athlete(
        Taille      Float NOT NULL ,
        Poids       Float ,
        Photo       Varchar (25) ,
        Biographie  TEXT (1000) ,
        id_personne Int NOT NULL ,
        id_pays     Int NOT NULL ,
        id_equipe   Int,
        id_sport    Int NOT NULL ,
        PRIMARY KEY (id_personne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evenement
#------------------------------------------------------------

CREATE TABLE Evenement(
        id_event            int (11) Auto_increment  NOT NULL ,
        Titre_event         Varchar (250) ,
        Description_event         TEXT (2500) NOT NULL ,
        Date_evenement      Date NOT NULL ,
        Photo_evenement         VARCHAR(25),
        id_ville            Int NOT NULL ,
        id_type_event       Int NOT NULL ,
        PRIMARY KEY (id_event ) ,
        UNIQUE (Titre_event )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FluxRSS
#------------------------------------------------------------

CREATE TABLE FluxRSS(
        id_flux  int (11) Auto_increment  NOT NULL ,
        Lien     varchar (1500) NOT NULL ,
        Titre    Varchar (250) NOT NULL ,
        id_event Int NOT NULL ,
        PRIMARY KEY (id_flux ) ,
        UNIQUE (Lien ,Titre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Equipe
#------------------------------------------------------------

CREATE TABLE Equipe(
        id_equipe         int (11) Auto_increment  NOT NULL ,
        Libelle_equipe    Varchar (25) NOT NULL ,
        Nb_joueurs_equipe Int NOT NULL ,
        id_sport          Int NOT NULL ,
        PRIMARY KEY (id_equipe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lieu
#------------------------------------------------------------

CREATE TABLE Lieu(
        id_lieu      int (11) Auto_increment  NOT NULL ,
        Libelle_lieu Varchar (25) NOT NULL ,
        id_ville     Int NOT NULL ,
        PRIMARY KEY (id_lieu )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ville
#------------------------------------------------------------

CREATE TABLE Ville(
        id_ville      int (11) Auto_increment  NOT NULL ,
        Libelle_ville Varchar (25) NOT NULL ,
        PRIMARY KEY (id_ville )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Type_event
#------------------------------------------------------------

CREATE TABLE Type_event(
        id_type_event int (11) Auto_increment  NOT NULL ,
        Libelle_event  Varchar (25) NOT NULL ,
        PRIMARY KEY (id_type_event)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        id_personne int (11) Auto_increment  NOT NULL ,
        Nom         Varchar (25) NOT NULL ,
        Prenom      Varchar (25) NOT NULL ,
        Age         Int NOT NULL ,
        Genre       Varchar (25) NOT NULL ,
        PRIMARY KEY (id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Avoir lieu
#------------------------------------------------------------

CREATE TABLE Avoir_lieu(
        id_sport Int NOT NULL ,
        id_lieu  Int NOT NULL ,
        PRIMARY KEY (id_sport ,id_lieu )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: inscrire
#------------------------------------------------------------

CREATE TABLE Inscrire(
        dateInscription Date ,
        id_personne     Int NOT NULL ,
        id_event        Int NOT NULL ,
        PRIMARY KEY (id_personne ,id_event )
)ENGINE=InnoDB;


ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_pays FOREIGN KEY (id_pays) REFERENCES Pays(id_pays);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_equipe FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Evenement ADD CONSTRAINT FK_Evenement_id_ville FOREIGN KEY (id_ville) REFERENCES Ville(id_ville);
ALTER TABLE Evenement ADD CONSTRAINT FK_Evenement_id_type_event FOREIGN KEY (id_type_event) REFERENCES Type_event(id_type_event);
ALTER TABLE FluxRSS ADD CONSTRAINT FK_FluxRSS_id_event FOREIGN KEY (id_event) REFERENCES Evenement(id_event);
ALTER TABLE Equipe ADD CONSTRAINT FK_Equipe_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Lieu ADD CONSTRAINT FK_Lieu_id_ville FOREIGN KEY (id_ville) REFERENCES Ville(id_ville);
ALTER TABLE Avoir_lieu ADD CONSTRAINT FK_Avoir_lieu_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Avoir_lieu ADD CONSTRAINT FK_Avoir_lieu_id_lieu FOREIGN KEY (id_lieu) REFERENCES Lieu(id_lieu);
ALTER TABLE Inscrire ADD CONSTRAINT FK_Inscrire_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Inscrire ADD CONSTRAINT FK_Inscrire_id_event FOREIGN KEY (id_event) REFERENCES Evenement(id_event);

#------------------------------------------------------------
# Vue pays detaille
#------------------------------------------------------------

CREATE VIEW pays_detaille AS
  SELECT Pays.Libelle_pays, Pays.Description_pays, Pays.Image_pays, Sport.Libelle_sport, Personne.Nom, Personne.Prenom
  FROM Sport,Personne, Pays, Athlete
  WHERE Athlete.id_pays = Pays.id_pays and Athlete.id_sport = Sport.id_sport and Athlete.id_personne = Personne.id_personne;

#------------------------------------------------------------
# Vue sport detaille
#------------------------------------------------------------

CREATE VIEW sport_detaille AS
  SELECT Sport.Libelle_sport, Sport.Description_sport, Sport.Image_sport, Pays.Libelle_pays, Personne.Nom, Personne.Prenom
  FROM Pays, Personne, Sport, Athlete
  WHERE Athlete.id_personne = Personne.id_personne AND Athlete.id_pays = Pays.id_pays AND Athlete.id_sport = Sport.id_sport;

#------------------------------------------------------------
# Vue athlete detaille
#------------------------------------------------------------

CREATE VIEW athlete_detaille AS
  SELECT Personne.Nom, Personne.Prenom, Personne.Age, Personne.Genre, Pays.Libelle_pays, Athlete.Photo, Athlete.Biographie, Athlete.Poids,Athlete.Taille, Sport.Libelle_sport
  FROM Personne,Athlete, Sport, Pays
  WHERE Sport.id_sport = Athlete.id_sport AND Pays.id_pays = Athlete.id_pays AND  Personne.id_personne = Athlete.id_personne;

#------------------------------------------------------------
# Creation de l'utilisateur
#------------------------------------------------------------

DROP USER IF EXISTS 'user_paris2024'@'localhost';

CREATE USER 'user_paris2024'@'localhost' IDENTIFIED BY '123';
use paris_2024;
GRANT ALL PRIVILEGES ON paris_2024.* TO 'user_paris2024'@'localhost';
FLUSH PRIVILEGES;



