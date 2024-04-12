<?php

require_once "db/conexao.php";


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    
   
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

   
    if ($stmt->execute()) {
       
        header("Location: main.php");
        exit();
    } else {
       
        header("Location: registro.php");
        exit();
    }

   
    $stmt->close();
}

$conn->close();
?>
