<?php

require 'connect.php';

$conn->query(query: "CREATE DATABASE IF NOT EXISTS $db;");
$conn->query(query: "USE $db;");
$conn->query(query: "CREATE TABLE IF NOT EXISTS clients (ClientId VARCHAR(36) NOT NULL, Username VARCHAR(16) NOT NULL, Name VARCHAR(32), Surname VARCHAR(32), PRIMARY KEY (ClientId));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS products (ProductId VARCHAR(36) NOT NULL, ProductName VARCHAR(64), Price FLOAT, Icon VARCHAR(255), PRIMARY KEY (ProductId));");
$conn->query(query: "CREATE TABLE IF NOT EXISTS sales (SaleId VARCHAR(36) NOT NULL, ClientId VARCHAR(36), ProductId VARCHAR(36), ProductCount INT, PRIMARY KEY (SaleId), FOREIGN KEY (ClientId) REFERENCES clients(ClientId), FOREIGN KEY (ProductId) REFERENCES products(ProductId));");
