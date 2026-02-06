<?php
$count = file_get_contents ('count.txt');
$count++;
file_put_contents('count.txt', $count);
if ($count == 52){
echo 'посхалко '. $count;
}
else echo 'ты обновил страницу: '. $count;