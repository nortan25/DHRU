<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Serviços de IMEI</title>
    <style>
        .service-group {
            margin-bottom: 10px;
        }
        .service-select {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php

require_once('DhruFusion.php');


$api_url = "https://api-gsm.elbroos.com/";
$username = "mpirlo25@gmail.com";
$api_key = "5dbe39d22aead2feada7f887095aaadd";


$dhruFusion = new DhruFusion($api_url, $username, $api_key);


$action = "imeiservicelist";


$response = $dhruFusion->callAPI($action);


if (isset($response['error'])) {
    echo "Erro ao chamar a API: " . $response['error'];
} else {
   
    if (isset($response['SUCCESS'][0]['LIST'])) {
        $serviceList = $response['SUCCESS'][0]['LIST'];
        echo "<h2>Lista de Serviços de IMEI:</h2>";
        echo "<select class='service-select'>";
        foreach ($serviceList as $group) {
            echo "<optgroup label='" . $group['GROUPNAME'] . "'>";
            foreach ($group['SERVICES'] as $service) {
                echo "<option>" . $service['SERVICENAME'] . "</option>";
            }
            echo "</optgroup>";
        }
        echo "</select>";
    } else {
        echo "Erro ao obter a lista de serviços de IMEI";
    }
}
?>

</body>
</html>
