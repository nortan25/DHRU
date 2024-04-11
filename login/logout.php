<?php

session_start();

if(isset($_SESSION['usuario_id'])) {

    $_SESSION = array();

    
    session_destroy();

    
    header("Location: main.php");
    exit();
} else {
   
    header("Location: main.php");
    exit();
}
?>
