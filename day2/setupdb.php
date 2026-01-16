<?php

/*E’ importante mantenere l’informazione relativa al
pagamento relativa o di ogni corso frequentato. I corsi sono caratterizzati dal codice
corso, una breve descrizione, il costo, i giorni della settimana in cui sono programmati,
gli impianti che li ospitano e le relative ore di inizio e di fine in cui sono tenuti. Ciascun corso (svolto in un determinato
impianto) ha un responsabile esterno. Per quest’ultimo si conosce il codice fiscale, il
nome, il cognome, il telefono, l’indirizzo e la paga oraria. Gli atleti possono svolgere uno
sport individuale o essere inseriti in una o più squadre, ricordando per ciascuna l’anno
di ingresso. In entrambi i casi devono essere iscritti ai relativi corsi. Ogni squadra è
caratterizzata da un nome, categoria, numero di atleti titolari, allenatore. Per gli
allenatori sono noti la data della tessera federativa, il relativo codice, il nome e il
cognome.*/ 

require 'connect.php';

$conn->query(query: "USE $db;");
$conn->query(query: "CREATE TABLE IF NOT EXISTS associates (AssociateID CHAR(36) NOT NULL, Username VARCHAR(16) NOT NULL, PasswordHash VARCHAR(128) NOT NULL, Name VARCHAR(32), Surname VARCHAR(32), DatOfBirth CHAR(10), PRIMARY KEY (AssociateId));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS courses (CourseID CHAR(36) NOT NULL, Schedule VARCHAR(255), Description VARCHAR(512), Price INT, PRIMARY KEY (CourseID);");
$conn->query(query: "CREATE TABLE IF NOT EXISTS associate_courses (AssociateID CHAR(36) NOT NULL, CourseID CHAR(36) NOT NULL, PRIMARY KEY (AssociateID, CourseID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID), FOREIGN KEY (CourseID) REFERENCES courses(CourseID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS athletes (AssociateID CHAR(36) ) NOT NULL, LastMedicalCheck CHAR(10), MembershipExpiration CHAR(10), PRIMARY KEY (AssociateID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS members (AssociateID CHAR(36) NOT NULL, CoursesAttended INT, PRIMARY KEY (AssociateID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS honorary_members (AssociateID CHAR(36) NOT NULL, Role VARCHAR(32), PRIMARY KEY (AssociateID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS locations (LocationID CHAR(36) NOT NULL, Description VARCHAR(255), Address VARCHAR(255), Phone VARCHAR(15), Manager VARCHAR(64), PRIMARY KEY (LocationID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS ")