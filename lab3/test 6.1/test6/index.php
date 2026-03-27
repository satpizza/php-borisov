
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <form action="index.php" method="get">
        <p>Имя: <input type="text" name="name"></p>
        <p>Фамилия: <input type="text" name="surname"></p>
        <p>Пароль: <input type="password" name="password"></p>
        <p>Email: <input type="email" name="email2" value="<?=$_SESSION['mail']?>"></p>
        <p><input type="submit" value="Отправить"></p>
    </form>
    </main>
</body>
</html>