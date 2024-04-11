<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Comunicação com API</title>
</head>
<body>
<h2>Formulário para Comunicação com API</h2>

<form id="apiForm" action="process.php" method="post">
    <label for="DHRUFUSION_URL">URL da API:</label>
    <input type="text" id="DHRUFUSION_URL" name="DHRUFUSION_URL" required><br><br>
    
    <label for="USERNAME">Nome de usuário:</label>
    <input type="text" id="USERNAME" name="USERNAME" required><br><br>
    
    <label for="API_ACCESS_KEY">Chave da API:</label>
    <input type="text" id="API_ACCESS_KEY" name="API_ACCESS_KEY" required><br><br>
    
    <button type="submit">Enviar</button>
</form>

<div id="response"></div>

<script>
document.getElementById("apiForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process.php", true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById("response").innerHTML = xhr.responseText;
        }
    };
    xhr.send(formData);
});
</script>

</body>
</html>
