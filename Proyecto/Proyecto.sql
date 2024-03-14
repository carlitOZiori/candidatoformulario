Drop DataBase Proyecto;

Create DataBase Proyecto;

use Proyecto;

Create table Candidato(
	idCandidato int AUTO_INCREMENT,
	Nombre varchar(20),
	ApellidoP varchar(20),
	ApellidoM varchar(20),
	Email varchar(64),
	telefono varchar(10),
	Escolaridad varchar(20),
	Estatus varchar(15),
	PRIMARY KEY  (idCandidato))
    ENGINE = InnoDB;

Create table Especialidad(
	idEspecialidad int AUTO_INCREMENT,
	idCandidato int,
	Nombre varchar(30),
	certificado LONGBLOB,
	fechaObtencion date,
	PRIMARY KEY(idEspecialidad),
	FOREIGN KEY (idCandidato) references Candidato(idCandidato))
	ENGINE=InnoDB;
	