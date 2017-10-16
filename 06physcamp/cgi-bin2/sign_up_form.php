<?php

require_once("source/para.php") ;
$messenge = "" ;
$p_AutoNo = 0 ;
$p_Name = "" ;
$p_Sex = 0 ;
$p_ID = "" ;
$p_B_Year = "" ;
$p_B_Month = "" ;
$p_B_Day = "" ;
$p_Parent = "" ;
$p_Email = "" ;
$p_P_Prefix = "" ;
$p_P_Code = "" ;
$p_CellPhone = "" ;
$p_Address = "" ;
$p_School = "" ;
$p_Grade = 0 ;
$p_Introduction = "" ;
$p_State = 0 ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else if (array_key_exists('ID', $_GET)) {
  require_once("source/db.php") ;
  $db = new DB('localhost', 'physcamp', 'comicen', 'physcamp') ;
  if (! $db->open()) {
    $messenge = "資料查詢失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  else if (! $db->query("Select * From 2k06_list Where ID = '" . $_GET['ID'] . "' Order By SignTime Desc")) {
    $messenge = "資料查詢失敗：無法讀取資料。" ;
    die($db->error()) ;
  }
  else if (! ($fetch_Assoc = $db->fetchAssoc()))
    $messenge = "找不到您的資料，可能身分證字號有誤，或報名未成功。<br>若要報名請至 <a href='sign_up_form.php' target='_self'>報名系統</a> 填寫個人資料。" ;
  else {
	$p_SignTime = strtotime($fetch_Assoc['SignTime']) ;
	$p_Name = $fetch_Assoc['Name'] ;
	$p_Sex = $fetch_Assoc['Sex'] ;
	$p_ID = $fetch_Assoc['ID'] ;
	$p_B_Year = substr($fetch_Assoc['Birthday'], 0, 4) ;
	$p_B_Month = substr($fetch_Assoc['Birthday'], 5, 2) ;
	$p_B_Day = substr($fetch_Assoc['Birthday'], 8, 2) ;
	$p_Parent = $fetch_Assoc['Parent'] ;
	$p_Email = $fetch_Assoc['Email'] ;
	$pos1 = strpos($fetch_Assoc['Phone'], '(');
	$pos2 = strpos($fetch_Assoc['Phone'], ')');
	$p_P_Prefix = substr($fetch_Assoc['Phone'], $pos1 + 1, $pos2 - $pos1 - 1) ;
	$p_P_Code = substr($fetch_Assoc['Phone'], $pos2 + 1) ;
	$p_CellPhone = $fetch_Assoc['CellPhone'] ;
    $p_Address = $fetch_Assoc['Address'] ;
    $p_School = $fetch_Assoc['School'] ;
	$p_Grade = $fetch_Assoc['Grade'] ;
	$p_Introduction = $fetch_Assoc['Introduction'] ;
	$p_State = $fetch_Assoc['State'] ;
	if ($p_State != 9)
	  $p_AutoNo = $fetch_Assoc['AutoNo'] ;
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
	text-indent: 32;
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
.style2 {
	font-size: 15pt;
	font-weight: bold;
	font-family: 標楷體;
	color: #D4FFCC;
	padding-top: 4px;
	line-height: 1;
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
.form2 {
	font-size: 10pt;
	font-family: 細明體;
	color: #1C660F;
	border-color: #6EBF60;
	border-style: solid;
	border-width: 1px;
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
        <td width="148" background="../images/caption_green_2.gif" class="style2">&nbsp;填寫個人資料</td>
        <td width="18" background="../images/caption_green_3.gif"></td>
        <td background="../images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	
<?php
if (time() > $deadline) {
  echo "<p align='center' class='style3' style='text-indent: 0px'>報名已於 " . date("Y/m/d H:i:s", $deadline) . " 截止。</p>" ;
  echo "<p align='center' style='text-indent: 0px'><a href='JavaScript: history.back();'>回上一頁</a></p>" ;
}
else if ($messenge != "") {
  echo "<p align='center' class='style3'>", $messenge, "</p>" ;
  echo "<p align='center'><a href='JavaScript: history.back();'>回上一頁</a></p>" ;
}
else if ($p_State == 9)
  echo "<script language='JavaScript'>location.href='look_up.php?ID=" . $_GET['ID'] . "';</script>" ;
else {
  if (array_key_exists('ID', $_GET))
    echo "<p class='style3'>修改報名資料將視為「重新報名」，非資料填寫錯誤請勿隨意修改。</p>" ;
?>	
	
	  <p>前方有 <span class="style3">*</span> 號者為必填項目。</p>
	  <p>E-mail 欄位請填寫您經常使用的電子郵件信箱，以免遺漏任何重要資訊。</p>
	  <form action="sign_up_check.php" method="post" name="form1" target="_self">
	    <input name="AutoNo" type="hidden" value="<?= $p_AutoNo ?>">
	    <table width="560" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px">
		  <?php if ($p_AutoNo != 0) { ?>
          <tr>
            <td width="120" height="24" class="style3">&nbsp;報名時間：</td>
            <td width="440" class="style3"><?= date("Y/m/d H:i:s", $p_SignTime) ?></td>
          </tr>
		  <?php } ?>
          <tr>
            <td width="120" height="24"><span class="style3">*</span>姓名：</td>
            <td width="440"><input name="Name" type="text" class="form1" id="Name" size="12" maxlength="5" value="<?= $p_Name ?>"></td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>性別：</td>
            <td>
			  <input name="Sex" type="radio" value="1"<?= ($p_Sex == 1 ? ' checked' : '') ?>> 男
              <input name="Sex" type="radio" value="2"<?= ($p_Sex == 2 ? ' checked' : '') ?>> 女
			</td>
          </tr>
          <tr>
		    <?php if ($p_AutoNo != 0) { ?>
            <td height="24">&nbsp;身分證字號：</td>
            <td width="440" class="style4"><input name="ID" type="hidden" value="<?= $p_ID ?>"><?= $p_ID ?></td>
		    <?php } else { ?>
            <td height="24"><span class="style3">*</span>身分證字號：</td>
            <td><input name="ID" type="text" class="form1" id="ID" size="12" maxlength="10"></td>
		    <?php } ?>
		  </tr>
          <tr>
            <td height="24"><span class="style3">*</span>出生年月日：</td>
            <td>
			  <select name="B_Year" class="form2" id="B_Year">
                <option value=""></option>
                <option value="1985"<?= ($p_B_Year == "1985" ? ' selected' : '') ?>>1985</option>
                <option value="1986"<?= ($p_B_Year == "1986" ? ' selected' : '') ?>>1986</option>
                <option value="1987"<?= ($p_B_Year == "1987" ? ' selected' : '') ?>>1987</option>
                <option value="1988"<?= ($p_B_Year == "1988" ? ' selected' : '') ?>>1988</option>
                <option value="1989"<?= ($p_B_Year == "1989" ? ' selected' : '') ?>>1989</option>
                <option value="1990"<?= ($p_B_Year == "1990" ? ' selected' : '') ?>>1990</option>
                <option value="1991"<?= ($p_B_Year == "1991" ? ' selected' : '') ?>>1991</option>
                <option value="1992"<?= ($p_B_Year == "1992" ? ' selected' : '') ?>>1992</option>
                <option value="1993"<?= ($p_B_Year == "1993" ? ' selected' : '') ?>>1993</option>
                <option value="1993"<?= ($p_B_Year == "1994" ? ' selected' : '') ?>>1994</option>
              </select> 年
			  <select name="B_Month" class="form2" id="B_Month">
                <option value=""></option>
                <option value="1"<?= ($p_B_Month == "01" ? ' selected' : '') ?>>01</option>
                <option value="2"<?= ($p_B_Month == "02" ? ' selected' : '') ?>>02</option>
                <option value="3"<?= ($p_B_Month == "03" ? ' selected' : '') ?>>03</option>
                <option value="4"<?= ($p_B_Month == "04" ? ' selected' : '') ?>>04</option>
                <option value="5"<?= ($p_B_Month == "05" ? ' selected' : '') ?>>05</option>
                <option value="6"<?= ($p_B_Month == "06" ? ' selected' : '') ?>>06</option>
                <option value="7"<?= ($p_B_Month == "07" ? ' selected' : '') ?>>07</option>
                <option value="8"<?= ($p_B_Month == "08" ? ' selected' : '') ?>>08</option>
                <option value="9"<?= ($p_B_Month == "09" ? ' selected' : '') ?>>09</option>
                <option value="10"<?= ($p_B_Month == "10" ? ' selected' : '') ?>>10</option>
                <option value="11"<?= ($p_B_Month == "11" ? ' selected' : '') ?>>11</option>
                <option value="12"<?= ($p_B_Month == "12" ? ' selected' : '') ?>>12</option>
              </select> 月
			  <select name="B_Day" class="form2" id="B_Day">
                <option value=""></option>
                <option value="1"<?= ($p_B_Day == "01" ? ' selected' : '') ?>>01</option>
                <option value="2"<?= ($p_B_Day == "02" ? ' selected' : '') ?>>02</option>
                <option value="3"<?= ($p_B_Day == "03" ? ' selected' : '') ?>>03</option>
                <option value="4"<?= ($p_B_Day == "04" ? ' selected' : '') ?>>04</option>
                <option value="5"<?= ($p_B_Day == "05" ? ' selected' : '') ?>>05</option>
                <option value="6"<?= ($p_B_Day == "06" ? ' selected' : '') ?>>06</option>
                <option value="7"<?= ($p_B_Day == "07" ? ' selected' : '') ?>>07</option>
                <option value="8"<?= ($p_B_Day == "08" ? ' selected' : '') ?>>08</option>
                <option value="9"<?= ($p_B_Day == "09" ? ' selected' : '') ?>>09</option>
                <option value="10"<?= ($p_B_Day == "10" ? ' selected' : '') ?>>10</option>
                <option value="11"<?= ($p_B_Day == "11" ? ' selected' : '') ?>>11</option>
                <option value="12"<?= ($p_B_Day == "12" ? ' selected' : '') ?>>12</option>
                <option value="13"<?= ($p_B_Day == "13" ? ' selected' : '') ?>>13</option>
                <option value="14"<?= ($p_B_Day == "14" ? ' selected' : '') ?>>14</option>
                <option value="15"<?= ($p_B_Day == "15" ? ' selected' : '') ?>>15</option>
                <option value="16"<?= ($p_B_Day == "16" ? ' selected' : '') ?>>16</option>
                <option value="17"<?= ($p_B_Day == "17" ? ' selected' : '') ?>>17</option>
                <option value="18"<?= ($p_B_Day == "18" ? ' selected' : '') ?>>18</option>
                <option value="19"<?= ($p_B_Day == "19" ? ' selected' : '') ?>>19</option>
                <option value="20"<?= ($p_B_Day == "20" ? ' selected' : '') ?>>20</option>
                <option value="21"<?= ($p_B_Day == "21" ? ' selected' : '') ?>>21</option>
                <option value="22"<?= ($p_B_Day == "22" ? ' selected' : '') ?>>22</option>
                <option value="23"<?= ($p_B_Day == "23" ? ' selected' : '') ?>>23</option>
                <option value="24"<?= ($p_B_Day == "24" ? ' selected' : '') ?>>24</option>
                <option value="25"<?= ($p_B_Day == "25" ? ' selected' : '') ?>>25</option>
                <option value="26"<?= ($p_B_Day == "26" ? ' selected' : '') ?>>26</option>
                <option value="27"<?= ($p_B_Day == "27" ? ' selected' : '') ?>>27</option>
                <option value="28"<?= ($p_B_Day == "28" ? ' selected' : '') ?>>28</option>
                <option value="29"<?= ($p_B_Day == "29" ? ' selected' : '') ?>>29</option>
                <option value="30"<?= ($p_B_Day == "30" ? ' selected' : '') ?>>30</option>
                <option value="31"<?= ($p_B_Day == "31" ? ' selected' : '') ?>>31</option>
              </select> 日
			</td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>監護人姓名：</td>
            <td><input name="ParentName" type="text" class="form1" id="ParentName" size="12" maxlength="5" value="<?= $p_Parent ?>"></td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>E-mail：</td>
            <td><input name="Email" type="text" class="form1" id="Email" size="40" maxlength="60" value="<?= $p_Email ?>"></td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>家裡電話：</td>
            <td>
			  (<input name="P_Prefix" type="text" class="form1" size="3" maxlength="3" value="<?= $p_P_Prefix ?>">)
              <input name="P_Code" type="text" class="form1" size="11" maxlength="9" value="<?= $p_P_Code ?>">
			</td>
          </tr>
          <tr>
            <td height="24">&nbsp;手機：</td>
            <td><input name="CellPhone" type="text" class="form1" id="CellPhone" size="12" maxlength="11" value="<?= $p_CellPhone ?>"></td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>地址：</td>
            <td><input name="Address" type="text" class="form1" id="Address" size="52" maxlength="150" value="<?= $p_Address ?>"></td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>就讀高中：</td>
            <td><input name="School" type="text" class="form1" id="School" size="30" maxlength="20" value="<?= $p_School ?>"></td>
          </tr>
          <tr>
            <td height="24"><span class="style3">*</span>年級：</td>
            <td>
			  <select name="Grade" class="form2" id="Grade">
                <option value=""></option>
                <option value="1"<?= ($p_Grade == 1 ? ' selected' : '') ?>>一年級</option>
                <option value="2"<?= ($p_Grade == 2 ? ' selected' : '') ?>>二年級</option>
                <option value="3"<?= ($p_Grade == 3 ? ' selected' : '') ?>>三年級</option>
              </select>
			</td>
          </tr>
          <tr>
            <td valign="top" style="padding-top: 4px">&nbsp;自我介紹：<br>
              &nbsp;(請盡量填寫)</td>
            <td><textarea name="Introduction" cols="51" rows="10" class="form1"><?= html_entity_decode(str_replace("\n<br>", "\n", $p_Introduction)) ?></textarea></td>
<?php // html_entity_decode(str_replace("<br>", "\n", $p_Introduction)) ?>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="30">
			  <input name="Submit" type="submit" class="form1" style="height: 24px; padding-top: 2px" value="送出">&nbsp;
              <input name="Reset" type="reset" class="form1" style="height: 24px; padding-top: 2px" value="重新填寫">
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