<?php

header('Content-Type: application/json');

require_once 'connect.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'] ?? null;
if(!$q){
    return false;
}
$params = explode('/', $q);

$type = $params[0];
$id = $params[1] ?? 0;

if($method === 'GET'){
    if($type === 'posts') {
        echo getPosts();
    } else if($type === 'post' && $id) {
        echo getPost($id);
    } else {
        echo error();
    }
} else if ($method === 'POST') {
    if($type === 'post') {
        echo addPost($_POST);
    } else {
        echo error();
    }
} else if($method === 'PATCH') {
    if($type === 'post' && $id) {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        echo updatePost($id, $data);
    } else {
        echo error();
    }
} else {
    echo error(405);
}








