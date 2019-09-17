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
insert into client values 
(null, 'Aydogan', 'Lokman', '19 rue de clery', 'PARIS', '75002', 'lokman-hekim@hotmail.fr', '0662425270'),
(null, 'Goncavles', 'Miguel', '57 rue la fayette', 'PARIS', '75010', 'miguel@hotmail.fr', '0658745215'),
(null, 'Refai', 'Mohamed', '11 avenue jean', 'PARIS', '75006', 'mohamed@hotmail.fr', '0754874528');

create table utilisateur (
	iduser int(5) not null auto_increment,
	idclient int(5) not null,
	pseudo varchar(50),
	mdp varchar(255),
	email varchar(50),
	admin_lvl int(2) DEFAULT 0,
	primary key (iduser),
	foreign key (idclient) references client (idclient)
);

insert into utilisateur values (null, 1, 'Lokman', '123', 'lokman-hekim@hotmail.fr', 1),
(null, 2, 'Miguel', '123', 'miguel@hotmail.fr', 1),
(null, 3, 'Mohamed', '123', 'lmohamed@hotmail.fr', 1),
(null, 1, 'user', '123', 'user@hotmail.fr', 0);


create table technicien (
	idtechnicien int(5) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(50),
	tel int(10),
	primary key (idtechnicien)
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
	iduser int(5),
	immatriculation varchar(15),
	type_vehicule enum ("2 Roues" , "4 Roues"),
	modele varchar(50),
	millesime int(4),
	kilometrage int(6),
	cylindree int(4),
	energie enum ("Essence" , "Diesel", "Electrique", "Hybride"),
	type_boite enum ("Manuelle" , "Automatique"),
	date_immat date,
	descriptif varchar(200),
	valide enum ("Oui", "Non"),
	prix float(6.2),
	img text,
	date_rdv date,
	heure_rdv time,
	type_rdv enum (""),
	primary key (idvehiculeclient),
	foreign key(iduser) references utilisateur (iduser)
);

create table devis (
	iddevis int(5) not null auto_increment,
	idclient int(5),
	idtechnicien int(5),
	date_devis date,
	sujet varchar(50),
	immatriculation varchar(20),
	primary key (iddevis),
	foreign key (idclient) references client (idclient),
	foreign key (idtechnicien) references technicien (idtechnicien)
);

create table facture (
	idfacture int(5) not null auto_increment,
	idclient int(5),
	idtechnicien int(5),
	date_facture date,
	designation varchar(50),
	prix_total float(6.2),
	primary key (idfacture),
	foreign key (idclient) references client (idclient),
	foreign key (idtechnicien) references technicien (idtechnicien)
);

create table vehicule_occasion (
	idvehiculeocc int(5) not null auto_increment,
	idclient int(5),
	idtechnicien int(5),
	idfacture int(5),
	immatriculation varchar(15),
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
	valide enum ("Oui" , "Non"),
	img text,
	primary key (idvehiculeocc),
	foreign key (idclient) references client (idclient),
	foreign key (idtechnicien) references technicien (idtechnicien),
	foreign key (idfacture) references facture (idfacture)
);

create table vehicule_neuf (
	idvehiculeneuf int(5) not null auto_increment,
	idfacture int(5),
	immatriculation varchar(15),
	type_vehicule enum ("2 Roues" , "4 Roues"),
	modele varchar(50),
	millesime int(4),
	cylindree int(4),
	energie enum ("Essence" , "Diesel", "Electrique", "Hybride"),
	type_boite enum ("Manuelle" , "Automatique"),
	prix float(6.2),
	date_immat date,
	img text,
	primary key (idvehiculeneuf),
	foreign key (idfacture) references facture (idfacture)
);

create table essayer (
	idessayer int(5) not null auto_increment,
	idvehiculeneuf int(5),
	idclient int(5),
	date_essai date,
	heure_essai time,
	status_essai enum("Confirmer", "En Attente"),
	primary key (idessayer),
	foreign key (idvehiculeneuf) references vehicule_neuf (idvehiculeneuf),
	foreign key (idclient) references client (idclient)
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

create table deposer (
	idavis int(5) not null,
	idclient int(5) not null,
	primary key (idavis, idclient),
	foreign key (idavis) references avis (idavis),
	foreign key (idclient) references client (idclient)
);

