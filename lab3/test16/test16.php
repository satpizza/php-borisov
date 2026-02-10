<?php
$txt = 'text.txt';
if (file_exists($txt)){
    print_r ("файл $txt существует ");
} else {
    print_r ("файл $txt несуществует ");
}




// $txt = ['1.txt', '2.txt', '3.txt'];
// foreach($txt as $real){
// if (file_exists($real)){
//     print_r ( "файл $real существует <br>");
// } else {
//     print_r ( "файл $real несуществует <br> ");
// }
// }