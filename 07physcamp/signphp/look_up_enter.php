<?php

require_once("source/para.php") ;

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>�L���D���</title>
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
	font-family: �ө���;
}
td {
	font-size: 11pt;
	font-family: �ө���;
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
	font-family: �з���;
	padding-top: 4px;
	line-height: 1;
}
.form1 {
	font-size: 11pt;
	font-family: �ө���;
	padding-left: 4px;
	padding-right: 4px;
}
.form2 {
	font-size: 10pt;
	font-family: �ө���;
}
.style3 {color: #FF0000}
-->
</style></head>

<body onLoad="document.form1.ID.focus();">
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	<table width="148" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="148" background="../images/caption_green_2.gif" class="style2">&nbsp;�d�߳��W���</td>
        </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	
<?php
if (time() > $deadline) {
  echo "<p align='center' class='style3' style='text-indent: 0px'>���W�w�� " . date("Y/m/d H:i:s", $deadline) . " �I��C</p>" ;
  echo "<p align='center' style='text-indent: 0px'><a href='JavaScript: history.back();'>�^�W�@��</a></p>" ;
}
else {
?>	
	
      <br>
	  <form action="look_up.php" method="get" name="form1" target="_self">
	    <table width="270" border="0" cellspacing="0" cellpadding="0" style="margin-left: 155px">
          <tr>
            <td width="160" height="24">�п�J�����Ҧr���G</td>
            <td width="110"><input name="ID" type="text" class="form1" id="ID" size="12" maxlength="10"></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
			  <input name="Submit" type="submit" class="form1" style="height: 24px; padding-top: 2px" value="�d�߸��">&nbsp;
              <input name="Reset" type="reset" class="form1" style="height: 24px; padding-top: 2px" value="���s��J">
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