<?php

$host = 'localhost';
$dbname = 'Knowledge_Base';
$username = 'root';
$password = 'root';
$port = 8889;

$pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
