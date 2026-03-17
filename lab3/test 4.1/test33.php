<?php
$str = 'image.jpeg';
$pattern = '/\.jpe?g/';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match_all($pattern,$str);