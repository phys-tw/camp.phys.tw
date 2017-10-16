<?php

require_once("source/para.php") ;
require_once("source/ID_test.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else if ($_POST['Name'] == "")
  $messenge = "請填寫姓名。" ;
else if ($_POST['Sex'] == "")
  $messenge = "請填寫性別。" ;
else if ($_POST['ID'] == "")
  $messenge = "請填寫身分證字號。" ;
else if ($_POST['B_Year'] == "")
  $messenge = "請選取生日年份。" ;
else if ($_POST['B_Month'] == "")
  $messenge = "請選取生日月份。" ;
else if ($_POST['B_Day'] == "")
  $messenge = "請選取生日日期。" ;
else if ($_POST['ParentName'] == "")
  $messenge = "請填寫監護人姓名。" ;
else if ($_POST['Email'] == "")
  $messenge = "請填寫 E-mail。" ;
else if ($_POST['P_Prefix'] == "")
  $messenge = "請填寫家裡電話之區碼。" ;
else if ($_POST['P_Code'] == "")
  $messenge = "請填寫家裡電話。" ;
else if ($_POST['Address'] == "")
  $messenge = "請填寫地址。" ;
else if ($_POST['School'] == "")
  $messenge = "請填寫就讀高中。" ;
else if ($_POST['Grade'] == "")
  $messenge = "請選取年級。" ;
else if (! ID_test($_POST['ID']))
  $messenge = "身分證字號錯誤！請檢查。" ;
else {
  require_once("source/db.php") ;
  require_once("source/school_trans.php") ;
  $db = new DB('localhost', 'physcamp', 'comicen', 'physcamp') ;
  if (! $db->open())
    die($db->error()) ;
  $db->query("Select ID From 2k06_list Where ID = '" . $_POST['ID'] . "' And State != 9") ;
  if ($db->fetchArray($db->result) && $_POST['AutoNo'] == 0)
    $messenge = "您已報名過了。若資料有誤請至 <a href='edit_enter.php' target='_self'>修改個人報名資料</a> 頁面處理。" ;
  else {
	$p_Name = $_POST['Name'] ;
	$p_Sex = $_POST['Sex'] ;
	$p_ID = strtoupper($_POST['ID']) ;
	$p_Birthday = mktime(0, 0, 0, $_POST['B_Month'], $_POST['B_Day'], $_POST['B_Year']) ;
	$p_Parent = $_POST['ParentName'] ;
	$p_Email = $_POST['Email'] ;
	$p_Phone = "(" . $_POST['P_Prefix'] . ")" . $_POST['P_Code'] ;
	$p_CellPhone = $_POST['CellPhone'] ;
	$p_Address = $_POST['Address'] ;
	if (strcmp(school_trans(substr($_POST['School'], 0, 4) . ' '), substr($_POST['School'], 0, 4) . ' ') != 0)
	  $p_School = school_trans(substr($_POST['School'], 0, 4) . ' ') ;
	else
	  $p_School = school_trans($_POST['School']) ;
	$p_Grade = $_POST['Grade'] ;
	$p_Introduction = $_POST['Introduction'] ;
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
else {
?>

	  <p>請仔細檢查每一項資料，確認無誤後再送出。</p>
	  <form action="sign_up_save.php" method="post" name="form1" target="_self">
	    <input name="AutoNo" type="hidden" value="<?= $_POST['AutoNo'] ?>">
	    <table width="560" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px">
          <tr>
            <td width="120" height="24">姓名：</td>
            <td width="440" class="style4"><input name="p_Name" type="hidden" value="<?= $p_Name ?>"><?= $p_Name ?></td>
          </tr>
          <tr>
            <td height="24">性別：</td>
            <td class="style4"><input name="p_Sex" type="hidden" value="<?= $p_Sex ?>"><?php
			  if ($p_Sex == 1) echo "男" ; else if ($p_Sex == 2) echo "女" ;
			?></td>
          </tr>
          <tr>
            <td height="24">身分證字號：</td>
            <td class="style4"><input name="p_ID" type="hidden" value="<?= $p_ID ?>"><?= $p_ID ?></td>
          </tr>
          <tr>
            <td height="24">出生年月日：</td>
            <td class="style4"><input name="p_Birthday" type="hidden" value="<?= date("Y-m-d", $p_Birthday) ?>"><?= date("Y/m/d", $p_Birthday) ?></td>
          </tr>
          <tr>
            <td height="24">監護人姓名：</td>
            <td class="style4"><input name="p_Parent" type="hidden" value="<?= $p_Parent ?>"><?= $p_Parent ?></td>
          </tr>
          <tr>
            <td height="24">E-mail：</td>
            <td class="style4"><input name="p_Email" type="hidden" value="<?= $p_Email ?>"><?= $p_Email ?></td>
          </tr>
          <tr>
            <td height="24">家裡電話：</td>
            <td class="style4"><input name="p_Phone" type="hidden" value="<?= $p_Phone ?>"><?= $p_Phone ?></td>
          </tr>
          <tr>
            <td height="24">手機：</td>
            <td class="style4"><input name="p_CellPhone" type="hidden" value="<?= $p_CellPhone ?>"><?= $p_CellPhone ?></td>
          </tr>
          <tr>
            <td height="24">地址：</td>
            <td class="style4"><input name="p_Address" type="hidden" value="<?= $p_Address ?>"><?= $p_Address ?></td>
          </tr>
          <tr>
            <td height="24">就讀高中：</td>
            <td class="style4"><input name="p_School" type="hidden" value="<?= $p_School ?>"><?= $p_School ?></td>
          </tr>
          <tr>
            <td height="24">年級：</td>
            <td class="style4"><input name="p_Grade" type="hidden" value="<?= $p_Grade ?>"><?php
			  if ($p_Grade == 1) echo "一年級" ; else if ($p_Grade == 2) echo "二年級" ; else if ($p_Grade == 3) echo "三年級" ;
			?></td>
          </tr>
          <tr>
            <td valign="top" style="padding-top: 2px">自我介紹：</td>
            <td valign="top" style="padding-top: 2px" class="style4"><input name="p_Introduction" type="hidden" value="<?= str_replace("\n", "<br>", stripslashes(htmlspecialchars($p_Introduction))) ?>"><?= str_replace("\n", "<br>", stripslashes(htmlspecialchars($p_Introduction))) ?></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
			  <input name="Submit" type="submit" class="form1" style="height: 24px; padding-top: 2px" value="確認送出">&nbsp;
              <input name="Reset" type="button" class="form1" style="height: 24px; padding-top: 2px" value="返回修改" onClick="history.back();">
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