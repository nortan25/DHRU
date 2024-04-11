<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

   
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    
    require_once "db\conexao.php";

  
    $sql = "INSERT INTO usuarios (nome, email, senha, is_admin) VALUES (?, ?, ?, 1)";
    
  
    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

   
    if ($stmt->execute()) {
        
        echo "Registro de administrador criado com sucesso!";
    } else {
       
        echo "Erro ao criar registro de administrador: " . $stmt->error;
    }

  
    $stmt->close();

   
    $conn->close();
}
?>
