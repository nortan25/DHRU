<?php

session_start();


require_once "db\conexao.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        
        $sql = "SELECT id, email, senha FROM usuarios WHERE email = ?";
        
        
        $stmt = $conn->prepare($sql);

        
        $stmt->bind_param("s", $email);

        
        $stmt->execute();

       
        $result = $stmt->get_result();

        
        if ($result->num_rows == 1) {
            
            $row = $result->fetch_assoc();

            
            if (password_verify($senha, $row['senha'])) {
               
                $_SESSION['usuario_id'] = $row['id'];
                
                
                header("Location: main.php");
                exit();
            } else {
                
                header("Location: falha_login.php");
                exit();
            }
        } else {
           
            header("Location: falha_login.php");
            exit();
        }

        
        $stmt->close();
    }
}


header("Location: pagina_login.php");
exit();

// Fecha a conexão
$conn->close();
?>
