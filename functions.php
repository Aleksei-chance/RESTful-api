<?php

function getPosts():string
{
    global $db;
    $sql = "SELECT * FROM `posts` LIMIT 10";

    $stmt = $db->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($data);
}

function getPost($id):string
{
    global $db;
    $sql = "SELECT * FROM posts WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(['id' => $id]);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return json_encode($data);
}
