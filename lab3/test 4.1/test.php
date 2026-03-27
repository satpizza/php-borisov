<?php
// ========== СПИСОК ФАЙЛОВ ==========
$phpFiles = glob("*.php");
sort($phpFiles);
$currentFile = basename($_SERVER['PHP_SELF']);

// Значения по умолчанию
$str = 'a1b22c3';
$pattern = '/\d+/';
$operation = 'preg_replace_callback';

// Загрузка из файла, если указан
if (isset($_GET['file']) && file_exists($_GET['file'])) {
    $content = file_get_contents($_GET['file']);
    // Извлекаем переменные (простой парсинг)
    if (preg_match('/\$str\s*=\s*[\'"](.+?)[\'"]\s*;/', $content, $m)) $str = $m[1];
    if (preg_match('/\$pattern\s*=\s*[\'"](.+?)[\'"]\s*;/', $content, $m)) $pattern = $m[1];
    if (strpos($content, 'preg_replace_callback') !== false) $operation = 'preg_replace_callback';
    elseif (strpos($content, 'preg_replace') !== false) $operation = 'preg_replace';
    elseif (strpos($content, 'preg_match') !== false) $operation = 'preg_match';
}

// Если отправлена форма, обновляем переменные
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $str = $_POST['str'] ?? $str;
    $pattern = $_POST['pattern'] ?? $pattern;
    $operation = $_POST['operation'] ?? $operation;
}

// Выполняем операцию для предпросмотра
$result = '';
if ($operation === 'preg_replace_callback') {
    function square($matches) {
        return pow($matches[0], 2);
    }
    $result = preg_replace_callback($pattern, 'square', $str);
} elseif ($operation === 'preg_replace') {
    $result = preg_replace($pattern, '!', $str);
} else {
    preg_match($pattern, $str, $matches);
    $result = $matches[0] ?? 'Нет совпадений';
}

// Сохранение файла
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $filename = $_POST['filename'] ?? 'new_regex.php';
    if (!preg_match('/\.php$/', $filename)) $filename .= '.php';
    $filename = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $filename);
}
    // Формируем новый PHP-код (только логика)
    $newPhp = "<?php\n";
    $newPhp .= "// ========== PHP LOGIC ==========\n";
    $newPhp .= "\$str = '" . addslashes($str) . "';\n";
    $newPhp .= "\$pattern = '" . addslashes($pattern) . "';\n";
    
    if ($operation === 'preg_replace_callback') {
        // Если есть кастомная callback функция из POST
        if (isset($_POST['callback']) && !empty($_POST['callback'])) {
            $callback = $_POST['callback'];
            
            // Исправляем callback - добавляем закрывающую скобку, если её нет
            $callback = trim($callback);
            // Подсчитываем количество открывающих и закрывающих скобок
            $openBraces = substr_count($callback, '{');
            $closeBraces = substr_count($callback, '}');
            
            // Если открывающих больше, добавляем недостающие закрывающие
            if ($openBraces > $closeBraces) {
                $callback .= str_repeat("\n}", $openBraces - $closeBraces);
            }
            
            // Извлекаем имя функции из callback
            if (preg_match('/function\s+(\w+)\s*\(/', $callback, $matches)) {
                $funcName = $matches[1];
            } else {
                $funcName = 'square'; // по умолчанию
            }
            
            $newPhp .= "\n" . $callback . "\n\n";
            $newPhp .= "\$result = preg_replace_callback(\$pattern, '$funcName', \$str);\n";
        } else {
            // Стандартная функция square
            $newPhp .= "function square(\$matches) {\n    return pow(\$matches[0], 2);\n}\n";
            $newPhp .= "\$result = preg_replace_callback(\$pattern, 'square', \$str);\n";
        }
    } elseif ($operation === 'preg_replace') {
        $newPhp .= "\$result = preg_replace(\$pattern, '!', \$str);\n";
    } else {
        $newPhp .= "preg_match(\$pattern, \$str, \$matches);\n";
        $newPhp .= "\$result = \$matches[0] ?? 'Нет совпадений';\n";
    }
    $newPhp .= "?>";

    // Читаем текущий файл целиком
    $currentContent = file_get_contents(__FILE__);
    // Находим позицию первого закрывающего ?> (конец первого PHP-блока)
    $endPhpPos = strpos($currentContent, '?>');
    if ($endPhpPos !== false) {
        // Всё после первого ?> — это HTML + скрипты
        $htmlPart = substr($currentContent, $endPhpPos + 2);
    } else {
        $htmlPart = '';
    }

    // Новый полный контент
    $newContent = $newPhp . $htmlPart;

    if ($_POST['save'] === 'update_current') {
        if (file_put_contents($currentFile, $newContent)) {
            $message = "✅ Файл обновлён!";
            // Перенаправляем, чтобы увидеть изменения
            header("Location: ?file=" . urlencode($currentFile));
            exit;
        }
    } else {
        if (file_put_contents($filename, $newContent)) {
            $message = "✅ Создан файл $filename";
            $phpFiles = glob("*.php");
            sort($phpFiles);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Regex · Простой редактор</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto+Mono&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* ===== Google Style ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Roboto', sans-serif;
            background: #f1f3f4;
            color: #202124;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            max-width: 800px;
            width: 100%;
            background: white;
            border-radius: 28px;
            padding: 36px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        h1 {
            font-family: 'Google Sans', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
            border-bottom: 1px solid #ecedef;
            padding-bottom: 12px;
        }
        /* Навигация */
        .nav {
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }
        .nav button {
            background: #f1f3f4;
            border: 1px solid #dadce0;
            border-radius: 40px;
            padding: 10px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Google Sans', sans-serif;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 250px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: 1px solid #dadce0;
            z-index: 10;
            margin-top: 4px;
        }
        .dropdown-content a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            text-decoration: none;
            color: #3c4043;
            border-bottom: 1px solid #ecedef;
        }
        .dropdown-content a:hover { background: #f1f3f4; }
        .dropdown-content a.active {
            background: #e8f0fe;
            color: #1a73e8;
            font-weight: 500;
        }
        .show { display: block; }
        /* Карточки */
        .card {
            background: white;
            border-radius: 20px;
            border: 1px solid #e1e3e6;
            padding: 20px;
            margin: 20px 0;
            border-left: 5px solid #1a73e8;
        }
        .result-card {
            border-left-color: #34a853;
        }
        .label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #5f6368;
            text-transform: uppercase;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }
        .code {
            font-family: 'Roboto Mono', monospace;
            background: #f8f9fa;
            padding: 16px;
            border-radius: 16px;
            border: 1px solid #dadce0;
            white-space: pre-wrap;
            word-break: break-word;
        }
        .result-badge {
            background: #e6f4ea;
            color: #0d652d;
            padding: 8px 28px;
            border-radius: 48px;
            display: inline-block;
            font-size: 2rem;
            border: 1px solid #34a85380;
        }
        input, select {
            width: 100%;
            padding: 14px;
            border: 2px solid #dadce0;
            border-radius: 28px;
            font-family: 'Roboto Mono', monospace;
            margin: 8px 0;
            font-size: 1rem;
        }
        .btn-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 40px;
            font-family: 'Google Sans', sans-serif;
            font-weight: 500;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }
        .btn-success {
            background: #34a853;
            color: white;
        }
        .btn-success:hover {
            background: #2d8744;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52,168,83,0.3);
        }
        .btn-warning {
            background: #f9ab00;
            color: #202124;
        }
        .btn-warning:hover {
            background: #e09b00;
            transform: translateY(-2px);
        }
        .message {
            background: #e6f4ea;
            color: #0d652d;
            padding: 16px;
            border-radius: 40px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .info {
            background: #f1f3f4;
            border-radius: 48px;
            padding: 16px 28px;
            margin-top: 30px;
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .footer {
            margin-top: 20px;
            color: #5f6368;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>
        <span style="color:#4285F4;">G</span><span style="color:#EA4335;">o</span><span style="color:#FBBC05;">o</span>
        <span style="color:#4285F4;">g</span><span style="color:#34A853;">l</span><span style="color:#EA4335;">e</span> RegEx
    </h1>

    <!-- Навигация -->
    <div class="nav">
        <button id="navButton">
            <span class="material-icons">folder_open</span>
            Файлы (<?= count($phpFiles) ?>)
            <span class="material-icons">arrow_drop_down</span>
        </button>
        <div id="navContent" class="dropdown-content">
            <?php foreach ($phpFiles as $file): ?>
                <a href="?file=<?= urlencode($file) ?>" class="<?= $file === $currentFile ? 'active' : '' ?>">
                    <span class="material-icons"><?= $file === $currentFile ? 'description' : 'article' ?></span>
                    <?= htmlspecialchars($file) ?>
                </a>
            <?php endforeach; ?>
            <a href="#" id="refreshFiles">
                <span class="material-icons">refresh</span> Обновить список
            </a>
        </div>
    </div>

    <?php if ($message): ?>
        <div class="message"><span class="material-icons">check_circle</span> <?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="card">
            <div class="label"><span class="material-icons">code</span> Исходная строка</div>
            <input type="text" name="str" value="<?= htmlspecialchars($str) ?>" required>
        </div>

        <div class="card">
            <div class="label"><span class="material-icons">search</span> Паттерн</div>
            <input type="text" name="pattern" value="<?= htmlspecialchars($pattern) ?>" required>
        </div>

        <div class="card">
            <div class="label"><span class="material-icons">tune</span> Операция</div>
            <select name="operation">
                <option value="preg_replace_callback" <?= $operation === 'preg_replace_callback' ? 'selected' : '' ?>>preg_replace_callback</option>
                <option value="preg_replace" <?= $operation === 'preg_replace' ? 'selected' : '' ?>>preg_replace</option>
                <option value="preg_match" <?= $operation === 'preg_match' ? 'selected' : '' ?>>preg_match</option>
            </select>
        </div>

        <?php if ($operation === 'preg_replace_callback'): ?>
            <div class="card">
                <div class="label"><span class="material-icons">functions</span> Callback (фиксированный)</div>
                <div class="code">function square($matches) { return pow($matches[0], 2); }</div>
            </div>
        <?php endif; ?>

        <div class="result-card">
            <div class="label"><span class="material-icons">swap_horiz</span> Результат</div>
            <div class="code result-badge"><?= htmlspecialchars($result) ?></div>
        </div>

        <div class="btn-group">
            <input type="text" name="filename" placeholder="Имя нового файла (new.php)" value="new_regex.php" style="flex:2;">
            <button type="submit" name="save" value="save_new" class="btn btn-success">
                <span class="material-icons">save_as</span> Сохранить как новый
            </button>
            <button type="submit" name="save" value="update_current" class="btn btn-warning">
                <span class="material-icons">update</span> Обновить текущий
            </button>
        </div>
    </form>

    <div class="info">
        <span class="material-icons">info</span>
        <span>Текущий файл: <strong><?= $currentFile ?></strong></span>
    </div>
</div>
<div class="footer">© 2026 Google Style · Regex Editor</div>

<script>
    // Навигация
    document.getElementById('navButton').addEventListener('click', function(e) {
        e.stopPropagation();
        document.getElementById('navContent').classList.toggle('show');
    });
    document.addEventListener('click', function() {
        document.getElementById('navContent').classList.remove('show');
    });
    document.getElementById('refreshFiles').addEventListener('click', function(e) {
        e.preventDefault();
        location.reload();
    });
</script>
</body>
</html>