<?php
    $token = '11|RsmzCDzmZ8yRFXov1cznFZtDINrWUJwbcZkVU10o173dd83b';
    $url = 'https://highscores.martindilling.com/api/v1/games';
    $headers = [
        'Accept: application/json',
        'Content-type: application/json',
        'Authorization: Bearer ' . $token,
    ];
    $payload = [
        'title' => 'ChooseYourPoints',
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
    ]);
    $responseData = curl_exec($curl);

    // c/p -> Check if the response code indicates an error.
    // 4xx and 5xx are client errors and server errors.
    $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($responseCode >= 400) {
        echo 'HTTP Error: ' . $responseCode;
    }
    curl_close($curl);

    $responseJson = json_decode($responseData);

    echo '<pre>';
    echo json_encode($responseJson, JSON_PRETTY_PRINT);
    echo '</pre>';

?>
