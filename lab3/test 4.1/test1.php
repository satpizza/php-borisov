<?php
$str = 'a1b2c3';
$pattern = '/(\d)/';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_replace($pattern,"$1$1",$str);