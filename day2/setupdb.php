<?php

/*E’ importante mantenere l’informazione relativa al
pagamento relativa o di ogni corso frequentato.*/ 

require 'connect.php';

$conn->query(query: "USE $db;");
$conn->query(query: "CREATE TABLE IF NOT EXISTS associates (AssociateID CHAR(36) NOT NULL, Username VARCHAR(16) NOT NULL, PasswordHash VARCHAR(128) NOT NULL, Name VARCHAR(32), Surname VARCHAR(32), DatOfBirth CHAR(10), PRIMARY KEY (AssociateId));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS managers (ManagerID CHAR(36) NOT NULL, CF CHAR(16), Name VARCHAR(32), Surname VARCHAR(32), Phone VARCHAR(15), Address VARCHAR(255), HourlyRate INT, PRIMARY KEY (ManagerID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS courses (CourseID CHAR(36) NOT NULL, Schedule VARCHAR(255), Description VARCHAR(512), Price INT, ManagerID CHAR(36), PRIMARY KEY (CourseID), FOREIGN KEY (ManagerID) REFERENCES managers(ManagerID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS associate_courses (AssociateID CHAR(36) NOT NULL, CourseID CHAR(36) NOT NULL, PRIMARY KEY (AssociateID, CourseID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID), FOREIGN KEY (CourseID) REFERENCES courses(CourseID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS athletes (AssociateID CHAR(36) NOT NULL, LastMedicalCheck CHAR(10), MembershipExpiration CHAR(10), PRIMARY KEY (AssociateID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS members (AssociateID CHAR(36) NOT NULL, CoursesAttended INT, PRIMARY KEY (AssociateID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS honorary_members (AssociateID CHAR(36) NOT NULL, Role VARCHAR(32), PRIMARY KEY (AssociateID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS locations (LocationID CHAR(36) NOT NULL, Description VARCHAR(255), Address VARCHAR(255), Phone VARCHAR(15), Manager VARCHAR(64), PRIMARY KEY (LocationID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS sessions (SessionID CHAR(36), CourseID CHAR(36) NOT NULL, LocationID CHAR(36) NOT NULL, StartTime CHAR(5), EndTime CHAR(5), PRIMARY KEY (SessionID), FOREIGN KEY (CourseID) REFERENCES courses(CourseID), FOREIGN KEY (LocationID) REFERENCES locations(LocationID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS coaches (CoachID CHAR(36) NOT NULL, FederationCardDate CHAR(10), FederationCardCode VARCHAR(16), Name VARCHAR(32), Surname VARCHAR(32), PRIMARY KEY (CoachID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS teams (TeamID CHAR(36) NOT NULL, Name VARCHAR(64), Category VARCHAR(32), NumAthletes INT, CoachID CHAR(36) NOT NULL, YearOfEntry INT, PRIMARY KEY (TeamID), FOREIGN KEY (CoachID) REFERENCES coaches(CoachID));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS athlete_teams (AssociateID CHAR(36) NOT NULL, TeamID CHAR(36) NOT NULL, PRIMARY KEY (AssociateID, TeamID), FOREIGN KEY (AssociateID) REFERENCES athletes(AssociateID), FOREIGN KEY (TeamID) REFERENCES teams(TeamID));");
