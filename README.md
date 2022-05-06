# Progetto-LTW
Progetto relativo al corso Linguaggi e Tecnologie per il Web , ingegneria informatica Sapienza; anno 2021/2022
<<<<<<< HEAD
<<<<<<< HEAD
Partecipanti: Claudio Schiavella, Mattia Russo
=======
=======
>>>>>>> homePrivata
Partecipanti: Claudio Schiavella, Mattia Russo.
>>>>>>> 30ad35460e2dfeae0cf718177526fc4c00e1c509

# Costruzione del db
create table Utente(
	email varchar(50) primary key,
	username varchar(40) not null,
	password varchar(40) not null
);

create table scheda(
	nome varchar(15),
	utente varchar(50) references Utente,
	primary key(nome,utente)
);

create table esercizio(
	nome varchar(30),
	utenteScheda varchar(50),
	nomeScheda varchar(15),
	gruppoM varchar(15) not null,
	numSerie integer not null,
	numOrdine integer not null,
	descrizione varchar(15),
	primary key(nome,utenteScheda,nomeScheda),
	foreign key (nomeScheda,utenteScheda) references Scheda(nome,utente)
);

