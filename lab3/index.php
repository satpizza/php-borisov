<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ULTRA TSAR 67</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Ruslan+Display&display=swap');

        :root {
            --gold: #FFD700;
            --neon-red: #ff003c;
            --neon-blue: #00f3ff;
            --void: #050505;
        }

        body {
            margin: 0;
            background: var(--void);
            color: white;
            font-family: 'Ruslan Display', cursive;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* --- КРУТАЯ АНИМАЦИЯ ПРИ ЗАГРУЗКЕ 67 (OVERLAY) --- */
        #boom-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: black;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .hidden {
            opacity: 0 !important;
            pointer-events: none;
        }

        .nuke-gif {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
            position: absolute;
        }

        .warning-text {
            position: relative;
            z-index: 10000;
            font-family: 'Black Ops One', cursive;
            font-size: 5rem;
            color: var(--neon-red);
            text-shadow: 0 0 20px var(--neon-red);
            animation: glitch 0.2s infinite;
        }

        /* --- ОСНОВНОЙ ИНТЕРФЕЙС --- */
        .container {
            position: relative;
            z-index: 10;
            background: rgba(10, 10, 10, 0.9);
            border: 4px solid var(--gold);
            padding: 40px;
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.3);
            text-align: center;
            max-width: 700px;
            transform: perspective(1000px) rotateX(0deg);
            transition: transform 0.2s;
        }

        .container::after {
            content: '';
            position: absolute; top: -10px; left: -10px; right: -10px; bottom: -10px;
            border: 2px dashed var(--neon-blue);
            z-index: -1;
            animation: spin-border 10s linear infinite;
        }

        @keyframes spin-border { 100% { transform: rotate(360deg); } }

        h1 {
            font-size: 3.5rem;
            color: var(--gold);
            margin: 0 0 20px;
            text-transform: uppercase;
            text-shadow: 4px 4px 0 var(--neon-red);
        }

        /* ПОДСКАЗКИ */
        .examples {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            font-family: 'Black Ops One', monospace;
            color: #666;
        }
        .tag {
            background: #222;
            padding: 5px 10px;
            border: 1px solid #444;
            cursor: pointer;
            transition: 0.3s;
        }
        .tag:hover { color: var(--gold); border-color: var(--gold); }

        /* ВВОД */
        input {
            background: transparent;
            border: none;
            border-bottom: 4px solid var(--gold);
            color: white;
            font-size: 2.5rem;
            text-align: center;
            width: 100%;
            font-family: 'Ruslan Display', serif;
            outline: none;
            margin-bottom: 20px;
        }
        
        button {
            background: var(--neon-red);
            color: white;
            font-family: 'Black Ops One', cursive;
            font-size: 1.5rem;
            padding: 15px 50px;
            border: none;
            cursor: pointer;
            clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%);
            transition: 0.2s;
            text-transform: uppercase;
        }

        button:hover {
            background: var(--gold);
            color: black;
            box-shadow: 0 0 40px var(--gold);
            transform: scale(1.1);
        }

        /* РЕЗУЛЬТАТ */
        .result-panel {
            margin-top: 30px;
            padding: 20px;
            border: 2px solid var(--neon-blue);
            background: rgba(0, 243, 255, 0.1);
            animation: slideUp 0.5s ease-out;
        }

        .tsar-name {
            font-size: 2.2rem;
            color: var(--gold);
            text-shadow: 0 0 10px var(--gold);
            display: block;
            margin-top: 10px;
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-5px, 5px); }
            40% { transform: translate(-5px, -5px); }
            60% { transform: translate(5px, 5px); }
            80% { transform: translate(5px, -5px); }
            100% { transform: translate(0); }
        }

        canvas { position: fixed; top:0; left:0; z-index: -1; opacity: 0.3; }
    </style>
</head>
<body>

<?php
    // --- БАЗА ДАННЫХ ЦАРЕЙ ---
    $XVI   = "ИВАН ВАСИЛЬЕВИЧ";
    $XVIII = "ПЁТР АЛЕКСЕЕВИЧ";
    $XIX   = "НИКОЛАЙ ПАВЛОВИЧ";
    $LXVII = "🔥 ЕГОР ВЕЛИКИЙ (67) 🔥"; // Переменная для 67

    // --- ОБРАБОТКА ---
    $input = $_GET['love_mom_Egora'] ?? '';
    
    // 1. Убираем пробелы, делаем капсом
    $clean_val = strtoupper(trim($input));

    // 2. Если ввели цифрами "67", превращаем это в римские "LXVII" для логики
    if ($clean_val === '67') {
        $clean_val = 'LXVII';
    }

    // 3. Проверка на БУМ-режим (если ввели 67 или LXVII)
    $is_boom = ($clean_val === 'LXVII');
?>

    <?php if ($is_boom): ?>
    <div id="boom-overlay">
        <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExMGUwZjM4ZGZkN2NlZGU2NTk5M2YwOWRlYThjYThjNjY5ZDMxZDM4MjM3ZjlmZmRkZDE5NjNmZDUmZXA9djFfaW50ZXJuYWxfZ2lmL2dpZl9zZWFyY2hCZWN0PXZfMSZjdD1n/oe33xf3B50fsc/giphy.gif" class="nuke-gif">
        <div class="warning-text">ACCESS GRANTED...</div>
    </div>
    <?php endif; ?>

    <canvas id="matrix"></canvas>

    <div class="container" id="box">
        <h1>СИСТЕМА ЦАРЕЙ</h1>
        
        <div class="examples">
            <span class="tag" onclick="setInput('XVI')">XVI</span>
            <span class="tag" onclick="setInput('XVIII')">XVIII</span>
            <span class="tag" onclick="setInput('XIX')">XIX</span>
            <span class="tag" style="color:red; border-color:red;" onclick="setInput('67')">67</span>
        </div>

        <form action="" method="get">
            <input type="text" id="mainInput" name="love_mom_Egora" placeholder="ВВЕДИ КОД..." value="<?= htmlspecialchars($input) ?>" autocomplete="off">
            <button type="submit">ПУСЬ</button>
        </form>

        <?php if ($input !== ''): ?>
            <div class="result-panel" id="resultBlock" style="<?= $is_boom ? 'display:none;' : '' ?>">
                <?php if (isset($$clean_val)): ?>
                    ВЕК: <?= $clean_val ?><br>
                    <span class="tsar-name"><?= $$clean_val ?></span>
                <?php else: ?>
                    <span style="color: var(--neon-red)">ОШИБКА! ТАКОГО ВЕКА НЕТ В АРХИВЕ.</span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // 1. ЛОГИКА АНИМАЦИИ ВЗРЫВА
        const isBoom = <?= $is_boom ? 'true' : 'false' ?>;
        const overlay = document.getElementById('boom-overlay');
        const resultBlock = document.getElementById('resultBlock');

        if (isBoom) {
            // Ждем 3.5 секунды, пока идет взрыв
            setTimeout(() => {
                // Убираем оверлей
                overlay.classList.add('hidden');
                // Показываем результат
                if(resultBlock) {
                    resultBlock.style.display = 'block';
                    // Добавляем звук или тряску экрану
                    document.body.style.animation = "glitch 0.2s 5"; 
                }
            }, 3500); 
        }

        // 2. ФОНОВЫЙ МАТРИЧНЫЙ ЭФФЕКТ
        const canvas = document.getElementById('matrix');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        const chars = "XVI XVIII XIX 67 👑";
        const drops = Array(Math.floor(canvas.width / 20)).fill(1);

        function draw() {
            ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = isBoom ? "#ff003c" : "#00f3ff"; // Красный при взрыве, синий обычно
            ctx.font = "15px monospace";
            
            for (let i = 0; i < drops.length; i++) {
                const text = chars.split(" ")[Math.floor(Math.random() * 5)];
                ctx.fillText(text, i * 20, drops[i] * 20);
                if (drops[i] * 20 > canvas.height && Math.random() > 0.975) drops[i] = 0;
                drops[i]++;
            }
        }
        setInterval(draw, 50);

        // 3. ХЕЛПЕР ДЛЯ КЛИКА ПО ТЕГАМ
        function setInput(val) {
            document.getElementById('mainInput').value = val;
        }

        // 4. 3D ТИЛТ (Движение за мышкой)
        document.addEventListener('mousemove', (e) => {
            const box = document.getElementById('box');
            let xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            let yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            box.style.transform = `perspective(1000px) rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });
    </script>
</body>
</html>