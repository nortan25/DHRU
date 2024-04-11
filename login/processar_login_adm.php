<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    require_once "db\conexao.php";

    
    $sql = "SELECT id, email, senha FROM usuarios WHERE email = ? AND is_admin = 1";

    
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("s", $email);

    
    $stmt->execute();

  
    $result = $stmt->get_result();

    
    if ($result->num_rows == 1) {
       
        $row = $result->fetch_assoc();

       
        if (password_verify($senha, $row['senha'])) {
           
            $_SESSION['usuario_id'] = $row['id'];

           
            header("Location: Super.php");
            exit();
        } else {
           
            echo "Senha incorreta.";
        }
    } else {
        
        echo "Email de administrador não encontrado.";
    }

   
    $stmt->close();

   
    $conn->close();
}
?>
