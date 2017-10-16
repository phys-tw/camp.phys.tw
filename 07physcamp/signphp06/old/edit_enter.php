<?php

require_once("source/para.php") ;

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
-->
</style></head>

<body onLoad="document.form1.ID.focus();">
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20" background="../images/caption_green_1.gif"></td>
        <td width="148" background="../images/caption_green_2.gif" class="style2">&nbsp;修改報名資料</td>
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
else {
?>	
	
      <br>
	  <form action="sign_up_form.php" method="get" name="form1" target="_self">
	    <table width="270" border="0" cellspacing="0" cellpadding="0" style="margin-left: 155px">
          <tr>
            <td width="160" height="24">請輸入身分證字號：</td>
            <td width="110"><input name="ID" type="text" class="form1" id="ID" size="12" maxlength="10"></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
			  <input name="Submit" type="submit" class="form1" style="height: 24px; padding-top: 2px" value="查詢資料">&nbsp;
              <input name="Reset" type="reset" class="form1" style="height: 24px; padding-top: 2px" value="重新輸入">
			</td>
          </tr>
        </table>
	  </form>
      <br>
	  
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