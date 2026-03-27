<?php
session_start();
    if (!isset($_SESSION['time'])){
    $_SESSION['time'] = time();
    }
$sek = time()-$_SESSION['time'];
echo "вы зашли на сайт ". $sek. " сек назад";