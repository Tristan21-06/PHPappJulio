<?php

$type = $_GET['type'];

$path = "../../localDB/DB.json";
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);

if($type){
    echo json_encode($jsonData[$type]);
} else {
    echo json_encode('');
}