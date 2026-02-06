<?php
$count = file_get_contents ('count.txt');
$count = $count**2;
file_put_contents('count.txt', $count);
if ($count > 10000){
echo 'бро ты переборщил '. $count;
}
else echo 'ты обновил страницу: '. $count;
