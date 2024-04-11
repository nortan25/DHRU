<?php

session_start();


    
    require_once "db\conexao.php";
    require_once "barsuper.php";
    


$sql_personalizacao = "SELECT * FROM personalizacao";
$result_personalizacao = $conn->query($sql_personalizacao);


$cor_fundo = $cor_botoes = $cor_botoes_hover = $cor_gaveta_hover = $cor_texto = $cor_barra_nav = $cor_barra_status = $cor_item_main = $cor_titulo_principal = $cor_subtitulo = $cor_container_mensagem = $cor_fundo_2 = "";


if ($result_personalizacao->num_rows > 0) {
    
    $configuracao = $result_personalizacao->fetch_assoc();
    $cor_fundo = $configuracao['cor_fundo'];
    $cor_botoes = $configuracao['cor_botoes'];
    $cor_botoes_hover = $configuracao['cor_botoes_hover'];
    $cor_gaveta_hover = $configuracao['cor_gaveta_hover'];
    $cor_texto = $configuracao['cor_texto'];
    $cor_barra_nav = $configuracao['cor_barra_nav'];
    $cor_barra_status = $configuracao['cor_barra_status'];
    $cor_item_main = $configuracao['cor_item_main'];
    $cor_titulo_principal = $configuracao['cor_titulo_principal'];
    $cor_subtitulo = $configuracao['cor_subtitulo'];
    $cor_container_mensagem = $configuracao['cor_container_mensagem'];
    $cor_fundo_2 = $configuracao['cor_fundo_2'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Personalização</title>
    <?php require_once "cssbar.php"; ?>
</head>
<body>
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>
    <h2>Personalização de Estilo</h2>
    <form action="processar_personalizacao.php" method="post">
        <label for="cor_fundo">Cor de Fundo:</label>
        <input type="color" id="cor_fundo" name="cor_fundo" value="<?= $cor_fundo ?>"><br><br>

        <label for="cor_botoes">Cor dos Botões:</label>
        <input type="color" id="cor_botoes" name="cor_botoes" value="<?= $cor_botoes ?>"><br><br>

        <label for="cor_botoes_hover">Cor dos Botões (Hover):</label>
        <input type="color" id="cor_botoes_hover" name="cor_botoes_hover" value="<?= $cor_botoes_hover ?>"><br><br>

        <label for="cor_gaveta_hover">Cor da Gaveta (Hover):</label>
        <input type="color" id="cor_gaveta_hover" name="cor_gaveta_hover" value="<?= $cor_gaveta_hover ?>"><br><br>

        <label for="cor_texto">Cor do Texto:</label>
        <input type="color" id="cor_texto" name="cor_texto" value="<?= $cor_texto ?>"><br><br>

        <label for="cor_barra_nav">Cor da Barra de Navegação:</label>
        <input type="color" id="cor_barra_nav" name="cor_barra_nav" value="<?= $cor_barra_nav ?>"><br><br>

        <label for="cor_barra_status">Cor da Barra de Status:</label>
        <input type="color" id="cor_barra_status" name="cor_barra_status" value="<?= $cor_barra_status ?>"><br><br>

        <label for="cor_item_main">Cor dos Itens da Página Principal:</label>
        <input type="color" id="cor_item_main" name="cor_item_main" value="<?= $cor_item_main ?>"><br><br>

        <label for="cor_titulo_principal">Cor do Título Principal:</label>
        <input type="color" id="cor_titulo_principal" name="cor_titulo_principal" value="<?= $cor_titulo_principal ?>"><br><br>

        <label for="cor_subtitulo">Cor do Subtítulo:</label>
        <input type="color" id="cor_subtitulo" name="cor_subtitulo" value="<?= $cor_subtitulo ?>"><br><br>

        <label for="cor_container_mensagem">Cor do Contêiner da Mensagem:</label>
        <input type="color" id="cor_container_mensagem" name="cor_container_mensagem" value="<?= $cor_container_mensagem ?>"><br><br>

        <label for="cor_fundo_2">Cor de Fundo 2:</label>
        <input type="color" id="cor_fundo_2" name="cor_fundo_2" value="<?= $cor_fundo_2 ?>"><br><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
