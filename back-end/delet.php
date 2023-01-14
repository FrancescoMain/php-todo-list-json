<?php
//do i permessi al mio front end
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

//dico alla macchina che si tratta di un database json
header('Content-Type: application/json');

//vado a prendere la variabile nuove
$index = $_GET['index'];

$jsonTodoList = file_get_contents("todo.json");
$todoList = json_decode($jsonTodoList);


function delete_item($todoList,$index){
   unset($todoList[$index]);
    return array_merge($todoList);
}

$todoList = delete_item($todoList,$index);
$jsonTodoList = json_encode($todoList);
file_put_contents('todo.json' , $jsonTodoList);

echo json_encode($todoList);