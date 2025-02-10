<?php
    $token = '11|RsmzCDzmZ8yRFXov1cznFZtDINrWUJwbcZkVU10o173dd83b';
    $url = 'https://highscores.martindilling.com/api/v1/games';
    $headers = [
        'Accept: application/json',
        'Content-type: application/json',
        'Authorization: Bearer ' . $token,
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
    ]);
    $responseData = curl_exec($curl);
    curl_close($curl);

    $responseJson = json_decode($responseData);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highscore Prototype</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        button { font-size: 20px; padding: 10px; margin: 10px; }
        input { font-size: 18px; padding: 5px; }
    </style>
</head>
<body>

    <!-- Kode c/p fra nettet, jeg studerer og lærer af -->
    <h1>Highscore Prototype</h1>
    
    <input type="text" id="nameInput" placeholder="Indtast navn">
    <h2>Score: <span id="score">0</span></h2>
    <button onclick="increaseScore()">+1 Point</button>
    <button onclick="decreaseScore()">-1 Point</button>
    <button onclick="sendScore()">Send Score</button>

    <script>
        let score = 0;

        function increaseScore() {
            score++;
            document.getElementById("score").textContent = score;
        }

        function decreaseScore() {
            score--;
            document.getElementById("score").textContent = score;
        }

        function sendScore() {
            const name = document.getElementById("nameInput").value.trim();
            if (!name) {
                alert("Indtast et navn før du sender!");
                return;
            }

            const data = { name, score };

            // Simulerer at sende til en highscore API
            console.log("Sender til API:", JSON.stringify(data));

            // Her ville du normalt sende det til en server med fetch():
            // fetch("https://din-highscore-api.com/scores", {
            //     method: "POST",
            //     headers: { "Content-Type": "application/json" },
            //     body: JSON.stringify(data)
            // });

            alert("Score sendt!");
        }
    </script>

</body>
</html>
