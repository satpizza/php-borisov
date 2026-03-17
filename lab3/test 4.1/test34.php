<?php
$str = 'text.html';
$pattern = '/\.(txt)|(html)|(php)/';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match_all($pattern,$str);