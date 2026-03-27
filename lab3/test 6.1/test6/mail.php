<?php
session_start();
if (isset($_GET['mail'])){
$_SESSION['mail'] = $_GET['mail'];
require('index.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
    <form action="mail.php" method="get">
    <label for="mail">Введи свой маил</label> <BR>
    <input type="email" name="mail" id="mail"><BR>
    <label for="mail">Введи свое имя</label><BR>
    <input type="name" name="name" id="mail"><BR>
    <button type="submit">Потдвердить</button>
    </form>
</main>
</body>
</html>