<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
</head>
<?php
require_once "cssbar.php";
?>
<body>

<h2>Registre-se</h2>

<form id="registro_form" method="post" action="processar_registro.php">
    <label for="nome">Nome:</label>
    <p>Coloque seu nome<p>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="email">Email:</label>
    <p>Coloque email<p>
    <input type="email" id="email" name="email" required><br><br>

     
    <label for="senha">Senha:</label>
    <p>Coloque sua senha<p>
    <input type="password" id="senha" name="senha" required><br><br>

    <input type="submit" value="Registrar">
</form>

</body>
</html>
