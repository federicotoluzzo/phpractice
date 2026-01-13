<?php

require 'connect.php';

$conn->query(query: "USE $db;");
$conn->query(query: "CREATE TABLE IF NOT EXISTS associates (AssociateID CHAR(36) NOT NULL, Username VARCHAR(16) NOT NULL, PasswordHash VARCHAR(128) NOT NULL, Name VARCHAR(32), Surname VARCHAR(32), DatOfBirth CHAR(10), PRIMARY KEY (AssociateId));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS courses (CourseID CHAR(36) NOT NULL, Schedule VARCHAR(255), PRIMARY KEY (CourseID);");
$conn->query(query: "CREATE TABLE IF NOT EXISTS associate_courses (AssociateID CHAR(36) NOT NULL, CourseID CHAR(36) NOT NULL, PRIMARY KEY (AssociateID, CourseID), FOREIGN KEY (AssociateID) REFERENCES associates(AssociateID), FOREIGN KEY (CourseID) REFERENCES courses(CourseID));");
$conn->query(query: "");
