<?php

session_start();

if(isset($_SESSION['usuario_id'])) {

    $_SESSION = array();

    
    session_destroy();

    
    header("Location: alfasever/main.php");
    exit();
} else {
   
    header("Location: alfasever/main.php");
    exit();
}
?>
