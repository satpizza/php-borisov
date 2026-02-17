<?php
$slova =  ['1.txt', '2.txt', '3.txt'];
foreach ($slova as $txt){
touch ($txt);
echo "<br>";
print_r ($txt);
}