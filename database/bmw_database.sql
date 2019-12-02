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
	diplome varchar(50),
	PRIMARY KEY (id_user),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE vehicule(
	id_vehicule     Int  Auto_increment  NOT NULL ,
	marque          Varchar (50) NOT NULL ,
	modele          Varchar (50) NOT NULL ,
	immatriculation Varchar (50) NOT NULL,
	PRIMARY KEY (id_vehicule)
);

CREATE TABLE vehicule_occasion(
	id_vehicule     Int NOT NULL ,
	etat            Varchar (50),
	information     Text,
	km              Int NOT NULL ,
	PRIMARY KEY (id_vehicule),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule)
);


CREATE TABLE vehicule_neuf(
	id_vehicule     Int NOT NULL ,
	PRIMARY KEY (id_vehicule),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule)
);

CREATE TABLE vehicule_client(
	id_vehicule     Int NOT NULL ,
	id_user int NOT NULL,
	etat            Varchar (50),
	information     Text,
	km              Float NOT NULL ,
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
	id_photo     Int  Auto_increment  NOT NULL ,
	url_photo   Text NOT NULL ,
	id_vehicule Int NOT NULL,
	PRIMARY KEY (id_photo),
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


/* --------- VUES ------------ */ 

CREATE VIEW view_essayer as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, v.id_vehicule, v.marque, v.modele, v.immatriculation, e.date_essayage
	from vehicule v
	inner join essayer e on e.id_vehicule = v.id_vehicule
	inner join user u on u.id_user = e.id_user
);

CREATE VIEW view_devis as (
	select d.id_user, d.id_devis, d.nom, d.prenom, d.adresse, d.info, d.prix, d.date_devis, d.date_creation, t.diplome, t.technicien_lvl
	from devis d
	inner join technicien t on t.id_user = d.id_user
);

CREATE VIEW view_client as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, u.mdp
	from user u
	inner join client c on u.id_user = c.id_user
);

CREATE VIEW view_admin as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, u.mdp, a.admin_lvl
	from user u
	inner join admin a on u.id_user = a.id_user
);

CREATE VIEW view_technicien as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, u.mdp, t.technicien_lvl, t.diplome
	from user u
	inner join technicien t on u.id_user = t.id_user
);

CREATE VIEW view_veh_occas as (
	select vo.id_vehicule, v.marque, v.modele, v.immatriculation, vo.etat, vo.information, vo.km
	from vehicule v
	inner join vehicule_occasion vo on vo.id_vehicule = v.id_vehicule
);

CREATE VIEW view_veh_client as (
	select vc.id_vehicule, u.id_user, u.nom, u.prenom, u.mail, v.marque, v.modele, v.immatriculation, vc.etat, vc.information, vc.km
	from vehicule v
	inner join vehicule_client vc on vc.id_vehicule = v.id_vehicule
	inner join user u on u.id_user = vc.id_user
);

CREATE VIEW view_veh_neuf as (
	select vn.id_vehicule, v.marque, v.modele, v.immatriculation
	from vehicule v
	inner join vehicule_neuf vn on vn.id_vehicule = v.id_vehicule
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

create PROCEDURE insert_admin (IN nom varchar(50), IN prenom varchar(50), IN mmail varchar(100), IN adresse varchar(200), IN mdp varchar(200), IN admin_lvl int(5))
BEGIN
	DECLARE id int(5);
	insert into user values (null,nom,prenom, mmail, adresse, mdp);
	select id_user into id from user where mail = mmail;
	insert into admin values (id, admin_lvl);
END $

create PROCEDURE insert_technicien (IN nom varchar(50), IN prenom varchar(50), IN mmail varchar(100), IN adresse varchar(200), IN mdp varchar(200), IN technicien_lvl int(5), IN diplome varchar(50))
BEGIN
	DECLARE id int(5);
	insert into user values (null, nom, prenom, mmail, adresse, mdp);
	select id_user into id from user where mail = mmail;
	insert into technicien values (id, technicien_lvl, diplome);
END $


create PROCEDURE insert_veh_neuf(IN marque varchar(50), IN modele varchar(50), IN immatriculation varchar(50))
BEGIN
	DECLARE id int(5);
	insert into vehicule values (null, marque, modele, immatriculation);
	select v.id_vehicule into id from vehicule v where v.immatriculation = immatriculation;
	insert into vehicule_neuf values (id);
END $

create PROCEDURE insert_veh_occas(IN marque varchar(50), IN modele varchar(50), IN immatriculation varchar(50), IN etat varchar(50), IN information Text, IN km Int)
BEGIN
	DECLARE id int(5);
	insert into vehicule values (null, marque, modele, immatriculation);
	select v.id_vehicule into id from vehicule v where v.immatriculation = immatriculation;
	insert into vehicule_occasion values (id, etat, information, km);
END $

create PROCEDURE insert_veh_client(IN id_user int(5), IN marque varchar(50), IN modele varchar(50), IN immatriculation varchar(50), IN etat varchar(50), IN information Text, IN km Int)
BEGIN
	DECLARE id int(5);
	insert into vehicule values (null, marque, modele, immatriculation);
	select v.id_vehicule into id from vehicule v where v.immatriculation = immatriculation;
	insert into vehicule_client values (id, id_user, etat, information, km);
END $
delimiter ;


/* --------- INSERTION --------- */

call insert_admin('Aydogan', 'Lokman', 'lokman-hekim@hotmail.fr', '2 rue de clery', '123', 3);
call insert_admin('Goncalves', 'Miguel', 'migueldsg0904@gmail.com', '3 rue de clery', '123', 3);
call insert_client('Du Bois', 'Alber', 'neptashow@gmail.com', '6 rue de clery', '123');
call insert_client('Goncalves 2', 'Miguel 2', 'miguou94700@hotmail.fr', '9 rue de clery', '123');
call insert_technicien('Sanchez', 'Romain', 'romain@gmail.com', '23 rue de clery', '123', 3, 'bac +2');

call insert_veh_client(3, 'bmw', 'x6', 'ef-458-de', 'bon etat', '', 78500);
call insert_veh_client(4, 'bmw', 'x4', 'zf-587-aa', 'bon etat', '', 77459);
call insert_veh_client(3, 'bmw', 'serie 4', 'rf-785-de', 'quelques rayures', '', 84548);
call insert_veh_client(4, 'bmw', 'serie 5', 'el-588-du', 'moyen', '', 124525);

call insert_veh_occas('bmw', 'serie 5', 'el-588-du', 'moyen', '', 124525);
call insert_veh_occas('bmw', 'serie 5', 'ml-875-du', 'moyen', '', 70000);
call insert_veh_occas('bmw', 'serie 5', 'bl-578-du', 'moyen', '', 20000);
call insert_veh_occas('bmw', 'serie 5', 'as-001-dr', 'moyen', '', 1000);

call insert_veh_neuf('bmw', 'serie 6', 'rt-875-dd');
call insert_veh_neuf('bmw', 'serie 6', 'bvd-745-zz');
call insert_veh_neuf('bmw', 'x6', 'rt-003-dd');
call insert_veh_neuf('bmw', 'x6', 'ff-001-dd');
call insert_veh_neuf('bmw', 'x5', 'as-784-dd');


