<?php
function endSession(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-90000, '/');
	session_destroy();
}
session_save_path ('../session');
session_start();
date_default_timezone_set('Asia/Taipei');
$sysop=false;
$sysop = ($_SESSION['auth']=="reg_SYSOP");
if(time()-$_SESSION['time']>1200 || $sysop==false) {endSession(); $sysop=false;}
else $_SESSION['time']=time();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>查詢報名資料 - 恢復單筆資料</title>
<style type="text/css">
<!--
body {
	background-color: #AAAAAA;
	margin-left: 4px;
	margin-top: 10px;
	margin-right: 4px;
	margin-bottom: 10px;
	font-size: 10pt;
	color: #000000;
	font-family: 細明體;
}
td {
	font-size: 10pt;
	font-family: 細明體;
	background-color: #FFFFFF ;
}
th {
	font-size: 10pt;
	font-family: 細明體;
	background-color: #CCCCCC;
	text-align: left;
}
p {
    margin-top: 0px;
	margin-bottom: 0px;
}
input {
	font-size: 9pt;
	font-family: 細明體;
	margin-top: -1px;
	margin-bottom: -1px;
}
-->
</style>
</head>
<body>
<p align="right" style="font-size: 150%"><a href='../admin.php?logout=true'>使用完後請務必按此登出</a></p><hr>
<?php

if ($sysop) {
  if ((! array_key_exists('no', $_GET)) || $_GET['no'] == '') $no = '' ; else $no = $_GET['no'] ;
  $execute = false ;
  if (array_key_exists('execute', $_GET))
    if ($_GET['execute'] == "YES")
      $execute = true ;

  if ($execute) {
  require_once("source/db.php") ;
  require_once("source/para.php") ;
	$db = new DB;
	if (! $db->open())
      die($db->error()) ;
	if (! $db->query("Select ID From $dataTableName Where AutoNo = " . $no))
      die($db->error()) ;
    $fetch_Assoc = $db->fetchAssoc() ;
	if (! $db->query("Update $dataTableName Set State = 9, Reason = '恢復較早的資料' Where ID = '" . $fetch_Assoc['ID'] . "' And State != 9"))
      die($db->error()) ;
	if (! $db->query("Update $dataTableName Set State = 0, Reason = '刪除後再恢復', SignTime = '" . date("Y-m-d H:i:s", time()) . "' Where AutoNo = " . $no))
      die($db->error()) ;
	$db->freeResult() ;
	$db->close() ;
	echo "<script language='JavaScript'>opener.window.location.reload(); window.close();</script>" ;
  }
  else {
	echo "<form action='sysop_un_delete.php' method='get' name='form1'>" ;
	//echo "<input type='hidden' name='password' value='", $_GET['password'], "'>" ;
	echo "<input type='hidden' name='no' value='", $no, "'>" ;
	echo "<input type='hidden' name='execute' value='YES'>" ;
	echo "<p align='center'>若恢復此筆資料，<br>則此筆資料的報名時間將被重設為目前時間！</p>";
	echo "<p align='center' style='margin-top: 4px'><input type='submit' value='確定恢復' style='font-size: 10pt; padding-top: 2px'>　<input type='button' value='取消' style='font-size: 10pt; padding-top: 2px' onClick='window.close();'></p>";
	echo "</form>" ;
  }
}
else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>