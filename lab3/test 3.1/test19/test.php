<?php
$lines = file('text.txt');
$sum = array_sum ($lines);
file_put_contents ('sum.txt',$sum);
print_r($sum);