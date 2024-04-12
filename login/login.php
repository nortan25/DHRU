<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<?php
require_once "alfasever/cssbar.php";
require_once "alfasever/bar.php";
?>

<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="processar_login.php" method="post">
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="submit" value="Entrar">
    </form>
</div>

</body>
</html>
