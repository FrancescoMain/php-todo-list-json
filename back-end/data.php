<?php




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

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

echo json_encode($todoList);