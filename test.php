<?php
session_name("DHRUFUSION");
session_set_cookie_params(0, "/", null, false, true);
session_start();
error_reporting(0);


include_once 'api.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';
$parameters = isset($_POST['parameters']) ? $_POST['parameters'] : '';


$response = processAPIRequest($action, $parameters);


header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);
?>
