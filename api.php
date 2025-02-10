<?php

function apiCall(string $method, string $url, ?array $payload = null): array
{
    $token = '11|RsmzCDzmZ8yRFXov1cznFZtDINrWUJwbcZkVU10o173dd83b';
    $url = 'https://highscores.martindilling.com/api/v1/games';
    $headers = [
        'Accept: application/json',
        'Content-type: application/json',
        'Authorization: Bearer ' . $token,
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
    ]);
    if ($payload) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload, JSON_THROW_ON_ERROR));
    }
    $responseData = curl_exec($curl);

    // c/p -> Check if the response code indicates an error.
    // 4xx and 5xx are client errors and server errors.
    // Not a pretty way to handle errors, but will do for now.´
    $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($responseCode >= 400) {
        echo 'HTTP Error: ' . $responseCode;
        echo $responseData;
        curl_close($curl);
        exit;
    }

    curl_close($curl);

    return json_decode($responseData, true, 512, JSON_THROW_ON_ERROR);
}

function apiGet(string $url): array
{
    return apiCall('GET', $url);
}

function apiPost(string $url, array $payload): array
{
    return apiCall('POST', $url, $payload);
}

function apiDelete(string $url): array
{
    return apiCall('DELETE', $url);
}