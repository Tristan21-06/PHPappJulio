<?php

$type = $_GET['type'];

$path = "../../localDB/DB.json";
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);

$myfile = fopen("../localDB/DB.json", "w");

$jsonData[$type] = json_decode($_GET[$type]);
echo json_encode($jsonData);

fwrite($myfile, json_encode($jsonData));
fclose($myfile);