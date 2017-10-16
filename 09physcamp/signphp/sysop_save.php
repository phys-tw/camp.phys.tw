<?php
function endSession(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-90000, '/');
	session_destroy();
}
session_save_path ('../session');
session_start();
$sysop=false;
$sysop = ($_SESSION['auth']=="reg_SYSOP");
if(time()-$_SESSION['time']>1200 || $sysop==false) {endSession(); $sysop=false;}
else $_SESSION['time']=time();
?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>查詢報名資料 - 編輯特定欄位</title>
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
  require_once("source/db.php") ;
  require_once("source/para.php") ;
  $db = new DB;
  if (! $db->open())
    die($db->error()) ;

  $p_SQL = "Name = '" . $_POST['Name'] . "'" ;
  $p_SQL = $p_SQL . ", Parent = '" . $_POST['ParentName'] . "'" ;
  $p_SQL = $p_SQL . ", Email = '" . $_POST['Email'] . "'" ;
  $p_SQL = $p_SQL . ", Phone = '" . $_POST['Phone'] . "'" ;
  $p_SQL = $p_SQL . ", CellPhone = '" . $_POST['CellPhone'] . "'" ;
  $p_SQL = $p_SQL . ", Address = '" . $_POST['Address'] . "'" ;
  $p_SQL = $p_SQL . ", School = '" . $_POST['School'] . "'" ;
  $p_SQL = $p_SQL . ", Notation = '" . $_POST['Notation'] . "'" ;
  $p_SQL = "Update $dataTableName Set " . $p_SQL . " Where AutoNo = " . $_POST['AutoNo'] ;

  if (! $db->query($p_SQL))
    die($db->error()) ;

  echo "<script language='JavaScript'>opener.window.location.reload(); window.close();</script>" ;
  
  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>