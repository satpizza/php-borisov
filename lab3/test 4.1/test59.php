<?php
$str = 'aAXa aeffa aGha aza ax23a a3sSa';
$patern = "/a[a-z]+a/";
echo "str = $str<BR>";
echo "patern = $patern <BR>";
echo preg_replace ($patern, "!", $str);