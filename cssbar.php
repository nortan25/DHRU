<?php
require_once "db\conexao.php";


$sql = "SELECT * FROM personalizacao";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    $configuracao = $result->fetch_assoc();
    $cor_fundo = $configuracao['cor_fundo'];
    $cor_botoes = $configuracao['cor_botoes'];
    $cor_texto = $configuracao['cor_texto'];
    $cor_barra_nav = $configuracao['cor_barra_nav'];
    $cor_botoes_hover = $configuracao['cor_botoes_hover'];
    $cor_gaveta_hover = $configuracao['cor_gaveta_hover'];
    $cor_titulo_principal = $configuracao['cor_titulo_principal'];
    $cor_subtitulo = $configuracao['cor_subtitulo'];
    $cor_container_mensagem = $configuracao['cor_container_mensagem'];
    $cor_fundo_2 = $configuracao['cor_fundo_2'];
} else {
    
    $cor_fundo = '#ffffff';
    $cor_botoes = '#ff0000';
    $cor_texto = '#ffffff';
    $cor_barra_nav = '#000000';
    $cor_botoes_hover = '#ff9999';
    $cor_gaveta_hover = '#ddd';
    $cor_titulo_principal = '#333';
    $cor_subtitulo = '#666';
    $cor_container_mensagem = '#fff';
    $cor_fundo_2 = '#f0f0f0';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <style>
      
        header {
            background-color: <?php echo $cor_barra_nav; ?>;
            color: #fff;
            padding: 5px 0; 
            display: flex;
            justify-content: space-between; 
            align-items: center;
        }

        .logo img {
            max-width: 80px; 
        }

        .buttons {
            margin-left: 10px; 
        }

        .buttons3 {
            margin-right: 10px; 
        }

        .buttons button,
        .buttons2 button,
        .buttons3 button,
        .additional-btn {
            background-color: <?php echo $cor_botoes; ?>;
            color: <?php echo $cor_texto; ?>;
            border: none;
            padding: 5px 10px; 
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px; 
        }

        .buttons button:hover,
        .buttons2 button:hover,
        .buttons3 button:hover,
        .additional-btn:hover {
            background-color: <?php echo $cor_botoes_hover; ?>;
            color: <?php echo $cor_texto; ?>;
        }

        
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-btn {
            background-color: <?php echo $cor_botoes; ?>;
            color: <?php echo $cor_texto; ?>;
            border: none;
            padding: 5px 10px; 
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px; 
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: <?php echo $cor_gaveta_hover; ?>;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            margin-left: -5px; 
        }

        .dropdown-content button {
            display: block;
            width: 100%;
            padding: 5px 10px; 
            text-align: center;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .dropdown-content button:hover {
            background-color: <?php echo $cor_botoes_hover; ?>;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo $cor_fundo; ?>;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: <?php echo $cor_texto; ?>;
        }

        form {
            width: 300px;
            margin: 20px auto;
            background-color: <?php echo $cor_fundo; ?>;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: <?php echo $cor_texto; ?>;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px); 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid <?php echo $cor_botoes; ?>;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: calc(100% - 20px); 
            padding: 10px;
            background-color: <?php echo $cor_botoes; ?>;
            color: <?php echo $cor_texto; ?>;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: <?php echo $cor_botoes_hover; ?>;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        .success-message {
            color: green;
            margin-top: 5px;
        }

        
        .carousel {
            width: 100%; 
            overflow: hidden; 
        }

        .carousel-track {
            display: flex; 
            transition: transform 0.5s ease; 
        }

        .carousel-track img {
            width: 100%; 
            flex-shrink: 0; 
        }
        
        

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px; 
            margin: 50px auto;
            text-align: center;
            padding: 20px; 
        }

        h1 {
            color: <?php echo $cor_titulo_principal; ?>; 
        }

        h3 {
            color: <?php echo $cor_subtitulo; ?>; 
        }

        .message-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 30px;
        }

        .message {
            width: calc(33.33% - 20px); 
            margin-bottom: 20px;
            padding: 20px;
            background-color: <?php echo $cor_container_mensagem; ?>; 
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .social-icons {
            margin-top: 30px;
            text-align: center; 
        }

        .social-icons img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
        }

        body {
            background-color: <?php echo $cor_fundo_2; ?>; 
        }


        #services 
        body {
    font-family: Arial, sans-serif;
    background-color: <?php echo $cor_fundo; ?>;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 20px;
    color: <?php echo $cor_texto; ?>;
}

.filter-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.filter-container select,
.filter-container input {
    flex: 1;
    margin-right: 10px;
    background-color: <?php echo $cor_fundo_2; ?>;
    color: <?php echo $cor_texto; ?>;
    border: 1px solid <?php echo $cor_botoes; ?>;
    border-radius: 4px;
    padding: 5px;
}

.service-select {
    width: 100%;
    margin-bottom: 10px;
    background-color: <?php echo $cor_fundo_2; ?>;
    color: <?php echo $cor_texto; ?>;
    border: 1px solid <?php echo $cor_botoes; ?>;
    border-radius: 4px;
    padding: 5px;
}

.service-select optgroup {
    font-weight: bold;
}

.service-select option {
    padding: 5px;
}

.service-select option[data-price]:before {
    content: "Preço: R$ " attr(data-price);
    display: block;
    font-style: italic;
    margin-bottom: 5px;
    color: <?php echo $cor_texto; ?>;
}

    </style>
</head>
<body>
   
</body>
</html>
