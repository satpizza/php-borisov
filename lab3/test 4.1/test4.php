<?php
$str = 'hello.site.com';
$pattern = '#[a-z]+\.[a-z-]+\.[a-z]{2,3}#';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match($pattern,$str);