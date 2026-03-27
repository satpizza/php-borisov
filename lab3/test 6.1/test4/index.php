<?php
session_start();
if (isset($_GET['strana'])){
$_SESSION['strana'] = $_GET['strana'];
require('test4.php');
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
   <form action="index.php" method="get">
    <label for="strana">Напиши свою страну</label>
    <input type="text" name="strana" id="strana">
    <button type="submit">Жди ракету</button>
    </form>
    </main>
</body>
</html>
