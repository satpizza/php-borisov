<?php
session_start();
if (isset($_GET['name'])){
$_SESSION['name'] = $_GET['name'];
require('hello.php');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>67 67 67 67</title>
</head>
<body>
   <main>
    <form action="index.php" method="get">
    <label for="name">Введите свое ФИО чтобы украсть ваши данные</label>
    <input type="text" name="name" id="name">
    <button type="submit">Отправить</button>
    </form>
   </main>
</body>
</html>


