<?php
//function getmicrotime()
//{
//    list($usec, $sec) = explode(" ", microtime());
//    return ((float)$usec + (float)$sec);
//}
///**********************************************************************/
//$time = getmicrotime();

define('STAT_BASE', dirname(__FILE__));
require STAT_BASE . '/lib/base.php';

session_start();


if (isset($_SESSION['admin']) && is_array($_SESSION['admin']) && $_SESSION['admin']['_login'] == 'login') {
    $login = true;
} else {
    $login = false;
}

$datadir = STAT_BASE ."/". $conf['data'] ."/";

if ($login == true && $_POST['send'] == "doit") {
    @unlink($datadir . "start.db");
    @unlink($datadir . "date.db");
    @unlink($datadir . "recent.db");
}



ob_start("ob_gzhandler");

$showPopText = true;
$title = "Welcome";

include T_DIR . '/common-header.inc';
include T_DIR . '/logo.inc';

include T_DIR . '/admin.inc';

include T_DIR . '/copyright.inc';
include T_DIR . '/common-footer.inc';

//echo "<p>Time elapsed: ",getmicrotime() - $time, " seconds";
?>