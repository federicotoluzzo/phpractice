<?php

require 'config.php';

$servername = "localhost";
$db = "fuffoshop";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  
  $conn->exec("CREATE TABLE IF NOT EXISTS clients (ClientId VARCHAR(36) NOT NULL, Username VARCHAR(16) NOT NULL, ClientName VARCHAR(32), ClientSurname VARCHAR(32), PRIMARY KEY (ClientId));");
  
  $stmt = $conn->prepare("INSERT INTO clients (ClientId, Username, ClientName, ClientSurname) VALUES (?, ?, ?, ?)");
  
  $ClientId = guidv4();
  $Username = $argv[1];
  $ClientName = $argv[2];
  $ClientSurname = $argv[3];
  
  $stmt->execute([$ClientId, $Username, $ClientName, $ClientSurname]);
  
  echo "Record inserted successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// copiato dal web
function guidv4($data = null) {
  $data = $data ?? random_bytes(16);
  assert(strlen($data) == 16);

  // Set version to 0100
  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
  // Set bits 6-7 to 10
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

  // Output the 36 character UUID.
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
