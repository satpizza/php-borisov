<?php
$str = 'ahb acb aeb aeeb adcb axeb';
$patern = "/a.b/";
echo "str = $str<BR>";
echo "patern = $patern <BR>";
echo preg_replace ($patern, "!", $str);