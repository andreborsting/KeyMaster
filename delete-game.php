<?php
    
    require_once __DIR__ . '/api.php';

    $url = 'https://highscores.martindilling.com/api/v1/games/11';
    $response = apiDelete($url);

    echo '<pre>';
    echo json_encode($responseJson, JSON_PRETTY_PRINT);
    echo '</pre>';

?>