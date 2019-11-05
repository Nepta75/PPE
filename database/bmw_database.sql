drop database if exists bmwv2;
create database bmwv2;
use bmwv2;

create table user (
	id_user Int  Auto_increment  NOT NULL ,
	nom     Varchar (50) NOT NULL ,
	prenom  Varchar (50) NOT NULL ,
	mail    Varchar (100) NOT NULL ,
	adresse Varchar (200) NOT NULL ,
	mdp     Varchar (200) NOT NULL,
	PRIMARY KEY (id_user)
);

CREATE TABLE admin(
	id_user   Int NOT NULL ,
	admin_lvl Int NOT NULL ,
	PRIMARY KEY (id_user),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);


CREATE TABLE technicien(
	id_user        Int NOT NULL ,
	technicien_lvl Int NOT NULL ,
	nom            Varchar (50) NOT NULL ,
	prenom         Varchar (50) NOT NULL ,
	mail           Varchar (100) NOT NULL ,
	adresse        Varchar (200) NOT NULL ,
	mdp            Varchar (200) NOT NULL,
	PRIMARY KEY (id_user),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE vehicule(
	id_vehicule     Int  Auto_increment  NOT NULL ,
	marque          Varchar (50) NOT NULL ,
	modele          Varchar (50) NOT NULL ,
	immatriculation Varchar (50) NOT NULL,
	id_user Int NOT NULL,
	PRIMARY KEY (id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user (id_user)
);

CREATE TABLE vehicule_occasion(
	id_vehicule     Int NOT NULL ,
	etat            Varchar (50) NOT NULL ,
	information     Text NOT NULL ,
	km              Float NOT NULL ,
	marque          Varchar (50) NOT NULL ,
	modele          Varchar (50) NOT NULL ,
	immatriculation Varchar (50) NOT NULL,
	id_user Int NOT NULL,
	PRIMARY KEY (id_vehicule),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user (id_user)
);


CREATE TABLE vehicule_neuf(
	id_vehicule     Int NOT NULL ,
	marque          Varchar (50) NOT NULL ,
	modele          Varchar (50) NOT NULL ,
	immatriculation Varchar (50) NOT NULL,
	id_user Int NOT NULL,
	PRIMARY KEY (id_vehicule),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user (id_user)
);

CREATE TABLE devis(
	id_devis      Int  Auto_increment  NOT NULL ,
	nom           Varchar (50) NOT NULL ,
	prenom        Varchar (50) NOT NULL ,
	adresse       Varchar (50) NOT NULL ,
	info          Text NOT NULL ,
	prix          Float NOT NULL ,
	date_devis    Date NOT NULL ,
	date_creation Date NOT NULL ,
	id_user       Int NOT NULL,
	PRIMARY KEY (id_devis),
	FOREIGN KEY (id_user) REFERENCES technicien(id_user)
);

CREATE TABLE pdf(
	id_pdf   Int  Auto_increment  NOT NULL ,
	url_pdf  Text NOT NULL ,
	id_devis Int NOT NULL,
	PRIMARY KEY (id_pdf),
	FOREIGN KEY (id_devis) REFERENCES devis(id_devis)
);

CREATE TABLE photo(
	idphoto     Int  Auto_increment  NOT NULL ,
	url_photo   Text NOT NULL ,
	id_vehicule Int NOT NULL,
	PRIMARY KEY (idphoto),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule)
);

CREATE TABLE client(
	id_user Int NOT NULL ,
	PRIMARY KEY (id_user),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE essayer(
	id_vehicule   Int NOT NULL ,
	id_user       Int NOT NULL ,
	date_essayage Date NOT NULL,
	PRIMARY KEY (id_vehicule,id_user),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE vendre(
	id_vehicule Int NOT NULL ,
	id_user     Int NOT NULL,
	PRIMARY KEY (id_vehicule,id_user),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);

/* --------- VUES ------------ */ 

CREATE VIEW view_vendre as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, v.id_vehicule, v.marque, v.modele, v.immatriculation
	from user u
	inner join vehicule v on v.id_user = u.id_user
);

CREATE VIEW view_essayer as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, v.id_vehicule, v.marque, v.modele, v.immatriculation, e.date_essayage
	from essayer e
	inner join user u on u.id_user = e.id_user
	inner join vehicule v on v.id_user = u.id_user
);

/* ------------ PROCEDURES --------------- */

delimiter $ 
create PROCEDURE insert_client (IN nom varchar(50), IN prenom varchar(50), IN mmail varchar(100), IN adresse varchar(200), IN mdp varchar(200))
BEGIN
	DECLARE id int(5);
	insert into user values (null,nom,prenom, mmail, adresse, mdp);
	select id_user into id from user where mail = mmail;
	insert into client values (id);
END $
delimiter ;

call insert_client('Goncalves', 'Miguel', 'miguel@gmail.com', '2 rue de clery', '123');