<?php
$bait = filesize("makaka.jpg");
$megabait = $bait / (1024*1024);
echo round ($megabait, 4). 'MB';
