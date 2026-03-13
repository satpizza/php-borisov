<?php
$str = 'my emai email@example-one.com prettyandsimple@example.com ';
$pattern = '#[a-z0-9-]+@[a-z-]+\.[a-z]{2,3}#';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match_all($pattern,$str,$match);
print_r($match);