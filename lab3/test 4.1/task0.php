<?php
$str = '123456789101112';
$pattern = '/^\d{1,12}$/';
echo "str= $str<BR>";
echo "pattern= $pattern<BR>";
echo preg_match($pattern,$str);