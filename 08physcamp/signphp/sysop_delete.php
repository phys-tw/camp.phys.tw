<?php
  header("Expires: Sat, 1 Jan 2000 00:00:00 GMT") ;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>查詢報名資料 - 刪除單筆資料</title>
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

<?php

$sysop = false ;
if (array_key_exists('password', $_POST))
  if ($_POST['password'] == "campregadmin")
    $sysop = true ;

if ($sysop) {
  if ((! array_key_exists('no', $_POST)) || $_POST['no'] == '') $no = '' ; else $no = $_POST['no'] ;
  $execute = false ;
  if (array_key_exists('execute', $_POST))
    if ($_POST['execute'] == "YES")
      $execute = true ;

  if ($execute) {
	require_once("source/db.php") ;
    require_once("source/para.php") ;
	$db = new DB;
	if (! $db->open())
      die($db->error()) ;
	if (! $db->query("Update $dataTableName Set State = 9, Reason = '" . $_POST['Reason'] . "' Where AutoNo = " . $no))
      die($db->error()) ;
	$db->freeResult() ;
	$db->close() ;
	echo "<script language='JavaScript'>opener.window.location.reload(); window.close();</script>" ;
  }
  else {
	echo "<form action='sysop_delete.php' method='post' name='form1'>" ;
	echo "<input type='hidden' name='password' value='", $_POST['password'], "'>" ;
	echo "<input type='hidden' name='no' value='", $no, "'>" ;
	echo "<input type='hidden' name='execute' value='YES'>" ;
	echo "<table width='342' border='1' cellspacing='0' cellpadding='0'><tr><td style='background-color: #AAAAAA'>";
	echo "<table width='342' border='0'><tr><th width='80'>刪除原因：</th>" ;
	echo "<td><input name='Reason' type='text' size='40' maxlength='40' value=''></td></tr></table>";
	echo "</td></tr></table>" ;
	echo "<p align='center' style='margin-top: 4px'><input type='submit' value='確定刪除' style='font-size: 10pt; padding-top: 2px'>　<input type='button' value='取消' style='font-size: 10pt; padding-top: 2px' onClick='window.close();'></p>";
	echo "</form>" ;
  }
}
else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>
