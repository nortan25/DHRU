<?php

require_once "db\conexao.php";


$sql_delete = "DELETE FROM personalizacao";
$conn->query($sql_delete);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $cor_fundo = $_POST['cor_fundo'];
    $cor_botoes = $_POST['cor_botoes'];
    $cor_texto = $_POST['cor_texto'];
    $cor_barra_nav = $_POST['cor_barra_nav'];
    $cor_botoes_hover = $_POST['cor_botoes_hover'];
    $cor_gaveta_hover = $_POST['cor_gaveta_hover'];
    $cor_titulo_principal = $_POST['cor_titulo_principal'];
    $cor_subtitulo = $_POST['cor_subtitulo'];
    $cor_container_mensagem = $_POST['cor_container_mensagem'];
    $cor_fundo_2 = $_POST['cor_fundo_2'];

    
    $sql_insert = "INSERT INTO personalizacao (cor_fundo, cor_botoes, cor_texto, cor_barra_nav, cor_botoes_hover, cor_gaveta_hover, cor_titulo_principal, cor_subtitulo, cor_container_mensagem, cor_fundo_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
  
    $stmt = $conn->prepare($sql_insert);

   
    if ($stmt) {
        
        $stmt->bind_param("ssssssssss", $cor_fundo, $cor_botoes, $cor_texto, $cor_barra_nav, $cor_botoes_hover, $cor_gaveta_hover, $cor_titulo_principal, $cor_subtitulo, $cor_container_mensagem, $cor_fundo_2);
        
        
        if ($stmt->execute()) {
            
            header("Location: formper.php");
            exit();
        } else {
            
            echo "Erro ao salvar as configurações de personalização.";
        }

        
        $stmt->close();
    } else {
        
        echo "Erro ao preparar a consulta SQL.";
    }
} else {
    
    echo "O formulário não foi submetido corretamente.";
}


$conn->close();
?>
