<?php

require_once "db\conexao.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $textoBotao1 = $_POST['texto_botao_1'];
    $textoBotao2 = $_POST['texto_botao_2'];
    $textoBotao3 = $_POST['texto_botao_3'];

    
    if (!empty($textoBotao1) && !empty($textoBotao2) && !empty($textoBotao3)) {
        
        $sql = "UPDATE textos SET conteudo = ? WHERE titulo = ?";
        $stmt = $conn->prepare($sql);

        
        $tituloBotao1 = 'botao_1';
        $stmt->bind_param("ss", $textoBotao1, $tituloBotao1);
        $stmt->execute();

        
        $tituloBotao2 = 'botao_2';
        $stmt->bind_param("ss", $textoBotao2, $tituloBotao2);
        $stmt->execute();

        
        $tituloBotao3 = 'botao_3';
        $stmt->bind_param("ss", $textoBotao3, $tituloBotao3);
        $stmt->execute();

        
        if ($stmt->affected_rows > 0) {
            echo "<p>Textos atualizados com sucesso!</p>";
        } else {
            echo "<p>Erro ao atualizar os textos.</p>";
            echo "<p>Erro: " . $stmt->error . "</p>"; 
        }
        $stmt->close();
    } else {
        echo "<p>Por favor, preencha todos os campos do formulário.</p>";
    }
}


$sql = "SELECT titulo, conteudo FROM textos WHERE titulo IN (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $tituloBotao1, $tituloBotao2, $tituloBotao3);
$tituloBotao1 = 'botao_1';
$tituloBotao2 = 'botao_2';
$tituloBotao3 = 'botao_3';
$stmt->execute();
$result = $stmt->get_result();


$textoBotao1 = $textoBotao2 = $textoBotao3 = "";


while ($row = $result->fetch_assoc()) {
    switch ($row['titulo']) {
        case 'botao_1':
            $textoBotao1 = $row['conteudo'];
            break;
        case 'botao_2':
            $textoBotao2 = $row['conteudo'];
            break;
        case 'botao_3':
            $textoBotao3 = $row['conteudo'];
            break;
    }
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Textos</title>
</head>
<body>
    <h2>Editar Textos</h2>
    <form action="editar_textos.php" method="post">
        <label for="texto_botao_1">Texto do Botão 1:</label>
        <input type="text" id="texto_botao_1" name="texto_botao_1" value="<?php echo $textoBotao1; ?>"><br><br>
        
        <label for="texto_botao_2">Texto do Botão 2:</label>
        <input type="text" id="texto_botao_2" name="texto_botao_2" value="<?php echo $textoBotao2; ?>"><br><br>
        
        <label for="texto_botao_3">Texto do Botão 3:</label>
        <input type="text" id="texto_botao_3" name="texto_botao_3" value="<?php echo $textoBotao3; ?>"><br><br>
        
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
