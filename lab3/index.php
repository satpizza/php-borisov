<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>67</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <form action="" method="get">
            <input type="text" name="love_mom_Egora" class="input-field" placeholder="Введите текст...">
            <button type="submit" class="submit-btn">пусь</button>
        </form>

<?php
$XVI="Иван Васильевич";
$XVIII="Пётр Алексеевич";
$XIX="Николай Павлович";
    //    "В XVI веке царствовал Иван Васильевич"
    if (isset($_GET['love_mom_Egora']) && $_GET['love_mom_Egora'] !== ''){
        $vek = $_GET ['love_mom_Egora'];
    echo 'В '.$vek.' царствовал '. $$vek;
    }
