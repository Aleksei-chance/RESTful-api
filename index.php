<?php

header('Content-Type: application/json');

require_once 'connect.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/functions.php';


$q = $_GET['q'] ?? null;
if(!$q){
    return false;
}
$params = explode('/', $q);

$type = $params[0];
$id = $params[1] ?? 0;

if($type === 'posts') {
    echo getPosts();
}
else if($type === 'post') {
    echo getPost($id);
}






