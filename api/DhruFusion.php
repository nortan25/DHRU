<?php

class DhruFusion
{
    private $DHRUFUSION_URL;
    private $USERNAME;
    private $API_ACCESS_KEY;

    public function __construct($DHRUFUSION_URL, $USERNAME, $API_ACCESS_KEY)
    {
        $this->DHRUFUSION_URL = $DHRUFUSION_URL;
        $this->USERNAME = $USERNAME;
        $this->API_ACCESS_KEY = $API_ACCESS_KEY;
    }

    public function callAPI($action, $parameters = [])
    {
        $request = [
            'username' => $this->USERNAME,
            'apiaccesskey' => $this->API_ACCESS_KEY,
            'action' => $action,
            'requestformat' => 'JSON',
            'parameters' => json_encode($parameters)
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->DHRUFUSION_URL . '/api/index.php');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);

        if (curl_errno($curl) != CURLE_OK) {
            $error = curl_error($curl);
            curl_close($curl);
            return ['error' => $error];
        }

        curl_close($curl);

        return json_decode($response, true);
    }
}

?>
