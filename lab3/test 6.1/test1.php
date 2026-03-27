<?php
session_start();
if (isset($_SESSION['test'])) echo $_SESSION['test'];
else{
$_SESSION['test'] = 'test';
echo "Save session";
}
