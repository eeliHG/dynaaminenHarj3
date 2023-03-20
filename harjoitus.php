<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

try{
$db = new PDO('mysql:host=localhost;dbname=shoppinglist;charset=utf8','root','');
$sql = "select * from item";
$query = $db->query($sql);
$results=$query->fetchAll(PDO::FETCH_ASSOC);
header('HTTP/1.1 200 OK');
print json_encode($results);
}
catch (PDOException $pdoex){
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' =>$pdoex->getMessage());
    print json_encode($error);
}
