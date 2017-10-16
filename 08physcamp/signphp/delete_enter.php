<?php

require_once("source/para.php") ;

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>2008 台大物理營 霧裡世界 報名系統</title>
<style type="text/css">
<!--
body {
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
.form1 {
	font-size: 11pt;
	font-family: 細明體;
	padding-left: 4px;
	padding-right: 4px;
}
.form2 {
	font-size: 10pt;
	font-family: 細明體;
}
.style3 {color: #FF0000}
-->
</style></head>

<body onLoad="document.form1.ID.focus();">
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 12px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="148" background="../images/caption_green_2.gif" class="style2">&nbsp;取消報名</td>
        <td width="18" background="../images/caption_green_3.gif"></td>
        <td background="../images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	
<?php
if (time() > $deadline) {
  echo "<p align='center' class='style3' style='text-indent: 0px'>報名已於 " . date("Y/m/d H:i:s", $deadline) . " 截止。</p>" ;
//  echo "<p align='center' style='text-indent: 0px'><a href='JavaScript: history.back();'>回上一頁</a></p>" ;
}
else {
?>	
	
      <br>
	  <form action="delete.php" method="get" name="form1" target="_self">
	    <table width="270" border="0" cellspacing="0" cellpadding="0" style="margin-left: 155px">
          <tr>
            <td width="160" height="24">請輸入身分證字號：</td>
            <td width="110"><input name="ID" type="text" class="form1" id="ID" size="12" maxlength="10"></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
			  <input name="Submit" type="submit" value="取消報名">&nbsp;
              <input name="Reset" type="reset" value="重新輸入">
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
