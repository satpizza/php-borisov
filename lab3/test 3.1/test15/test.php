<?php
$txt = ['1.txt', '2.txt', '3.txt'];
foreach($txt as $real){
if (file_exists($real)){
    print_r ( "файл $real существует <br>");
} else {
    print_r ( "файл $real несуществует <br> ");
}
}