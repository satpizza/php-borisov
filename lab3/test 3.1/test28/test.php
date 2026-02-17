<?php
$chislo = file ('test.txt');
$sum = (array_sum($chislo));
file_put_contents ('test.txt', PHP_EOL .$sum, FILE_APPEND);
echo ($sum);