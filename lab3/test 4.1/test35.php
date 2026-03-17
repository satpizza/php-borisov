<?php
$str = 'http.image';
$pattern = '/https?/';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match_all($pattern,$str);