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
        
        <div class="code-block">
            <div class="code-label">Исходная строка</div>
            <div class="code-content">$str = '<span class="highlight">aAXa aeffa aGha aza ax23a a3sSa</span>';</div>
        </div>

        <div class="code-block">
            <div class="code-label">Паттерн поиска</div>
            <div class="code-content">$patern = '<span class="highlight">/a[a-zA-Z0-9]+a/</span>';</div>
            <span class="pattern-badge">Поиск слов между буквами 'a'</span>
        </div>

        <div class="result-block">
            <div class="result-title">Результат preg_replace:</div>
            <div class="result-content">
                <?php
                $str = 'aAXa aeffa aGha aza ax23a a3sSa';
                $patern = "/a[a-zA-Z0-9]+a/";
                $result = preg_replace($patern, "!", $str);
                echo $result;
                ?>
            </div>
        </div>

        <div class="info-text">
            <strong>Как работает паттерн:</strong> 
            Находит все подстроки, которые начинаются и заканчиваются на 'a', 
            а между ними содержат буквы (a-z, A-Z) или цифры (0-9)
            <br>
            <span style="color: #e83e8c; margin-top: 10px; display: block;">
                Найденные совпадения заменяются на "!"
            </span>
        </div>
    </div>
</body>
</html>