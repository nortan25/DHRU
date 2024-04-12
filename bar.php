<?php

session_start();


if (isset($_SESSION['usuario_id'])) {
    
    header("Location: bar2.php");
    exit();
}

require_once "db/conexao.php";
require_once "cssbar.php";


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
    <title>Meu Site</title>
    <style>
    </style>
</head>
<body>
<div class="carousel">
    <div class="carousel-track">
        <img src="image1.png" alt="Imagem 1">
        <img src="image1.png" alt="Imagem 2">
        <img src="image1.png" alt="Imagem 3">
        
    </div>
</div>
<body>
<header>

<div class="dropdown">
    <button class="dropdown-btn"><?php echo $textoBotao1; ?></button>
    <div class="dropdown-content">
        <button>IMEI Services</button>
        <button>Server Services</button>
        <button>Remote Services</button>
    </div>

    
    <button class="additional-btn"><?php echo $textoBotao2; ?></button>
    <button class="additional-btn"><?php echo $textoBotao3; ?></button>
</div>


    <div class="buttons">
        <a href="login\login.php"><button>Login</button></a>
        <a href="login\registrar.php"><button>Registrar</button></a>
    </div>

</header>

<script>
    const carouselTrack = document.querySelector('.carousel-track');
    const images = document.querySelectorAll('.carousel-track img');
    let counter = 0;
    const intervalTime = 3000; 

    function moveCarousel() {
        const slideWidth = images[0].clientWidth;
        carouselTrack.style.transform = `translateX(-${slideWidth * counter}px)`;
        counter = (counter + 1) % images.length; 
    }

    setInterval(moveCarousel, intervalTime); 
</script>

</body>
</html>
