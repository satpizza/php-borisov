<?php
session_start();
if (!isset($_SESSION['count'])){
    $_SESSION['count'] = 0;
    echo "вы еще не обновили страницу";
}else{
    $_SESSION['count'] = $_SESSION['count'] +1;
    echo "вы обновили эту страницу " . $_SESSION['count']. " раз";
}
