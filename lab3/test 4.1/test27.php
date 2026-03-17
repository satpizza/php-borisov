<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Regex · Google Material</title>
    <!-- Material Icons & Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?= filemtime('style.css') ?>">
</head>
<body>
    <div class="container">
        <h1 class="google-logo">
            <span style="color:#4285F4;">G</span>
            <span style="color:#EA4335;">o</span>
            <span style="color:#FBBC05;">o</span>
            <span style="color:#4285F4;">g</span>
            <span style="color:#34A853;">l</span>
            <span style="color:#EA4335;">e</span>
            <span style="margin-left:12px; font-weight:400;">RegEx</span>
        </h1>

        <?php
            $str = 'aaab aaaw aaww';
            $pattern = '/aaa(?=b)/';
        ?>
        
        <div class="code-card">
            <div class="card-label">
                <span class="material-icons">code</span>
                <span>Исходная строка</span>
            </div>
            <div class="code-content"><span class="keyword">str</span> = '<span class="string"><?= $str ?></span>';</div>
        </div>

        <div class="code-card">
            <div class="card-label">
                <span class="material-icons">search</span>
                <span>Паттерн поиска</span>
            </div>
            <div class="code-content"><span class="keyword">pattern</span> = '<span class="regexp"><?= $pattern ?></span>';</div>
            <div class="chip">Backreference</div>
        </div>

        <div class="result-card">
            <div class="card-label">
                <span class="material-icons">swap_horiz</span>
                <span>Результат <span class="function">preg_replace</span></span>
            </div>
            <div class="result-content">
                <?php
                    $result = preg_replace($pattern, "!", $str);
                    echo '<span class="result-badge">' . $result . '</span>';
                ?>
            </div>
        </div>

        <div class="info-bar">
            <span class="material-icons">info</span>
            <span>Замена повторяющихся символов (захваченных группировкой) на <span class="highlight-chip">!</span></span>
        </div>
    </div>
</body>
</html>