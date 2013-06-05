DROP TABLE Administrador CASCADE CONSTRAINTS
;
DROP TABLE Categoria CASCADE CONSTRAINTS
;
DROP TABLE Cortecia CASCADE CONSTRAINTS
;
DROP TABLE ListaEspera CASCADE CONSTRAINTS
;
DROP TABLE Lugar CASCADE CONSTRAINTS
;
DROP TABLE Partida CASCADE CONSTRAINTS
;
DROP TABLE Regular CASCADE CONSTRAINTS
;
DROP TABLE Ronda CASCADE CONSTRAINTS
;
DROP TABLE Socio CASCADE CONSTRAINTS
;
DROP TABLE TarjetaCredito CASCADE CONSTRAINTS
;
DROP TABLE Torneo CASCADE CONSTRAINTS
;
DROP TABLE Usuario CASCADE CONSTRAINTS
;

CREATE TABLE Administrador
(
	k_cedula  NUMBER(10) NOT NULL
)
;


CREATE TABLE Categoria
(
	k_idCategoria  NUMBER(1) NOT NULL,
	n_categoria    VARCHAR(10) NOT NULL
)
;


CREATE TABLE Cortecia
(
	k_cedula  NUMBER(10) NOT NULL
)
;


CREATE TABLE ListaEspera
(
	k_cedula     NUMBER(10) NOT NULL,
	k_idPartida  NUMBER(8) NOT NULL,
	f_adicion    DATE NOT NULL,
	q_prioridad  NUMBER(8) NOT NULL
)
;


CREATE TABLE Lugar
(
	k_idLugar    NUMBER(8) NOT NULL,
	o_direccion  VARCHAR(20) NOT NULL,
	n_sitio      VARCHAR(20) NOT NULL
)
;


CREATE TABLE Partida
(
	k_idPartida      NUMBER(8) NOT NULL,
	i_estadoPartida  VARCHAR(1) NOT NULL,
	f_fechaHora      DATE NOT NULL,
	k_idLugar        NUMBER(8) NOT NULL,
	k_cedulaGanador  NUMBER(10),
	k_idRonda        NUMBER(8) NOT NULL
)
;


CREATE TABLE Regular
(
	k_cedula  NUMBER(10) NOT NULL
)
;


CREATE TABLE Ronda
(
	k_idRonda      NUMBER(8) NOT NULL,
	q_numeroRonda  NUMBER(8) NOT NULL,
	i_estadoRonda  VARCHAR2(1) NOT NULL,
	k_idTorneo     NUMBER(8) NOT NULL
)
;


CREATE TABLE Socio
(
	k_cedula        NUMBER(10) NOT NULL,
	f_afiliacion    DATE NOT NULL,
	n_nacionalidad  VARCHAR(20) NOT NULL,
	i_tipoSocio     VARCHAR(1) NOT NULL,
	k_categoria     NUMBER(1) NOT NULL
)
;


CREATE TABLE TarjetaCredito
(
	k_numeroTarjeta       NUMBER(16) NOT NULL,
	o_codigoVerificacion  NUMBER(5) NOT NULL,
	o_claveTarjeta        VARCHAR(32) NOT NULL,
	n_nombreTarjeta       VARCHAR(20) NOT NULL,
	f_vencimiento         DATE NOT NULL,
	i_tipoTarjeta         VARCHAR(1) NOT NULL,
	k_cedula              NUMBER(10) NOT NULL
)
;


CREATE TABLE Torneo
(
	k_idTorneo      NUMBER(8) NOT NULL,
	f_inicio        DATE NOT NULL,
	f_final         DATE NOT NULL,
	i_estadoTorneo  VARCHAR(1) NOT NULL,
	k_idCategoria   NUMBER(1) NOT NULL,
	Q_PARTICIPANTES NUMBER (3) NOT NULL	
)
;


CREATE TABLE Usuario
(
	k_cedula     NUMBER(10) NOT NULL,
	n_correo     VARCHAR(50) NOT NULL,
	n_nombres    VARCHAR(50) NOT NULL,
	n_apellidos  VARCHAR(50) NOT NULL,
	i_rol        VARCHAR(1) NOT NULL,
	o_password   VARCHAR(32) NOT NULL
)
;



ALTER TABLE Partida
ADD CONSTRAINT ck_iestadoPartida CHECK (i_estadoPartida in ('J','A','F'))
;

ALTER TABLE TarjetaCredito
ADD CONSTRAINT ck_itipoTarjeta CHECK (i_tipoTarjeta in ('V','A','M'))
;

ALTER TABLE Torneo
ADD CONSTRAINT ck_iestadoTorneo CHECK (i_estadoTorneo in ('J','F','A'))
;

ALTER TABLE Usuario
	ADD CONSTRAINT UQ_Usuario_n_correo UNIQUE (n_correo)
;

ALTER TABLE Usuario
ADD CONSTRAINT ck_rol CHECK (i_rol in ('S','A'))
;

ALTER TABLE Administrador ADD CONSTRAINT PK_Administrador 
	PRIMARY KEY (k_cedula)
;

ALTER TABLE Categoria ADD CONSTRAINT PK_Categoria 
	PRIMARY KEY (k_idCategoria)
;

ALTER TABLE Cortecia ADD CONSTRAINT PK_Cortecia 
	PRIMARY KEY (k_cedula)
;

ALTER TABLE ListaEspera ADD CONSTRAINT PK_ListaEspera 
	PRIMARY KEY (k_cedula, k_idPartida)
;

ALTER TABLE Lugar ADD CONSTRAINT PK_Lugar 
	PRIMARY KEY (k_idLugar)
;

ALTER TABLE Partida ADD CONSTRAINT PK_Partida 
	PRIMARY KEY (k_idPartida)
;

ALTER TABLE Regular ADD CONSTRAINT PK_Regular 
	PRIMARY KEY (k_cedula)
;

ALTER TABLE Ronda ADD CONSTRAINT PK_Ronda 
	PRIMARY KEY (k_idRonda)
;

ALTER TABLE Socio ADD CONSTRAINT PK_Socio 
	PRIMARY KEY (k_cedula)
;

ALTER TABLE TarjetaCredito ADD CONSTRAINT PK_TarjetaCredito 
	PRIMARY KEY (k_numeroTarjeta)
;

ALTER TABLE Torneo ADD CONSTRAINT PK_Torneo 
	PRIMARY KEY (k_idTorneo)
;

ALTER TABLE Usuario ADD CONSTRAINT PK_Usuario 
	PRIMARY KEY (k_cedula)
;



ALTER TABLE Administrador ADD CONSTRAINT FK_Administrador_Usuario 
	FOREIGN KEY (k_cedula) REFERENCES Usuario (k_cedula)
;

ALTER TABLE Cortecia ADD CONSTRAINT FK_Cortecia_Socio 
	FOREIGN KEY (k_cedula) REFERENCES Socio (k_cedula)
;

ALTER TABLE ListaEspera ADD CONSTRAINT FK_ListaEspera_Partida 
	FOREIGN KEY (k_idPartida) REFERENCES Partida (k_idPartida)
;

ALTER TABLE ListaEspera ADD CONSTRAINT FK_ListaEspera_Socio 
	FOREIGN KEY (k_cedula) REFERENCES Socio (k_cedula)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Lugar 
	FOREIGN KEY (k_idLugar) REFERENCES Lugar (k_idLugar)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Ronda 
	FOREIGN KEY (k_idRonda) REFERENCES Ronda (k_idRonda)
;

ALTER TABLE Partida ADD CONSTRAINT FK_Partida_Socio 
	FOREIGN KEY (k_cedulaGanador) REFERENCES Socio (k_cedula)
;

ALTER TABLE Regular ADD CONSTRAINT FK_Regular_Socio 
	FOREIGN KEY (k_cedula) REFERENCES Socio (k_cedula)
;

ALTER TABLE Ronda ADD CONSTRAINT FK_Ronda_Torneo 
	FOREIGN KEY (k_idTorneo) REFERENCES Torneo (k_idTorneo)
;

ALTER TABLE Socio ADD CONSTRAINT FK_Socio_Categoria 
	FOREIGN KEY (k_categoria) REFERENCES Categoria (k_idCategoria)
;

ALTER TABLE Socio ADD CONSTRAINT FK_Socio_Usuario 
	FOREIGN KEY (k_cedula) REFERENCES Usuario (k_cedula)
;

ALTER TABLE TarjetaCredito ADD CONSTRAINT FK_TarjetaCredito_Regular 
	FOREIGN KEY (k_cedula) REFERENCES Regular (k_cedula)
;

ALTER TABLE Torneo ADD CONSTRAINT FK_Torneo_Categoria 
	FOREIGN KEY (k_idCategoria) REFERENCES Categoria (k_idCategoria)
;
