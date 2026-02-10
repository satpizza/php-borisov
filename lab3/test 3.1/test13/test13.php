<?php
copy('test.txt', 'dir/text.txt');
unlink ('test.txt');
echo "файл перемещен";
