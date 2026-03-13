<?php
$str = 'site.com';
$pattern = '#[a-z-1-9]+\.[a-z]{2,3}#';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match($pattern,$str);