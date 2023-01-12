<?php



//cre un database su un server
$todoList = [
    [
        "text" => "todo 1",
        "completed" => true
    ],
    [
        "text" => "todo 2",
        "completed" => true
    ],
    [
        "text" => "todo 3",
        "completed" => false
    ],
    [
        "text" => "todo 4",
        "completed" => false
    ]
];
//do i permessi al mio front end
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
//dico alla macchina che si tratta di un database json
header('Content-Type: application/json');

//prendo dal front end la variabile newtodo
$newTodo = $_GET['newTodo'];

//la pusho nel db
$todoList[] = [
    "text" => $newTodo,
    "completed" => false
];

//codifico i dati ni mood che siano leggibli
echo json_encode($todoList);