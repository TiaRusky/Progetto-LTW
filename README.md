# Progetto-LTW
Progetto relativo al corso Linguaggi e Tecnologie per il Web , ingegneria informatica Sapienza; anno 2021/2022

# Costruzione del db
create table Utente(
	email varchar(50) primary key,
	username varchar(40) not null,
	password varchar(40) not null
);
