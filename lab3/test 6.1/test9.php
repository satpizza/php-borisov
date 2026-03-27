<?php
if (!isset($_COOKIE['count'])){
    setcookie('count',1);
    echo "вы зашли первый раз";
}else{
    $count = $_COOKIE['count'] + 1;
    setcookie('count', $count);
    echo "вы посетили этот сайт " . $count. " раз";
}