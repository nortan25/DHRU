<?php

$hostname = "sql303.infinityfree.com";
$username = "epiz_33388613";
$password = "TnMqTB8mB9q7ff";
$database = "epiz_33388613_alfa"; 

$conn = new mysqli($hostname, $username, $password, $database);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$conn->set_charset("utf8");

?>
