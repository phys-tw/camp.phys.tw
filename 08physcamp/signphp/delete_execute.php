<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else {
  require_once("source/db.php") ;
  $db = new DB;
  if (! $db->open()) {
    $messenge = "資料刪除失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  if (! $db->query("UPDATE $dataTableName SET State = 9, Reason = '自行取消報名' Where AutoNo = " . $_POST['AutoNo'])) {
    $messenge = "資料刪除失敗：無法刪除資料。" ;
    die($db->error()) ;
  }
  $db->freeResult() ;
  $db->close() ;
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>2008 台大物理營 霧裡世界 報名系統</title>
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
	background-attachment: fixed;
	margin-left: 0px;
	margin-top: 18px;
	margin-right: 0px;
	margin-bottom: 12px;
	background-color: transparent;
	font-size: 11pt;
	font-family: 細明體;
}
td {
	font-size: 11pt;
	font-family: 細明體;
}
p {
    margin-top: 6px;
	margin-bottom: 6px;
}
ul {
    margin-top: 6px;
    margin-bottom: 6px;
	margin-left: 32px;
}
li {
    margin-top: 3px;
    margin-bottom: 3px;
}
a {
	color: #000000;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style2 {
	font-size: 15pt;
	font-weight: bold;
	font-family: 標楷體;
	padding-top: 4px;
	line-height: 1;
}
.style3 {color: #FF0000}
-->
</style></head>

<body>
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 12px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="104" background="../images/caption_green_2.gif" class="style2">&nbsp;確認取消報名</td>
        <td width="18" background="../images/caption_green_3.gif"></td>
        <td background="../images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>

	<div style="margin-top: 12px; margin-bottom: 8px">
	
<?php
if ($messenge != "") {
  echo "<p align='center' class='style3'>", $messenge, "</p>" ;
  echo "<p align='center'><a href='#' onclick='location.href=\"../b4_signup.htm\";'>回「線上報名」</a></p>" ;
}
else
  echo "<script language='JavaScript'>alert('刪除完畢，您已取消報名。往後有機會歡迎再參加。'); location.href='sign_up.htm';</script>" ;
?>

	</div>
	
	<table width="574" height="6" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td background="../images/caption_green_5.gif"></td>
      </tr>
    </table>

  </td>
  </tr>
</table>
</body>
</html>
