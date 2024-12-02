<?php

$host = 'localhost';
$dbname = 'Knowledge_Base';
$username = 'root';
$password = 'root';
$port = 8889;

$db = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
