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
  if ((! array_key_exists('no', $_GET)) || $_GET['no'] == '') $no = '' ; else $no = $_GET['no'] ;
  require_once("source/db.php") ;
  require_once("source/para.php") ;
  $db = new DB;
  if (! $db->open())
    die($db->error()) ;
  if (! $db->query("Select * From $dataTableName Where AutoNo = " . $no))
    die($db->error()) ;
  $fetch_Assoc = $db->fetchAssoc() ;

  $p_Name = $fetch_Assoc['Name'] ;
  $p_Parent = $fetch_Assoc['Parent'] ;
  $p_Email = $fetch_Assoc['Email'] ;
  $p_Phone = $fetch_Assoc['Phone'] ;
  $p_CellPhone = $fetch_Assoc['CellPhone'] ;
  $p_Address = $fetch_Assoc['Address'] ;
  $p_School = $fetch_Assoc['School'] ;
  $p_Notation = $fetch_Assoc['Notation'] ;

  echo "<form action='sysop_save.php' method='post' name='form1'>" ;
  //echo "<input type='hidden' name='password' value='", $_GET['password'], "'>" ;
  echo "<input type='hidden' name='AutoNo' value='", $no, "'>" ;
  echo "<table width='732' border='1' cellspacing='0' cellpadding='0'><tr><td style='background-color: #AAAAAA'>";
  echo "<table width='732' border='0'><tr><th width='110'>姓名：</th>" ;
  echo "<td><input name='Name' type='text' size='12' maxlength='5' value='", $p_Name, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>監護人姓名：</th>" ;
  echo "<td><input name='ParentName' type='text' size='12' maxlength='5' value='", $p_Parent, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>E-mail：</th>" ;
  echo "<td><input name='Email' type='text' size='60' maxlength='60' value='", $p_Email, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>電話：</th>" ;
  echo "<td><input name='Phone' type='text' size='16' maxlength='14' value='", $p_Phone, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>手機：</th>" ;
  echo "<td><input name='CellPhone' type='text' size='16' maxlength='11' value='", $p_CellPhone, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>地址：</th>" ;
  echo "<td><input name='Address' type='text' size='100' maxlength='150' value='", $p_Address, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>就讀高中：</th>" ;
  echo "<td><input name='School' type='text' size='40' maxlength='20' value='", $p_School, "'></td></tr></table>";
  echo "<table width='732' border='0'><tr><th width='110'>工作人員備註：</th>" ;
  echo "<td><input name='Notation' type='text' size='100' maxlength='100' value='", $p_Notation, "'></td></tr></table>";
  echo "</td></tr></table>" ;
  echo "<p align='center' style='margin-top: 4px'><input type='submit' value='儲存變更' style='font-size: 10pt; padding-top: 2px'>　<input type='reset' value='回復原值' style='font-size: 10pt; padding-top: 2px'></p>";
  echo "</form>" ;
  
  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>