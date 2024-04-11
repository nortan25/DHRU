<?php

session_start();


if(isset($_SESSION['usuario_id'])) {
    
    require_once "db\conexao.php";
   

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $email = $_POST['email'];
        $valor = $_POST['valor'];
        $operacao = $_POST['operacao']; 

        
        if ($valor > 0) {
            
            $sql_select = "SELECT creditos FROM usuarios WHERE email = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param("s", $email);
            $stmt_select->execute();
            $result_select = $stmt_select->get_result();

            
            if ($result_select->num_rows == 1) {
                $row = $result_select->fetch_assoc();
                $creditos_atuais = $row['creditos'];

                
                if ($operacao == 'adicionar') {
                    $novo_valor = $creditos_atuais + $valor;
                } elseif ($operacao == 'retirar') {
                    $novo_valor = $creditos_atuais - $valor;
                }

                
                $sql_update = "UPDATE usuarios SET creditos = ? WHERE email = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("is", $novo_valor, $email);
                $stmt_update->execute();

                
                header("Location: usu.php");
                exit();
            } else {
                
                echo "Erro: Usuário não encontrado.";
            }
        } else {
            
            echo "Erro: O valor deve ser um número positivo.";
        }
    } else {
        
        header("Location: Super.php");
        exit();
    }
} else {
    
    header("Location: Super.php");
    exit();
}


$conn->close();
?>
