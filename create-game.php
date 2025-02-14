<?php
    require_once __DIR__ . '/api.php';

    $url = 'https://highscores.martindilling.com/api/v1/games';
    $payload = [
        'title' => 'ChooseYourPoints'
    ];
    $responseJson = apiPost($url, $payload);

    echo '<pre>';
    echo json_encode($responseJson, JSON_PRETTY_PRINT);
    echo '</pre>';