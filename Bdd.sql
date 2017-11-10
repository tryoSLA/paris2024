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
GRANT ALL PRIVILEGES ON DATABASE paris_2024.* TO 'user_paris2024'@'localhost';
FLUSH PRIVILEGES;

#------------------------------------------------------------
# Insertion table athlete
#------------------------------------------------------------

INSERT INTO `athlete` (`Taille`, `Poids`, `Photo`, `Biographie`,`id_personne`,`id_pays`,`id_equipe`,`id_sport`) VALUES
        (2.04,131,'Teddy_Riner.jpg','Teddy Riner, né le 7 avril 1989 aux Abymes en Guadeloupe, est un judoka français évoluant
        dans la catégorie des plus de 100 kg (poids lourds), détenteur d\'un record de neuf titres de champion du monde,
        champion olympique à Londres en 2012 et à Rio de Janeiro en 2016, médaillé de bronze à Pékin en 2008, quintuple champion d\'Europe.',
        NULL,1,NULL,1),
#------------------------------------------------------------
# Insertion table sport
#------------------------------------------------------------

INSERT INTO `sport` (`id_sport`, `Libelle_sport`, `Image_sport`, `Description_sport`) VALUES
        (NULL,'Judo','Judo.png','Le judo a été créé en tant que pédagogie physique, mentale et morale au japon par Jigorō Kanō en 1882.
        Il est généralement catégorisé comme un art martial moderne, qui a par la suite évolué en sport de combat et en sport olympique.
        Sa caractéristique la plus proéminente est son élément compétitif dont l\'objectif est soit de projeter, soit d\'amener l\'adversaire au sol,
        de l\'immobiliser (Techniques de maîtrise), ou de l\'obliger à abandonner à l\'aide de clés articulaires et d''étranglements.
        Les frappes et coups à main nue ainsi que les armes font aussi partie du judo mais seulement sous la forme pré-arrangée
         et ne sont pas autorisés en judo de compétition ni en pratique libre.'),
        (NULL,'Natation','Natation.png','La natation, c\'est-à-dire l\'action de nager, est la méthode qui permet aux êtres humains et
        à certains animaux de se mouvoir dans l\'eau sans aucune force propulsive que leur propre énergie corporelle.
        Parmi les activités humaines, la natation regroupe le déplacement à la surface de l\'eau et sous l\'eau (plongée, natation synchronisée),
        le plongeon et divers jeux pratiqués dans l\'eau. Elle se pratique en piscine, en eau libre (lac, mer), ou en eau vive (torrent).
        La natation demeure un sport accessible à tous. L\’offre en matière d’activités sportives aquatiques est large et tend à se diversifier encore davantage.
        Qu’il s’agisse de l’aquagym, de l’aquabike, du yoga aquatique ou de la simple nage, toute personne peut pratiquer un sport dans l’eau.
        La natation est un sport olympique depuis 1896 pour les hommes et depuis 1912 pour les femmes.'),
        (NULL,'Triathlon','Triathlon.png','Le triathlon est une discipline sportive constituée de trois épreuves d\'endurance enchaînées : natation, cyclisme et course à pied.
        Sa forme moderne apparaît officiellement aux États-Unis en 1974 et se développe depuis dans le monde entier.
        Se pratiquant sur des distances très variées, le triathlon devient discipline olympique en l\'an 2000 aux Jeux de Sydney
        sur la distance standard de 1 500 mètres de natation, 40 kilomètres de vélo et 10 kilomètres de course à pied.
        Il est géré et structuré au niveau mondial par la Fédération internationale de triathlon (ITU) et un ensemble de fédérations continentales
        et nationales qui déclinent selon leurs spécificités les règles générales édictées par l\’ITU.'),
        (NULL,'Golf','Golf.png','Le golf est un sport de précision se jouant en plein air, qui consiste à envoyer une balle dans un trou à l\'aide de clubs.
        Le but du jeu consiste à effectuer, sur un parcours défini, le moins de coups possible. Précision, endurance, technicité, concentration sont des qualités
        primordiales pour cette activité. Codifié en Écosse en 1754 par le Royal & Ancient Golf Club de Saint Andrews, ce sport a des origines diverses
        dont le jeu de mail. Il fut ainsi importé des Pays-Bas où il était pratiqué sous le nom de « colf » dès le xiiie siècle.');



#------------------------------------------------------------
# Insertion table pays
#------------------------------------------------------------

INSERT INTO `pays` (`id_pays`, `Libelle`, `Image_pays`, `Description_pays`) VALUES
        (NULL, 'France', 'France.png', 'La France, en forme longue depuis 1875 la République est un État transcontinental souverain,
        dont le territoire métropolitain est situé en Europe de l\'Ouest. Il a des frontières terrestres avec la Belgique, le Luxembourg,
        l\'Allemagne, la Suisse, l\'Italie, l\'Espagne et les principautés d\'Andorre et de Monaco et dispose d\'importantes façades
        maritimes dans l\'Atlantique, la Manche, la mer du Nord et la Méditerranée. Son territoire ultramarin s\'étend dans les océans Indien,
        Atlantique et Pacifique ainsi que sur le continent sud-américain et a des frontières terrestres avec le Brésil, le Suriname et
        le Royaume des Pays-Bas.'),
        (NULL,'Italie','Italie.png','L\'Italie, en forme longue la République italienne, est un pays d\'Europe du Sud correspondant physiquement
        à une partie continentale, une péninsule située au centre de la mer Méditerranée et une partie insulaire constituée par les deux plus grandes
        îles de cette mer, la Sicile et la Sardaigne, et beaucoup d\'autres îles plus petites (hormis la Corse, rattachée administrativement à la France).
        Elle est rattachée au reste du continent par le massif des Alpes. Le territoire italien correspond approximativement à la région géographique homonyme.'),
        (NULL,'Portugal','Portugal.png','Le Portugal, en forme longue la République portugaise est un pays du sud de l\'Europe, membre de l\'Union européenne,
        situé à l\'ouest de la péninsule Ibérique. Délimité au nord et à l\'est par l\'Espagne puis au sud et à l\'ouest par l\'océan Atlantique,
        il est le pays plus occidental de l\'Europe continentale. Il comprend également les archipels des Açores et de Madère, deux régions autonomes
        situées dans le nord de l\'océan Atlantique. Membre fondateur de l\'OTAN, le Portugal est étroitement lié politiquement et militairement avec
        l\'ensemble des autres pays occidentaux. Il est également membre de l’OCDE, de l\'ONU, du conseil de l\'Europe, de l’espace Schengen et
        est l\'un des pays fondateurs de la zone euro. Le Portugal entretient en outre d\'importantes relations avec l\'Espagne, la France8, l\'Allemagne, le Royaume-Uni et l\'Italie,
        qui sont ses cinq plus importants partenaires commerciaux.')
        (NULL,'Royaume-Uni','Royaume_uni.png','Le Royaume-Uni, en forme longue le Royaume-Uni de Grande-Bretagne et d\'Irlande du Nord est un pays d\'Europe
        de l\'Ouest, ou selon certaines définitions, d\'Europe du Nord, dont le territoire comprend l\'île de Grande-Bretagne et la partie nord de l\'île d\'Irlande,
        ainsi que de nombreuses petites îles autour de l\'archipel. Le territoire du Royaume-Uni partage une frontière terrestre avec la République d\'Irlande,
        et est entouré par l\'océan Atlantique, avec la mer du Nord à l\'est, la Manche au sud, et la mer d\'Irlande à l\'ouest.
        Le Royaume-Uni couvre une superficie de 246 690 km2, faisant de lui le 80e plus grand pays du monde, et le 11e d\'Europe. Il est le 22e pays le plus peuplé du monde,
        avec une population estimée à 65,1 millions d\'habitants. Le Royaume-Uni est une monarchie constitutionnelle ; il possède un système parlementaire de gouvernance.
        Sa capitale est Londres, une ville mondiale et la première place financière au monde, mais également la plus grande aire métropolitaine de l\'Union européenne.');


