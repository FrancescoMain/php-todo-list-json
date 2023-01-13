<?php

//do i permessi al mio front end
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

//dico alla macchina che si tratta di un database json
header('Content-Type: application/json');


$jsonTodoList = file_get_contents("todo.json");


//codifico i dati ni mood che siano leggibli
echo $jsonTodoList;