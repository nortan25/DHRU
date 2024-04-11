<?php

if (file_exists('connection_data.txt')) {
    
    $connectionData = file_get_contents('connection_data.txt');
    $connectionInfo = json_decode($connectionData, true);

   
    $DHRUFUSION_URL = $connectionInfo['DHRUFUSION_URL'];
    $USERNAME = $connectionInfo['USERNAME'];
    $API_ACCESS_KEY = $connectionInfo['API_ACCESS_KEY'];

    
    $response = callAPI($DHRUFUSION_URL, $USERNAME, $API_ACCESS_KEY, 'imeiservicelist');

    
    if (isset($response['SUCCESS'])) {
        
        echo json_encode($response);
    } else {
        
        echo json_encode(array('error' => 'Erro ao obter serviços de IMEI da API.'));
    }
} else {
    
    echo json_encode(array('error' => 'Arquivo de conexão não encontrado.'));
}


function callAPI($url, $username, $apiAccessKey, $action) {
    
    $postData = array(
        'username' => $username,
        'apiaccesskey' => $apiAccessKey,
        'action' => $action
    );

    
    $ch = curl_init();

    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    
    $response = curl_exec($ch);

    
    if ($response === false) {
        
        return array('error' => 'Erro na solicitação cURL: ' . curl_error($ch));
    } else {
        
        $responseData = json_decode($response, true);

        
        if (isset($responseData['error'])) {
            
            return $responseData;
        } else {
            
            return $responseData;
        }
    }

    
    curl_close($ch);
}
?>
