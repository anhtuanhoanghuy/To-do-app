<?php

$sName = 'localhost';
$uName = 'root';
$pass = '';
$db_name = 'to-do-app';

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    $e->getMessage();
  }
  ?>