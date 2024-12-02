<?php

global $pdo;
require_once 'connect.php';
require_once __DIR__ . '/vendor/autoload.php';

$sql = "SELECT * FROM `posts` LIMIT 10";

$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);




