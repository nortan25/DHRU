<?php

session_start();


if(isset($_SESSION['usuario_id'])) {
   
    require_once "db/conexao.php";

    
    $sql = "SELECT is_admin FROM usuarios WHERE id = ? AND is_admin = 1";
    
    
    $stmt = $conn->prepare($sql);
    
    
    $stmt->bind_param("i", $_SESSION['usuario_id']);
    
    
    $stmt->execute();
    
    
    $result = $stmt->get_result();
    
    
    if ($result->num_rows == 1) {
        
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Meu Site</title>
    <?php require_once "cssbar.php"; ?>
</head>
<body>
<div class="carousel">
    <div class="carousel-track">
        <img src="image1.png" alt="Imagem 1">
        <img src="image1.png" alt="Imagem 2">
        <img src="image1.png" alt="Imagem 3">
        
    </div>

    <header>
        <div class="logo">
            <img src="l.png" alt="Logo do Site">
        </div>

        <div class="buttons">
            <a href="login\logout.php"><button>sair</button></a>
            <a href="Super.php"><button>painel de controle</button></a>
            <a href="login\regadm.php"><button>add adm</button></a>
            <a href="per\editar_textos.php"><button>textos</button></a>
            <a href="creditos\usu.php"><button>creditos</button></a>
            <a href="per\formper.php"><button>api</button></a>
            <a href="per\formper.php"><button>temas</button></a>
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
<?php
       
    } else {
        
        header("Location: main.php");
        exit();
    }
} else {
    
    header("Location: main.php");
    exit();
}
?>
