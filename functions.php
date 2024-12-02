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

    if($data)
    {
        return json_encode($data);
    }
    http_response_code(404);
    $res = [
        'status' => false,
        'message' => 'Post not fount'
    ];
    return  json_encode($res);
}

function error($code = 404):string
{
    http_response_code($code);
    $ret = [
        'status' => false,
        'massage' => 'Bad request',
    ];
    return json_encode($ret);
}

function addPost($data):string
{
    global $db;
    if(isset($data['title']) && isset($data['body']))
    {
        $sql = "INSERT INTO posts (`title`, `body`) VALUES (:title, :body)";
        $stmt = $db->prepare($sql);
        $stat = $stmt->execute([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
        if($stat){
            http_response_code(201);
            $ret = [
                'status' => true,
                'post' => $db->lastInsertId()
            ];
            return json_encode($ret);
        }
    }
    return error();
}

function updatePost($id, $data):string
{
    global $db;
    if(isset($data['title']) && isset($data['body'])){
        $sql = "UPDATE `posts` SET `title` = :title, `body` = :body WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stat = $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
        if($stat){
            $ret = [
                'status' => true,
                'massage' => 'Post is updated'
            ];
            return json_encode($ret);
        }
    }
    return error();
}
