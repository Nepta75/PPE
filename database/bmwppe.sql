drop database if exists bmwppe ;
create database bmwppe ;
use bmwppe ;

create table client (
	idclient int(5) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	adresse_rue varchar(50),
	adresse_ville varchar(50),
	adresse_cp int(5),
	email varchar(50),
	tel int(10),
	primary key (idclient)
);

create table technicien (
	idtechnicien int(5) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(50),
	tel int(10),
	primary key (idadmin)
);

create table acheter (
	idvehiculeneuf int(5) not null,
	idclient int(5) not null,
	date_achat date,
	primary key (idvehiculeneuf , idclient),
	foreign key (idvehiculeneuf) references vehicule_neuf (idvehiculeneuf),
	foreign key (idclient) references client (idclient)
);

create table acheter2 (
	idvehiculeocc int(5) not null,
	idclient int(5) not null,
	date_achat date,
	primary key (idvehiculeocc , idclient),
	foreign key (idvehiculeocc) references vehicule_occasion (idvehiculeocc),
	foreign key (idclient) references client (idclient)
);

create table essayer (
	idvehiculeneuf int(5) not null,
	idclient int(5) not null,
	date_essai date,
	heure_essai time,
	primary key (idvehiculeneuf, idclient),
	foreign key (idvehiculeneuf) references vehicule_neuf (idvehiculeneuf),
	foreign key (idclient) references client (idclient)
):

create table devis (
	iddevis int(5) not null auto_increment,
	date_devis date,
	designation varchar(50),
	prix_total float(6.2),
	primary key (iddevis),
	foreign key (idclient) references client (idclient),
	foreign key (idtechnicien) references technicien (idtechnicien)
);

create table facture (
	idfacture int(5) not null auto_increment,
	date_facture date,
	designation varchar(50),
	prix_total float(6.2),
	primary key (idfacture),
	foreign key (idclient) references client (idclient),
	foreign key (idtechnicien) references technicien (idtechnicien)
);

create table avis (
	idavis int(5) not null auto_increment,
	note int(5),
	commentaire varchar(200),
	date_avis date,
	primary key (idavis)
);

create table vehicule_client (
	idvehiculeclient int(5) not null auto_increment,
	type_vehicule enum ("2 Roues" , "4 Roues"),
	modele varchar(50),
	millesime int(4),
	kilometrage int(6),
	cylindree int(4),
	energie enum ("Essence" , "Diesel", "Electrique", "Hybride"),
	type_boite enum ("Manuelle" , "Automatique"),
	date_immat date,
	descriptif varchar(200),
	valide bool,
	date_rdv date,
	heure_rdv time,
	type_rdv enum ("")
);

create table vehicule_occasion (
	idvehiculeocc int(5) not null auto_increment,
	type_vehicule enum ("2 Roues" , "4 Roues"),
	modele varchar(50),
	millesime int(4),
	kilometrage int(6),
	cylindree int(4),
	energie enum ("Essence" , "Diesel", "Electrique", "Hybride"),
	type_boite enum ("Manuelle" , "Automatique"),
	prix float(6.2),
	date_immat date,
	descriptif varchar(200),
	valide bool,
	primary key (idvehiculeocc),
	foreign key (idclient) references client (idclient),
	foreign key (idtechnicien) references technicien (idtechnicien),
	foreign key (idfacture) references facture (idfacture)
);

create table vehicule_neuf (
	idvehiculeneuf int(5) not null auto_increment,
	type_vehicule enum ("2 Roues" , "4 Roues"),
	modele varchar(50),
	millesime int(4),
	cylindree int(4),
	energie enum ("Essence" , "Diesel", "Electrique", "Hybride"),
	type_boite enum ("Manuelle" , "Automatique"),
	prix float(6.2),
	date_immat date,
	primary key (idvehiculeneuf),
	foreign key (idfacture) references facture (idfacture)
);

create table deposer (
	idavis int(5) not null,
	idclient int(5) not null,
	primary key (idavis, idclient),
	foreign key (idavis) references avis (idavis),
	foreign key (idclient) references client (idclient)
);

