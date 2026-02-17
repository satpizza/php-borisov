<?php
$slova = ['1.txt', '2.txt', '3.txt'];
foreach ($slova as $txt){
    unlink ($txt);
    print_r ($txt, "удалены");
}