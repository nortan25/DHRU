<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>alfa sever</title>
    <link rel="stylesheet" href="cssbar.css">
</head>
<body>

<?php

session_start();

if(isset($_SESSION['usuario_id'])) {

    include 'bar2.php';

} else {

    include 'bar.php';

}

?>

<div class="container">
    <h1>Bem-vindo ao Nosso Site</h1>
    <h3>Um lugar para compartilhar e se conectar</h3>

    <div class="message-container">
        <div class="message">
            <h3>Mensagem 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce suscipit, mauris quis mollis aliquet.</p>
        </div>
        <div class="message">
            <h3>Mensagem 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce suscipit, mauris quis mollis aliquet.</p>
        </div>
        
    </div>

    <div class="social-icons">
        <img src="facebook.png" alt="Facebook">
        <img src="twitter.png" alt="Twitter">
        <img src="instagram.png" alt="Instagram">
    </div>
</div>
</body>
</html>
