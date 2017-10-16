<?php

session_start();
define('STAT_BASE', dirname(__FILE__));

$_SESSION = array();
session_destroy();
header('Location: admin.php');


?>