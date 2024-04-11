<?php


function createConnectionFile($DHRUFUSION_URL, $USERNAME, $API_ACCESS_KEY) {
    $connectionData = [
        'DHRUFUSION_URL' => $DHRUFUSION_URL,
        'USERNAME' => $USERNAME,
        'API_ACCESS_KEY' => $API_ACCESS_KEY
    ];

    
    $serializedData = serialize($connectionData);

    /
    $connectionFilePath = 'connection_data.txt';

    
    file_put_contents($connectionFilePath, $serializedData);

    return $connectionFilePath;
}


require_once('DhruFusion.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $DHRUFUSION_URL = $_POST['DHRUFUSION_URL'];
    $USERNAME = $_POST['USERNAME'];
    $API_ACCESS_KEY = $_POST['API_ACCESS_KEY'];

    
    $dhruFusion = new DhruFusion($DHRUFUSION_URL, $USERNAME, $API_ACCESS_KEY);

    
    $response = $dhruFusion->callAPI('accountinfo');

    
    if (isset($response['error'])) {
        echo "Erro ao se conectar à API: " . $response['error'];
    } else {
       
        echo "Conexão à API bem-sucedida!";

        
        $connectionFilePath = createConnectionFile($DHRUFUSION_URL, $USERNAME, $API_ACCESS_KEY);

        
        echo "<br>";
        echo "Arquivo de conexão permanente criado em: " . $connectionFilePath;
    }
}

?>
