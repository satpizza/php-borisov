<?php
$str = 'ex 39 + 3 = 6';
$pattern = '/\d+/';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
preg_match_all($pattern,$str,$match);
echo array_sum ($match[0]);
