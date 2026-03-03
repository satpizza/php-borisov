<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Regex Demo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PHP Regular Expression</h1>

        <?php
                $str = 'aa aba abba abbba abbbba abbbbba';
                $patern = "/ab{0,2}a/";
        ?>
        
        <div class="code-block">
            <div class="code-label">Исходная строка</div>
            <div class="code-content">str = '<span class="highlight"><?=$str?></span>';</div>
        </div>

        <div class="code-block">
            <div class="code-label">Паттерн поиска</div>
            <div class="code-content">pattern = '<span class="highlight"><?=$patern?></span>';</div>
            <span class="pattern-badge">Поиск слов</span>
        </div>

        <div class="result-block">
            <div class="result-title">Результат preg_replace:</div>
            <div class="result-content">
                <?php
                    $result = preg_replace($patern, "!", $str);
                    echo $result;
                ?>
            </div>
        </div>

        <div class="info-text">
            </span>
        </div>
    </div>
</body>
</html>