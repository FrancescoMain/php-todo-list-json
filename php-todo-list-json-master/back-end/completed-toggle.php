<?php

//do i permessi al mio front end
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

//dico alla macchina che si tratta di un database json
header('Content-Type: application/json');

//vado a prendere la variabile nuove
$completed = $_GET['completed'] === "true"
            ? true
            : false ;
$index = $_GET['index'];
$text= $_GET['text'];

$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);


$todoList[$index] = [

    "text" => $text,
    "completed" => $completed
];

$jsonTodoList = json_encode($todoList);
file_put_contents('todo.json' , $jsonTodoList);