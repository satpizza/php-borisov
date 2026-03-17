<?php
$str = "2aaa'3'bbb'4'";
$pattern = "/'(\d)'/";

function square_2($matches) {
    $mul = $matches[1] * 2;
    return "'$mul'";
}

$result = preg_replace_callback($pattern, "square_2", $str);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>preg_replace_callback · Google Style</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <!-- Google Logo -->
            <div class="google-logo">
                <span class="g-blue">G</span>
                <span class="g-red">o</span>
                <span class="g-yellow">o</span>
                <span class="g-blue">g</span>
                <span class="g-green">l</span>
                <span class="g-red">e</span>
                <span class="material-icons">code</span>
                <span style="font-weight:400; margin-left:auto; font-size:1.5rem;">preg_replace_callback</span>
            </div>

            <!-- Исходная строка -->
            <div class="code-block">
                <div class="block-label">
                    <span class="material-icons">data_object</span>
                    <span>Исходная строка</span>
                    <span class="badge">input</span>
                </div>
                <div class="code-content">
                    <span class="keyword">$str</span> = '<span class="string"><?= $str ?></span>';
                </div>
            </div>

            <!-- Паттерн -->
            <div class="code-block">
                <div class="block-label">
                    <span class="material-icons">search</span>
                    <span>Регулярное выражение</span>
                    <span class="badge">pattern</span>
                </div>
                <div class="code-content">
                    <span class="keyword">$pattern</span> = '<span class="regexp"><?= $pattern ?></span>';
                </div>
            
            </div>

            <!-- Callback функция -->
            <div class="function-block">
                <div class="block-label">
                    <span class="material-icons">functions</span>
                    <span>Callback функция</span>
                    <span class="badge">square</span>
                </div>
                <div class="code-content small">
                    <span class="keyword">function</span> <span class="function-name">square</span>(<span class="keyword">$matches</span>) {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="function-name">pow</span>(<span class="keyword">$matches</span>[<span class="number">0</span>], <span class="number">2</span>);<br>
                    }
                </div>
            </div>

            <!-- Результат -->
            <div class="result-block">
                <div class="block-label">
                    <span class="material-icons">swap_horiz</span>
                    <span>Результат</span>
                    <span class="badge" style="background:#e6f4ea; color:#0d652d;">preg_replace_callback</span>
                </div>
                <div class="result-content">
                    <span class="result-badge"><?= $result ?></span>
                </div>
            </div>

            <!-- Информационная панель -->
            <div class="info-bar">
                <span class="material-icons">lightbulb</span>
                <span><strong>Как это работает:</strong> Все цифры заменяются на их квадраты</span>
                <span style="margin-left:auto;">a1b22c3 → a<?= pow(1,2) ?>b<?= pow(22,2) ?>c<?= pow(3,2) ?></span>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
            <span>© 2026 Google Style · preg_replace_callback demo</span>
        </div>
    </div>

    <!-- Маленький скрипт для тёмной темы (опционально) -->
    <script>
        // Добавляем переключатель темы, если хотите
        document.addEventListener('keydown', function(e) {
            if (e.altKey && e.key === 't') {
                document.body.classList.toggle('dark-theme');
            }
        });
    </script>
</body>
</html>


