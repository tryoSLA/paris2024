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
        Email       Varchar (25) NOT NULL ,
        Pseudo      Varchar (25) NOT NULL ,
        Mot_passe   Varchar (25) NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Pays
#------------------------------------------------------------

CREATE TABLE Pays(
        id_pays          int (11) Auto_increment  NOT NULL ,
        Libelle          Varchar (25) NOT NULL ,
        Image_pays       Varchar (25) ,
        Description_pays TEXT (1000) ,
        PRIMARY KEY (id_pays ) ,
        UNIQUE (Libelle )
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
        id_equipe   Int NOT NULL ,
        id_sport    Int NOT NULL ,
        PRIMARY KEY (id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evenement
#------------------------------------------------------------

CREATE TABLE Evenement(
        id_event            int (11) Auto_increment  NOT NULL ,
        Titre_event         Varchar (25) ,
        Description         TEXT (2500) NOT NULL ,
        Date_evenement      Date NOT NULL ,
        id_ville            Int NOT NULL ,
        id_event_Type_event Int NOT NULL ,
        PRIMARY KEY (id_event ) ,
        UNIQUE (Titre_event )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Message
#------------------------------------------------------------

CREATE TABLE Message(
        id_message  int (11) Auto_increment  NOT NULL ,
        Message     TEXT (500) NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_message )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: FluxRSS
#------------------------------------------------------------

CREATE TABLE FluxRSS(
        id_flux  int (11) Auto_increment  NOT NULL ,
        Lien     TEXT (500) NOT NULL ,
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
# Table: Collectif
#------------------------------------------------------------

CREATE TABLE Collectif(
        Nb_equipe Int NOT NULL ,
        id_sport  Int NOT NULL ,
        PRIMARY KEY (id_sport )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Individuel
#------------------------------------------------------------

CREATE TABLE Individuel(
        Nb_joueur Int ,
        id_sport  Int NOT NULL ,
        PRIMARY KEY (id_sport )
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
        id_event int (11) Auto_increment  NOT NULL ,
        Libelle  Varchar (25) NOT NULL ,
        PRIMARY KEY (id_event )
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
# Table: Recevoir
#------------------------------------------------------------

CREATE TABLE Recevoir(
        id_message  Int NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_message ,id_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: inscrire
#------------------------------------------------------------

CREATE TABLE inscrire(
        dateInscription Date ,
        id_personne     Int NOT NULL ,
        id_event        Int NOT NULL ,
        PRIMARY KEY (id_personne ,id_event )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commenter
#------------------------------------------------------------

CREATE TABLE Commenter(
        dateComment Date ,
        contenu     Varchar (200) ,
        note        Int ,
        id_event    Int NOT NULL ,
        id_personne Int NOT NULL ,
        PRIMARY KEY (id_event ,id_personne )
)ENGINE=InnoDB;

ALTER TABLE Utilisateur ADD CONSTRAINT FK_Utilisateur_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_pays FOREIGN KEY (id_pays) REFERENCES Pays(id_pays);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_equipe FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe);
ALTER TABLE Athlete ADD CONSTRAINT FK_Athlete_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Evenement ADD CONSTRAINT FK_Evenement_id_ville FOREIGN KEY (id_ville) REFERENCES Ville(id_ville);
ALTER TABLE Evenement ADD CONSTRAINT FK_Evenement_id_event_Type_event FOREIGN KEY (id_event_Type_event) REFERENCES Type_event(id_event);
ALTER TABLE Message ADD CONSTRAINT FK_Message_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE FluxRSS ADD CONSTRAINT FK_FluxRSS_id_event FOREIGN KEY (id_event) REFERENCES Evenement(id_event);
ALTER TABLE Equipe ADD CONSTRAINT FK_Equipe_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Collectif ADD CONSTRAINT FK_Collectif_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Individuel ADD CONSTRAINT FK_Individuel_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Lieu ADD CONSTRAINT FK_Lieu_id_ville FOREIGN KEY (id_ville) REFERENCES Ville(id_ville);
ALTER TABLE Avoir_lieu ADD CONSTRAINT FK_Avoir_lieu_id_sport FOREIGN KEY (id_sport) REFERENCES Sport(id_sport);
ALTER TABLE Avoir_lieu ADD CONSTRAINT FK_Avoir_lieu_id_lieu FOREIGN KEY (id_lieu) REFERENCES Lieu(id_lieu);
ALTER TABLE Recevoir ADD CONSTRAINT FK_Recevoir_id_message FOREIGN KEY (id_message) REFERENCES Message(id_message);
ALTER TABLE Recevoir ADD CONSTRAINT FK_Recevoir_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE inscrire ADD CONSTRAINT FK_inscrire_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);
ALTER TABLE inscrire ADD CONSTRAINT FK_inscrire_id_event FOREIGN KEY (id_event) REFERENCES Evenement(id_event);
ALTER TABLE Commenter ADD CONSTRAINT FK_Commenter_id_event FOREIGN KEY (id_event) REFERENCES Evenement(id_event);
ALTER TABLE Commenter ADD CONSTRAINT FK_Commenter_id_personne FOREIGN KEY (id_personne) REFERENCES Personne(id_personne);

#------------------------------------------------------------
# Creation de l'utilisateur
#------------------------------------------------------------

CREATE USER 'user_paris2024'@'localhost' IDENTIFIED BY '123';
use paris_2024;
GRANT ALL PRIVILEGES ON paris_2024 TO 'user_paris2024'@'localhost';
FLUSH PRIVILEGES;