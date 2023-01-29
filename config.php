<?php

$db_name = "mysql:host=localhost;dbname=efarmskenya_db";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);

//$db_host = $_ENV["DB_HOST"];
//$db_port = $_ENV["DB_PORT"];
//$db_name = $_ENV["DB_DATABASE"];
//$username = $_ENV["DB_USERNAME"];
//$password = $_ENV["DB_PASSWORD"];


//try {
//    $conn = new PDO("dbname=$db_name", $username, $password,array(
////        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
////        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //after php5.3.6
//    ));
//    //$p->exec('SET NAMES utf8');
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}

