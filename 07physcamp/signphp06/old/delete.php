<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else {
  require_once("source/db.php") ;
  $db = new DB('localhost', 'physcamp', 'physland', 'physcamp') ;
  if (! $db->open()) {
    $messenge = "資料查詢失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  else if (! $db->query("Select * From 2k06_list Where ID = '" . $_GET['ID'] . "' And State != 9")) {
    $messenge = "資料查詢失敗：無法讀取資料。" ;
    die($db->error()) ;
  }
  else if (! ($fetch_Assoc = $db->fetchAssoc()))
    $messenge = "找不到您的資料，可能身分證字號有誤、報名未成功或報名資料已刪除。" ;
  else {
    $p_AutoNo = $fetch_Assoc['AutoNo'] ;
	$p_SignTime = strtotime($fetch_Assoc['SignTime']) ;
	$p_Name = $fetch_Assoc['Name'] ;
	$p_Sex = $fetch_Assoc['Sex'] ;
	$p_ID = $fetch_Assoc['ID'] ;
	$p_Birthday = strtotime($fetch_Assoc['Birthday']) ;
	$p_Parent = $fetch_Assoc['Parent'] ;
	$p_Email = $fetch_Assoc['Email'] ;
	$p_Phone = $fetch_Assoc['Phone'] ;
	$p_CellPhone = $fetch_Assoc['CellPhone'] ;
	$p_Address = $fetch_Assoc['Address'] ;
    $p_School = $fetch_Assoc['School'] ;
	$p_Grade = $fetch_Assoc['Grade'] ;
	$p_Introduction = $fetch_Assoc['Introduction'] ;
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
	background-image: url(../images/box_middle_green.gif);
	font-size: 11pt;
	color: #1C660F;
	font-family: 細明體;
    scrollbar-face-color: #6EBF60;
	scrollbar-highlight-color: #D4FFCC;
	scrollbar-darkshadow-color: #6EBF60;
    scrollbar-3dlight-color: #D4FFCC;
	scrollbar-track-color: #D4FFCC;
	scrollbar-arrow-color: #000000;
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
	color: #6EBF60;
}
a:active {
	text-decoration: none;
	color: #6EBF60;
}
.form1 {
	font-size: 11pt;
	font-family: 細明體;
	color: #1C660F;
	padding-left: 4px;
	padding-right: 4px;
	border-color: #6EBF60;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	font-size: 15pt;
	font-weight: bold;
	font-family: 標楷體;
	color: #D4FFCC;
	padding-top: 4px;
	line-height: 1;
}
.style3 {color: #FF0000}
.style4 {color: #1D2C8A}
-->
</style></head>

<body>
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20" background="../images/caption_green_1.gif"></td>
        <td width="148" background="../images/caption_green_2.gif" class="style2">&nbsp;刪除報名資料</td>
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
else {
?>

	  <p style="text-indent: 32px">您欲取消報名，以下是您要刪除的報名資料。<span class="style3">請注意：此項操作無法復原！</span></p>
	  <form action="delete_execute.php" method="post" name="form1" target="_self">
	    <input name="AutoNo" type="hidden" value="<?= $p_AutoNo ?>">
	    <table width="560" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px">
          <tr>
            <td width="120" height="24" class="style3">報名時間：</td>
            <td width="440" class="style3"><?= date("Y/m/d H:i:s", $p_SignTime) ?></td>
          </tr>
          <tr>
            <td width="120" height="24">姓名：</td>
            <td width="440" class="style4"><?= $p_Name ?></td>
          </tr>
          <tr>
            <td height="24">性別：</td>
            <td class="style4"><?php
			  if ($p_Sex == 1) echo "男" ; else if ($p_Sex == 2) echo "女" ;
			?></td>
          </tr>
          <tr>
            <td height="24">身分證字號：</td>
            <td class="style4"><?= $p_ID ?></td>
          </tr>
          <tr>
            <td height="24">出生年月日：</td>
            <td class="style4"><?= date("Y/m/d", $p_Birthday) ?></td>
          </tr>
          <tr>
            <td height="24">監護人姓名：</td>
            <td class="style4"><?= $p_Parent ?></td>
          </tr>
          <tr>
            <td height="24">E-mail：</td>
            <td class="style4"><?= $p_Email ?></td>
          </tr>
          <tr>
            <td height="24">家裡電話：</td>
            <td class="style4"><?= $p_Phone ?></td>
          </tr>
          <tr>
            <td height="24">手機：</td>
            <td class="style4"><?= $p_CellPhone ?></td>
          </tr>
          <tr>
            <td height="24">地址：</td>
            <td class="style4"><?= $p_Address ?></td>
          </tr>
          <tr>
            <td height="24">就讀高中：</td>
            <td class="style4"><?= $p_School ?></td>
          </tr>
          <tr>
            <td height="24">年級：</td>
            <td class="style4"><?php
			  if ($p_Grade == 1) echo "一年級" ; else if ($p_Grade == 2) echo "二年級" ; else if ($p_Grade == 3) echo "三年級" ;
			?></td>
          </tr>
          <tr>
            <td valign="top" style="padding-top: 2px">自我介紹：</td>
            <td valign="top" style="padding-top: 2px" class="style4"><?= $p_Introduction ?></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
              <input name="Submit" type="submit" class="form1" style="height: 24px; padding-top: 2px" value="確定刪除">
              <input name="Back" type="button" class="form1" style="height: 24px; padding-top: 2px" value="取消返回" onClick="location.href='../sign_up.htm'">
			</td>
          </tr>
        </table>
	  </form>

<?php
}
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