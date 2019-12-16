drop database if exists bmwv2;
create database bmwv2;
use bmwv2;

create table user (
	id_user Int  Auto_increment  NOT NULL ,
	nom     Varchar (50) NOT NULL ,
	prenom  Varchar (50) NOT NULL ,
	mail    Varchar (100) NOT NULL ,
	adresse Varchar (200) NOT NULL ,
	tel 	Varchar (10), 
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
	type_vehicule enum ("2 Roues" , "4 Roues") NOT NULL,
	cylindree int(4) NOT NULL,
	energie enum ("Essence" , "Diesel", "Electrique", "Hybride") NOT NULL,
	type_boite enum ("Manuelle" , "Automatique") NOT NULL,
	prix float,
	img_1 varchar(50) NOT NULL,
	img_2 varchar(50),
	PRIMARY KEY (id_vehicule)
);

CREATE TABLE vehicule_occasion(
	id_vehicule     Int NOT NULL ,
	date_immat 		date NOT NULL ,
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
	date_immat 		date NOT NULL ,
	id_user int 	NOT NULL,
	etat            Varchar (50) NOT NULL,
	information     Text,
	km              Float NOT NULL ,
	PRIMARY KEY (id_vehicule),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user (id_user)
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

CREATE TABLE devis(
	id_devis      Int  Auto_increment  NOT NULL ,
	sujet 		  Varchar (50) NOT NULL,
	immatriculation varchar (50) NOT NULL,
	nom           Varchar (50) NOT NULL ,
	prenom        Varchar (50) NOT NULL ,
	mail		  Varchar (100) NOT NULL,
	adresse       Varchar (50) NOT NULL ,
	info          Text NOT NULL ,
	prix          Float NOT NULL ,
	date_devis    Datetime NOT NULL ,
	id_client     Int NOT NULL,
	id_technicien Int NOT NULL,

	PRIMARY KEY (id_devis),
	FOREIGN KEY (id_client) REFERENCES client(id_user),
	FOREIGN KEY (id_technicien) REFERENCES technicien(id_user)
);

CREATE TABLE essayer(
	id_essayer Int  Auto_increment  NOT NULL ,
	id_vehicule   Int NOT NULL ,
	id_user       Int NOT NULL ,
	date_essayage Datetime NOT NULL,
	statut enum ("en attente" , "confirme", "refuser"),
	PRIMARY KEY (id_essayer),
	FOREIGN KEY (id_vehicule) REFERENCES vehicule(id_vehicule),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);


/* --------- VUES ------------ */ 

CREATE VIEW view_essayer as (
	select e.id_essayer, u.id_user, u.nom, u.prenom, u.mail, u.adresse, v.id_vehicule, v.marque, v.modele, v.immatriculation, e.date_essayage, e.statut
	from vehicule v
	inner join essayer e on e.id_vehicule = v.id_vehicule
	inner join user u on u.id_user = e.id_user
);

CREATE VIEW view_devis as (
	select d.id_devis, d.id_client, d.id_technicien, d.sujet, d.immatriculation,
	d.nom, d.prenom, d.adresse, d.mail, d.info, d.prix, d.date_devis,
	t.nom as nom_referent, t.prenom as prenom_referent
	from devis d
	inner join user t on t.id_user = d.id_technicien
);

CREATE VIEW view_client as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, u.tel, u.mdp
	from user u
	inner join client c on u.id_user = c.id_user
);

CREATE VIEW view_admin as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, u.tel, u.mdp, a.admin_lvl
	from user u
	inner join admin a on u.id_user = a.id_user
);

CREATE VIEW view_technicien as (
	select u.id_user, u.nom, u.prenom, u.mail, u.adresse, u.tel, u.mdp, t.technicien_lvl, t.diplome
	from user u
	inner join technicien t on u.id_user = t.id_user
);

CREATE VIEW view_veh_occas as (
	select vo.id_vehicule, v.marque, v.modele, vo.date_immat, v.immatriculation, v.type_vehicule, v.cylindree, v.energie, v.type_boite,
		   vo.etat, vo.information, vo.km, v.prix, v.img_1, v.img_2
	from vehicule v
	inner join vehicule_occasion vo on vo.id_vehicule = v.id_vehicule
);

CREATE VIEW view_veh_client as (
	select vc.id_vehicule, u.id_user, u.nom, u.prenom, u.mail, v.marque, v.modele, vc.date_immat, v.immatriculation, v.type_vehicule, v.cylindree, v.energie, v.type_boite,
		   vc.etat, vc.information, vc.km, v.img_1, v.img_2
	from vehicule v
	inner join vehicule_client vc on vc.id_vehicule = v.id_vehicule
	inner join user u on u.id_user = vc.id_user
);

CREATE VIEW view_veh_neuf as (
	select vn.id_vehicule, v.marque, v.modele, v.immatriculation, v.type_vehicule, v.cylindree, v.energie, v.type_boite,
		   v.prix, v.img_1, v.img_2
	from vehicule v
	inner join vehicule_neuf vn on vn.id_vehicule = v.id_vehicule
);

/* ------------ PROCEDURES --------------- */

delimiter $ 
create PROCEDURE insert_client (IN nom varchar(50), IN prenom varchar(50), IN mmail varchar(100), IN adresse varchar(200), IN tel varchar(10), IN mdp varchar(200))
BEGIN
	DECLARE id int(5);
	insert into user values (null,nom,prenom, mmail, adresse, tel, mdp);
	select id_user into id from user where mail = mmail;
	insert into client values (id);
END $

create PROCEDURE insert_admin (IN nom varchar(50), IN prenom varchar(50), IN mmail varchar(100), IN adresse varchar(200), IN tel varchar(10), IN mdp varchar(200), IN admin_lvl int(5))
BEGIN
	DECLARE id int(5);
	insert into user values (null,nom,prenom, mmail, adresse, tel, mdp);
	select id_user into id from user where mail = mmail;
	insert into admin values (id, admin_lvl);
END $

create PROCEDURE insert_technicien (IN nom varchar(50), IN prenom varchar(50), IN mmail varchar(100), IN adresse varchar(200), IN tel varchar(10), IN mdp varchar(200), IN technicien_lvl int(5), IN diplome varchar(50))
BEGIN
	DECLARE id int(5);
	insert into user values (null, nom, prenom, mmail, adresse, tel, mdp);
	select id_user into id from user where mail = mmail;
	insert into technicien values (id, technicien_lvl, diplome);
END $


create PROCEDURE insert_veh_neuf(IN marque varchar(50), IN modele varchar(50), IN immatriculation varchar(50), IN type_vehicule enum ("2 Roues" , "4 Roues"), IN cylindree int,
	IN energie enum ("Essence" , "Diesel", "Electrique", "Hybride"), IN type_boite enum ("Manuelle" , "Automatique"), IN prix float, IN img_1 varchar(50), IN img_2 varchar(50))
BEGIN
	DECLARE id int(5);
	insert into vehicule values (null, marque, modele, immatriculation, type_vehicule, cylindree, energie, type_boite, prix, img_1, img_2);
	select v.id_vehicule into id from vehicule v where v.immatriculation = immatriculation;
	insert into vehicule_neuf values (id);
END $

create PROCEDURE insert_veh_occas(IN marque varchar(50), IN modele varchar(50), IN date_immat date, IN immatriculation varchar(50), type_vehicule enum ("2 Roues" , "4 Roues"),
	IN cylindree int, IN energie enum ("Essence" , "Diesel", "Electrique", "Hybride"), IN type_boite enum ("Manuelle" , "Automatique"), 
	IN etat varchar(50), IN information Text, IN km Int, IN prix float, IN img_1 varchar(50), IN img_2 varchar(50))
BEGIN
	DECLARE id int(5);
	insert into vehicule values (null, marque, modele, immatriculation, type_vehicule, cylindree, energie, type_boite, prix, img_1, img_2);
	select v.id_vehicule into id from vehicule v where v.immatriculation = immatriculation;
	insert into vehicule_occasion values (id, date_immat, etat, information, km);
END $

create PROCEDURE insert_veh_client(IN id_user int(5), IN marque varchar(50), IN modele varchar(50), IN date_immat date, IN immatriculation varchar(50), type_vehicule enum ("2 Roues" , "4 Roues"),
	IN cylindree int, IN energie enum ("Essence" , "Diesel", "Electrique", "Hybride"), IN type_boite enum ("Manuelle" , "Automatique"),
	IN etat varchar(50), IN information Text, IN km Int, IN img_1 varchar(50), IN img_2 varchar(50))
BEGIN
	DECLARE id int(5);
	insert into vehicule values (null, marque, modele, immatriculation, type_vehicule, cylindree, energie, type_boite, prix, img_1, img_2);
	select v.id_vehicule into id from vehicule v where v.immatriculation = immatriculation;
	insert into vehicule_client values (id, date_immat, id_user, etat, information, km);
END $
delimiter ;


/* --------- INSERTION --------- */

call insert_admin('Aydogan', 'Lokman', 'lokman-hekim@hotmail.fr', '2 rue de clery', '0661957329', '123', 3);
call insert_admin('Goncalves', 'Miguel', 'migueldsg0904@gmail.com', '3 rue de clery', '0138216498', '123', 3);
call insert_client('Du Bois', 'Alber', 'neptashow@gmail.com', '6 rue de clery', '0618316586','123');
call insert_client('Goncalves 2', 'Miguel 2', 'miguou94700@hotmail.fr', '9 rue de clery', '0731569853','123');
call insert_technicien('Sanchez', 'Romain', 'romain@gmail.com', '23 rue de clery', '0613469872', '123', 3, 'bac +2');

call insert_veh_client(3, 'bmw', 'x6', '2018-09-24', 'ef-458-de', '4 Roues', 1600, 'essence', 'manuelle', 'bon etat', '', 78500, "x6_1.jpg", "x6_2.jpg");
call insert_veh_client(4, 'bmw', 'x4', '2019-09-24', 'zf-587-aa', '4 Roues', 1600, 'essence', 'manuelle', 'bon etat', '', 77459, "x6_1.jpg", "x6_2.jpg");
call insert_veh_client(3, 'bmw', 'serie 4', '2012-09-24', 'rf-785-de', '4 Roues', 1600, 'essence', 'manuelle', 'quelques rayures', '', 84548, "x6_1.jpg", "x6_2.jpg");
call insert_veh_client(4, 'bmw', 'serie 5', '2018-04-24', 'el-588-du', '4 Roues', 1600, 'essence', 'manuelle', 'moyen', '', 124525, "x6_1.jpg", "x6_2.jpg");

call insert_veh_occas('bmw', 'serie 5', '2018-09-26', 'ml-878-du', '4 Roues', 1600, 'essence', 'manuelle', 'moyen', '', 70000, 145487, "x6_1.jpg", "x6_2.jpg");
call insert_veh_occas('bmw', 'serie 5', '2017-09-24', 'ml-875-du', '4 Roues', 1600, 'essence', 'manuelle', 'moyen', '', 70000, 145487, "x6_1.jpg", "x6_2.jpg");
call insert_veh_occas('bmw', 'serie 5', '2015-05-24', 'bl-578-du', '4 Roues', 1600, 'essence', 'manuelle', 'moyen', '', 20000, 48842, "x6_1.jpg", "x6_2.jpg");
call insert_veh_occas('bmw', 'serie 5', '2018-08-24', 'as-001-dr', '4 Roues', 1600, 'essence', 'manuelle', 'moyen', '', 1000, 75000, "x6_1.jpg", "x6_2.jpg");

call insert_veh_neuf('bmw', 'serie 6', 'rt-875-dd', '4 Roues', 1600, 'essence', 'manuelle', 745870, "x6_1.jpg", "x6_2.jpg");
call insert_veh_neuf('bmw', 'serie 6', 'bvd-745-zz', '4 Roues', 1600, 'essence', 'manuelle', 28000, "x6_1.jpg", "x6_2.jpg");
call insert_veh_neuf('bmw', 'x6', 'rt-003-dd', '4 Roues', 1600, 'essence', 'manuelle', 27500, "x6_1.jpg", "x6_2.jpg");
call insert_veh_neuf('bmw', 'x6', 'ff-001-dd', '4 Roues', 1600, 'essence', 'manuelle', 36500, "x6_1.jpg", "x6_2.jpg");
call insert_veh_neuf('bmw', 'x5', 'as-784-dd', '4 Roues', 1600, 'essence', 'manuelle', 87500, "x6_1.jpg", "x6_2.jpg");

insert into devis values(null, 'Vente', 'rt-875-dd', 'Aydogan', 'Lokman', 'lokman-hekim@hotmail.fr',
'2 rue de Cléry', 'Vérifications', 50, NOW(), 1, 5);