<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else {
  require_once("source/db.php") ;
  require_once("source/school_trans.php") ;
  $db = new DB('localhost', 'physcamp', 'physland', 'physcamp') ;
  if (! $db->open()) {
    $messenge = "資料寫入失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  if (! $db->query("UPDATE 2k07_list SET State = 9, Reason = '重新報名' Where AutoNo = " . $_POST['AutoNo']))
    die($db->error()) ;
  if (! $db->query("Insert Into 2k07_list (" .
      "SignTime, IP, Name, Sex, ID, BirthDay, Parent, Email, Phone, " .
	  "CellPhone, Address, School, Grade, Introduction) Values ('" .
	  date("Y-m-d H:i:s", time()) . "', '" .
	  getenv ("REMOTE_ADDR") . "', '" .
	  $_POST['p_Name'] . "', " .
	  $_POST['p_Sex'] . ", '" .
	  $_POST['p_ID'] . "', '" .
	  $_POST['p_Birthday'] . "', '" .
	  $_POST['p_Parent'] . "', '" .
	  $_POST['p_Email'] . "', '" .
	  $_POST['p_Phone'] . "', '" .
	  $_POST['p_CellPhone'] . "', '" .
	  $_POST['p_Address'] . "', '" .
	  $_POST['p_School'] . "', " .
	  $_POST['p_Grade'] . ", '" .
	  $_POST['p_Introduction'] . "')")) {
    $messenge = "資料寫入失敗：新增資料失敗。" ;
    die($db->error()) ;
  }
  $db->freeResult() ;
  $db->close() ;
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>無標題文件</title>
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
	background-attachment: fixed;
	margin-left: 0px;
	margin-top: 2px;
	margin-right: 0px;
	margin-bottom: 2px;
	background-image: url(images/physcampbg01.jpg);
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
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="104" background="../images/caption_green_2.gif" class="style2">&nbsp;資料確認</td>
        <td width="18" background="../images/caption_green_3.gif"></td>
        <td background="../images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>

	<div style="margin-top: 12px; margin-bottom: 8px">
	
<?php
if ($messenge != "") {
  echo "<p align='center' class='style3'>", $messenge, "</p>" ;
  echo "<p align='center'><a href='JavaScript: history.back();'>回上一頁</a></p>" ;
}
else
  echo "<script language='JavaScript'>alert('報名成功！謝謝。'); location.href='../sign_up.htm';</script>" ;
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