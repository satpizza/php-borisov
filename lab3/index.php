<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windows 2000 Professional</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="desktop">
        <div class="shortcut" style="top: 20px;">
            <img src="https://win98icons.alexmeub.com/icons/png/computer_explorer-4.png" alt="">
            <span>Мой компьютер</span>
        </div>
        <div class="shortcut" style="top: 100px;">
            <img src="https://win98icons.alexmeub.com/icons/png/recycle_bin_empty-4.png" alt="">
            <span>Корзина</span>
        </div>

        <div class="window">
            <div class="title-bar">
                <div class="title-bar-text">Калькулятор от рукажепа</div>
                <div class="title-bar-controls">
                    <button>_</button>
                    <button>□</button>
                    <button class="close">×</button>
                </div>
            </div>
            <div class="window-body">
                <form action="" method="get">
                    <label for="prime">МАМА ЕГОРА</label>
                    <input type="text" name="prime" id="prime" placeholder="DOTA СИЛА" readonly>
                    
                    <div class="calc-container">
                        <div class="calc-row">
                            <button type="button" class="btn-calc btn-red" onclick="document.getElementById('prime').value = ''">C</button>
                            <button type="button" class="btn-calc btn-red" onclick="var v = document.getElementById('prime').value; document.getElementById('prime').value = v.substring(0, v.length - 1)">CE</button>
                        </div>
                        <div class="calc-grid">
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '7'">7</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '8'">8</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '9'">9</button>
                            <button type="button" class="btn-calc btn-op" onclick="document.getElementById('prime').value += ' / '">/</button>

                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '4'">4</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '5'">5</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '6'">6</button>
                            <button type="button" class="btn-calc btn-op" onclick="document.getElementById('prime').value += ' * '">*</button>

                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '1'">1</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '2'">2</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '3'">3</button>
                            <button type="button" class="btn-calc btn-op" onclick="document.getElementById('prime').value += ' - '">-</button>

                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '0'">0</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '.'">.</button>
                            <button type="submit" class="btn-calc btn-op">=</button>
                            <button type="button" class="btn-calc btn-op" onclick="document.getElementById('prime').value += ' + '">+</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += '('">(</button>
                            <button type="button" class="btn-calc" onclick="document.getElementById('prime').value += ')'">)</button>

                           



                        </div>
                    </div>
                </form>

                <div class="status-panel">
                    <?php
                    if (isset($_GET['prime']) && !empty($_GET['prime'])){
                        $edgar = htmlspecialchars($_GET['prime']);
                        
                        eval ("\$result=$edgar;");
                        echo "Log: <b>$result</b>";
                    } else {
                        echo "DOTA СИЛА";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="taskbar">
            <button class="start-button">
                <img src="https://win98icons.alexmeub.com/icons/png/windows-0.png" width="16">
                <b>Пуск</b>
            </button>
            <div class="taskbar-divider"></div>
            <div class="active-app">
                <img src="https://win98icons.alexmeub.com/icons/png/computer_explorer-4.png" width="16">
                Калькулятор...
            </div>
            <div class="system-tray">
                <img src="https://win98icons.alexmeub.com/icons/png/loudspeaker_rays-0.png" width="14">
                <span id="clock">12:00</span>
            </div>
        </div>
    </div>
</body>
</html>