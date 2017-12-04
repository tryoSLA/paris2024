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
        Titre_event         Varchar (25) ,
        Description_event         TEXT (2500) NOT NULL ,
        Date_evenement      Date NOT NULL ,
        Photo_evenement         VARCHAR(25),
        id_ville            Int NOT NULL ,
        id_type_event       Int NOT NULL ,
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

CREATE TABLE Inscrire(
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
ALTER TABLE Evenement ADD CONSTRAINT FK_Evenement_id_type_event FOREIGN KEY (id_type_event) REFERENCES Type_event(id_type_event);
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

DROP USER IF EXISTS 'user_paris2024'@'localhost';

CREATE USER 'user_paris2024'@'localhost' IDENTIFIED BY '123';
use paris_2024;
GRANT ALL PRIVILEGES ON paris_2024.* TO 'user_paris2024'@'localhost';
FLUSH PRIVILEGES;

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
# Insertion table sport
#------------------------------------------------------------

INSERT INTO `Sport` (`id_sport`, `Libelle_sport`, `Image_sport`, `Description_sport`) VALUES
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
        dont le jeu de mail. Il fut ainsi importé des Pays-Bas où il était pratiqué sous le nom de « colf » dès le xiiie siècle.'),
        (NULL,'Rugby à XV','Rugby.png','Le rugby à XV, aussi appelé rugby union dans les pays anglophones, qui se joue par équipes de quinze joueurs sur le terrain avec des remplaçants,
        est la variante la plus pratiquée du rugby, famille de sports collectifs, dont les spécificités sont les mêlées et les touches, mettant aux prises deux équipes qui se disputent
        un ballon ovale, joué à la main et au pied. L\'objectif du jeu est de marquer plus de points que l\'adversaire, soit par des essais, soit par des buts de pénalité ou des transformations
        d\'essais, soit encore des drops (coups de pied tombés dans le cours du jeu). De nos jours, l\'essai vaut cinq points et sept s\'il est transformé,
        le drop et le but (de pénalité) valent trois points chacun.'),
        (NULL,'Football','Football.png','Le football, ou soccer, est un sport collectif qui se joue principalement au pied avec un ballon sphérique.
        Il oppose deux équipes de onze joueurs dans un stade, que ce soit sur un terrain gazonné ou sur un plancher.
        L\'objectif de chaque camp est de mettre le ballon dans le but adverse, sans utiliser les bras, et de le faire plus souvent que l\'autre équipe.');

#------------------------------------------------------------
# Insertion table equipe
#------------------------------------------------------------

INSERT INTO `Equipe` (id_equipe, Libelle_equipe, Nb_joueurs_equipe, id_sport) VALUES
  (NULL, 'France 7',7,5), (NULL, 'Squadra Azzurra',7,5),(NULL,'Équipe du Portugal',11,6),
  (NULL,'Équipe d\'Italie',11,6),(NULL, 'Os Lobos',7,5);


#------------------------------------------------------------
# Insertion table pays
#------------------------------------------------------------

INSERT INTO `Pays` (`id_pays`, `Libelle_pays`, `Image_pays`, `Description_pays`) VALUES
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
        qui sont ses cinq plus importants partenaires commerciaux.'),
        (NULL,'Grande-Bretagne','Grande-Bretagne.png','La Grande-Bretagne est une île au large du littoral nord-ouest de l\'Europe continentale. Elle représente la majorité du territoire du Royaume-Uni.
        En son acception politique, ce toponyme désigne l\'Angleterre, le pays de Galles et l\'Écosse ainsi que la plupart des territoires insulaires contigus à l\'exclusion de
        l\'Île de Man et des Îles Anglo-Normandes. Située à la jonction de l\'Atlantique et de la mer du Nord, elle est séparée de l\'Irlande par la mer d\'Irlande et du continent
        par la Manche. C\'est la plus grande île et la plus peuplée du continent européen.');

#------------------------------------------------------------
# Insert athlete
#------------------------------------------------------------

call insert_athlete ('Riner','Teddy',28,'Homme',2.04,131,'Teddy_Riner.jpg','Teddy Riner, né le 7 avril 1989 aux Abymes en Guadeloupe, est un judoka français évoluant
        dans la catégorie des plus de 100 kg (poids lourds), détenteur d\'un record de neuf titres de champion du monde,
        champion olympique à Londres en 2012 et à Rio de Janeiro en 2016, médaillé de bronze à Pékin en 2008, quintuple champion d\'Europe.',1,NULL,1);
call insert_athlete ('Fabio','Basile',23,'Homme',1.60,66,'Fabio_Basile.jpg','Fabio Basile né le 7 octobre 1994 à Rivoli est un judoka italien. Il a remporté la médaille d\'or en moins de 66 kg lors
        des Jeux olympiques de 2016 à Rio de Janeiro, ce qui représente la 200e médaille d\'or italienne.Fabio Basile avec Sergio Mattarella,
        le Président de la République italienne. Gradé de l\'Esercito italiano, dont il fait partie du groupe sportif depuis 2013, il vante une médaille de bronze
        aux Jeux méditerranéens de 2013 à Mersin dans la catégorie des 60 kg et le même résultat lors des Championnats d\'Europe jeunesse de Bucarest de la même année.
        Troisième lors des Championnats d\'Europe 2016 à Kazan, il est tardivement sélectionné pour les Jeux olympiques, le directeur technique italien du judo pensant davantage
        à lui comme un judoka pour ceux de 2020. Contre le favori An Baul, il gagne par ippon au bout de 84 s de la rencontre et remporte le premier titre olympique italien de 2016',2,NULL,1);
call insert_athlete ('Siobhan-Marie','O\'Connor',21,'Femme',1.76,64,'Siobhan_Oconnor.jpg','Siobhan-Marie O\'Connor,est une nageuse britannique.
        Née à Bath et s\'entraînant également à Bath, elle participe aux Jeux olympiques de 2012 à Londres, en individuel lors du 100 m brasse (éliminée en séries avec le 21e temps) et en
        relais (huitième de la finale du 4 × 100 m quatre nages). En 2014, elle accumule un total de six médailles aux Jeux du Commonwealth
        de 2014 dont une en or lors du 200 m quatre nages1.',4,NULL,2);
call insert_athlete ('Laure','Manaudou',31,'Femme',1.80,69,'Laure_Manaudou.jpg','Laure Manaudou, née le 9 octobre 1986 à Villeurbanne, est une nageuse française pratiquant
        les quatre nages (brasse, papillon, crawl, dos crawlé) ayant obtenu des résultats nationaux et internationaux dans la quasi-totalité des distances de
        compétition : 50 m, 100 m, 200 m, 400 m, 800 m et 1500 m. Lorsqu''elle s''impose à 17 ans sur 400 m nage libre aux Jeux olympiques d\'Athènes, le 15 août 2004, elle n\'est que la
        deuxième championne olympique française de natation après Jean Boiteux à Helsinki en 1952. Elle gagne deux autres médailles dans ces Jeux : l\'argent sur 800 m nage libre et le bronze
        sur 100 m dos, un exploit totalement inédit pour une nageuse française aux JO, et devient immédiatement une star nationale2.',1,NULL,2);
call insert_athlete ('Alistair','Brownlee',29,'Homme',1.84,70,'Alistair_Brownlee.jpg','Alistair Edward Brownlee, né le 23 avril 1988 à Dewsbury en Angleterre, est un triathlète professionnel anglais,
        double champion olympique en 2012 et en 2016, double champion du monde en 2009 et 2011 et triple champion d\'Europe. Il est le frère ainé de Jonathan Brownlee triathlète professionnel,
        médaille de bronze et d\'argent lors des mêmes Jeux olympiques.Il est nommé membre de l\'ordre de l\'Empire britannique à l\'occasion de la liste de
        nominations honorifiques du nouvel an 2013.',4,NULL,3);
call insert_athlete ('Vicky','Holland',31,'Femme',1.68,58,'Vicky_Holland.jpg','Vicky Holland, née le 12 janvier 1986 à Gloucester, est une
        triathlète britannique, professionnelle depuis 2006.',4,NULL,3);
call insert_athlete ('Grégory','Bourdy',35,'Homme',1.80,NULL,'Gregory_Bourdy.jpg','Grégory Bourdy, né le 25 avril 1982 à Bordeaux, est un golfeur français, professionnel depuis 2003.
        Il a remporté 4 tournois sur le circuit européen. Né dans une famille de golfeurs, Grégory Bourdy avoue avoir toujours voulu devenir golfeur professionnel.
        Ses parents domiciliés près du Golf Bordelais, l\'ont rapidement conduit sur les greens. Il passe professionnel à 21 ans en 2003.',1,NULL,4);
call insert_athlete ('Matteo','Manassero',24,'Homme',1.83,NULL,'Matteo_Manassero.jpg','Matteo Manassero, né le 19 avril 1993 à Negrar, est un golfeur italien, professionnel depuis 2010.
        Évoluant sur le Tour européen PGA, il a remporté 4 victoires sur le Tour européen et 2 sur l\'Asian Tour1.',2,NULL,4);
call insert_athlete ('Jérémy','Aicardi',28,'Homme',1.78,NULL,'Jeremy_Aicardi.jpg','Jérémy Aicardi est un joueur international français de rugby à sept qui évolue au poste de centre.
        Après être passé par la Pro D2 et la Fédérale 1, il s\'engage en 2014 avec l\'équipe de France de rugby à sept et avec la fédération française de rugby.',1,1,5);
call insert_athlete ('Jonathan','Laugel',24,'Homme',1.94,NULL,'Jonathan_Laugel.jpg','Jonathan Laugel, né le 30 janvier 1993 à Montmorency, est un joueur français de rugby à XV,
        où il évolue au poste de troisième ligne aile, et de rugby à sept. International de rugby à sept depuis 2012, il est en contrat avec la Fédération française de rugby
        à XV pour disputer les compétitions de rugby à sept, notamment les World Series.',1,1,5);
call insert_athlete ('Gonçalo','Uva',33,'Homme',2.1,NULL,'Goncalo_Uva.jpg','Gonçalo Uva, né le 3 octobre 1984, est un joueur de rugby à XV international portugais.
        Il évolue au poste de deuxième ligne au sein de l\'effectif du Racing club de Narbonne Méditerranée.',3,5,5);
call insert_athlete ('Marco','Bortolami',37,'Homme',1.96,NULL,'Marco_Bortolami.jpg','Marco Bortolami, né le 12 juin 1980 (37 ans) à Padoue (Italie), est un joueur italien de rugby à XV.
        Il compte 112 sélections en équipe d\'Italie, évoluant au poste de deuxième ligne. Marco Bortolami joue dans les équipes de jeunes du club de sa ville, le Petrarca Rugby Padoue,
        où il devient titulaire en équipe première à seulement vingt ans. Il est le capitaine de l\'équipe d\'Italie des moins de 21 ans avec laquelle il dispute le tournoi des six nations
        dans cette catégorie. En 2001, pendant la tournée en Nouvelle-Zélande, il devient à 22 ans le plus jeune capitaine de l\'histoire du rugby italien avec l\'équipe d\'Italie.',2,5,2);
call insert_athlete ('William','Carvalho',25,'Homme',1.87,NULL,'Wiliam_Carvalho.jpg','William Silva de Carvalho, né le 7 avril 1992 à Luanda, est un footballeur portugais évoluant au poste de milieu
        de terrain défensif au Sporting Portugal, son club formateur depuis 2005. Sélectionné en équipe du Portugal dans chaque catégorie d\'âge depuis son adolescence, il est le capitaine de
        la formation des moins de 21 ans lors du championnat d\'Europe espoir de 2015, où la Seleção termine sur la deuxième marche du podium et dont il fut élu meilleur joueur de la compétition.
        C\'est en novembre 2013 que William Carvalho fait ses débuts en sélection A, dirigée par Paulo Bento, lors des matchs de barrage de la Coupe du monde 2014 face à la Suède.
        À la suite de bonnes performances avec le Sporting Portugal, lors de la saison 2013-2014, William Carvalho devient titulaire en sélection A en phase finale de la Coupe
        du monde 2014 au Brésil.',3,3,6);
call insert_athlete ('Leonardo','Bonucci',30,'Homme',1.90,NULL,'Leonardo_Bonucci.jpg','Leonardo Bonucci, né le 1er mai 1987 à Viterbe, est un footballeur international italien qui évolue au
        poste de defenseur central à l\'AC Milan.',2,4,6);

#------------------------------------------------------------
# Insertion table lieu
#------------------------------------------------------------

insert into `Lieu`(`id_lieu`,`Libelle_lieu`) VALUES
        (NULL,'Stade de France'), (NULL, 'Le Bourget'),(NULL, 'Tour Eiffel');

#------------------------------------------------------------
# Insertion table ville
#------------------------------------------------------------

insert into `Ville`(`id_ville`,`Libelle_ville`) VALUES
        (NULL,'Saint-Denis'), (NULL, 'Paris'),(NULL, 'Le Bourget');



#------------------------------------------------------------
# Insertion table event
#------------------------------------------------------------

insert into `Type_event`(`id_type_event`, `Libelle_event`) VALUES
        (NULL,'Sportif'), (NULL, 'Administratif'),(NULL, 'Presentatif');

#------------------------------------------------------------
# Insertion table event
#------------------------------------------------------------

insert into `Evenement`(`id_event`, `Titre_event`, `Description_event`, `Date_evenement`, `Photo_evenement`,`id_ville`, `id_type_event`) VALUES
        (NULL,'Presentation des amenagements', 'À proximité du village olympique sera construit le centre aquatique.
        Relié au Stade de France par une passerelle, il pourra accueillir jusqu''à 15 000 spectateurs durant la période olympique.
        À la fin de la compétition, cela restera une piscine pour les habitants des quartiers environnements et les écolier', '2018-03-18', 'photo_event_1.jpg',2,3),
        (NULL, 'Cérémonie d\'ouverture des JO', 'La cérémonie d\'ouverture des JO aura lieu le 2 août au stade de France','2024-08-02', 'photo_event_2.jpg',1,3);




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
