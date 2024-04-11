<?php
    require_once "barsuper.php";
    require_once "cssbar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administração</title>
</head>
<body>
    <h2>Pesquisar Usuário</h2>
    <form action="" method="post">
        <label for="email">Email do Usuário:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" name="pesquisar" value="Pesquisar">
    </form>

    <?php
   
    require_once "db\conexao.php";

    
    if (isset($_POST['pesquisar'])) {
        $email = $_POST['email'];

       
        $sql = "SELECT email, creditos FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            
            $row = $result->fetch_assoc();
            echo "<h2>Informações do Usuário</h2>";
            echo "<p>Email: " . $row['email'] . "</p>";
            echo "<p>Créditos: " . $row['creditos'] . "</p>";
            ?>

            <h2>Adicionar/Retirar Créditos</h2>
            <form action="editar_creditos.php" method="post">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" required>
                <label>
                    <input type="radio" name="operacao" value="adicionar" checked> Adicionar
                </label>
                <label>
                    <input type="radio" name="operacao" value="retirar"> Retirar
                </label>
                <input type="submit" value="Confirmar">
            </form>
            <?php
        } else {
            echo "<p>Nenhum usuário encontrado com o email informado.</p>";
        }
    }

    
    ?>

</body>
</html>
