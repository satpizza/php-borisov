<?php
$slova = ['putin', 'breznev'];
file_put_contents ('test.txt',implode("\n", $slova));
print_r ($slova); 