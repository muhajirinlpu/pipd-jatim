<?php

$conf = include_once("../config.php");
try{
    $conn = new PDO("mysql:host={$conf['host']};dbname={$conf['dbname']};",$conf['uname'],$conf['pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}

include_once("fn.php");
session_start();