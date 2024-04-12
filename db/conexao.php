<?php

$hostname = "xxxxxx";
$username = "xxxxxx";
$password = "xxxxxx";
$database = "xxxxxx"; 

$conn = new mysqli($hostname, $username, $password, $database);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$conn->set_charset("utf8");

?>
