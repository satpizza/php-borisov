<?php
$txt = 'text.txt';
if (file_exists($txt)){
    unlink ($txt);
    print_r ("файл $txt существует и удален ");
} else {
    touch('text.txt');
    print_r ("файл $txt несуществует, но создан ");
}