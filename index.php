<?php
?>

<!doctype html>
<html lang="en">
<head>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <meta charset="UTF-8">
    <title>KeyMaster</title>
    <link rel="stylesheet" href="style.css">
    <!-- Parisienne -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- knapper til start og stop af spillet -->
     <button onclick="startGame()">Start</button>
     <button onclick="stopGame()">Stop</button>
    <!-- score implementeres herunder -->
    <div class = "score">
        <h2>Score:&nbsp;<span id="score">0</span></h2>
    </div>
    <h1>Level:</h1>
    <h2>"QWERTY"</h2>

    <!-- se "keycode.info" 
     event.which (use .key or .code) 
    q= 81
    w= 87
    e= 69
    r= 82
    t= 84
    y= 89
    -->

    <!-- venstre side af skærmen (tasterne)
    "Data-"(attribut) + "key"(custom attribut navn) -->
    <div class="container">
        <div class="keys">
            <div data-key="81" class="key">
                <kbd>Q</kbd>
                <span class="sound">Name</span>
            </div>
            <div data-key="87" class="key">
                <kbd>W</kbd>
                <span class="sound">Name</span>
            </div>
            <div data-key="69" class="key">
                <kbd>E</kbd>
                <span class="sound">Name</span>
            </div>
            <div data-key="82" class="key">
                <kbd>R</kbd>
                <span class="sound">Name</span>
            </div>
            <div data-key="84" class="key">
                <kbd>T</kbd>
                <span class="sound">Name</span>
            </div>
            <div data-key="89" class="key">
                <kbd>Y</kbd>
                <span class="sound">Name</span>
            </div>
        </div>
        <div class="playing-area">
            <div class="playing-column1">
                <p>Tryk på tasterne som vises her </p>
                <div class="appearing-keys">
                    <!-- forsøger at oprette animerede klodser her -->
                </div>
            </div>
        </div>
    </div>

    
    <!-- lydene til tasterne  -->
    <audio data-key="81" src="lvl1-sounds/q.wav" preload="auto" ></audio>
    <audio data-key="87" src="lvl1-sounds/w.wav" preload="auto"></audio>
    <audio data-key="69" src="lvl1-sounds/e.wav" preload="auto"></audio>
    <audio data-key="82" src="lvl1-sounds/r.wav" preload="auto"></audio>
    <audio data-key="84" src="lvl1-sounds/t.wav" preload="auto"></audio>
    <audio data-key="89" src="lvl1-sounds/y.wav" preload="auto"></audio>

    <script>
        function removeTransition(e) {
            if (e.propertyName !== 'transform') return;
            e.target.classList.remove('playing');
        }

        function playSound(e) {
            const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
            const key = document.querySelector(`div[data-key="${e.keyCode}"]`);
            if (!audio) return;

            key.classList.add('playing');
            audio.currentTime = 0;
            audio.play();
        }

        const keys = Array.from(document.querySelectorAll('.key'));
        keys.forEach(key => key.addEventListener('transitionend', removeTransition));
        window.addEventListener('keydown', playSound);
    </script>

        <!-- Forsøg på at implementere "appearingKeys" og pointsystem -->
    <script>
        const keys = ['Q', 'W', 'E', 'R', 'T', 'Y'];
        const appearingKeysContainer = document.querySelector('.appearing-keys');
        let score = 0;

        function createRandomKey() {
            const randomKey = keys[Math.floor(Math.random() * keys.length)];
            const keyElement = document.createElement('div');
            keyElement.classList.add('animated-key');
            keyElement.textContent = randomKey;
            keyElement.style.left = `${Math.random() * 80}%`;
            appearingKeysContainer.appendChild(keyElement);
            keyElement.addEventListener('animationend', () => {
                keyElement.remove();
            });
            return randomKey;
        }

        let gameInterval;

        function startGame() {
            gameInterval = setInterval(() => {
                const randomKey = createRandomKey();
                animateKey(randomKey);
            }, 2000);
        }

        function stopGame() {
            clearInterval(gameInterval);
        }

        function animateKey(key) {
            const keyElement = document.querySelector(`appearing-keys .animated-key`);
            if (keyElement && keyElement.textContent === key) {
                keyElement.style.animation = 'moveDown 2s linear forwards';
            }
        }

        function checkKeyPress(e) {
            const pressedKey = String.fromCharCode(e.keyCode);
            const currentKeyElement = document.querySelector('.appearing-keys .animated-key');

            if (currentKeyElement && currentKeyElement.textContent === pressedKey) {
                score++;
                document.getElementById('score').textContent = score;
                currentKeyElement.remove();
            }

        }

        window.addEventListener('keydown', checkKeyPress);
        startGame();

    </script>


</body>

</html>