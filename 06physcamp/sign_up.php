<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>�L���D���</title>
<base target="_parent">
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
	background-attachment: fixed;
	margin-left: 0px;
	margin-top: 2px;
	margin-right: 0px;
	margin-bottom: 2px;
	background-image: url(images/box_middle_green.gif);
	font-size: 11pt;
	color: #1C660F;
	font-family: �ө���;
    scrollbar-face-color: #6EBF60;
	scrollbar-highlight-color: #D4FFCC;
	scrollbar-darkshadow-color: #6EBF60;
    scrollbar-3dlight-color: #D4FFCC;
	scrollbar-track-color: #D4FFCC;
	scrollbar-arrow-color: #000000;
}
td {
	font-size: 11pt;
	font-family: �ө���;
}
p {
    margin-top: 6px;
	margin-bottom: 6px;
	text-indent: 32px;
}
ul {
    margin-top: 6px;
    margin-bottom: 6px;
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
	font-family: �з���;
	color: #D4FFCC;
	padding-top: 4px;
	line-height: 1;
}
.style3 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-style: italic;
}
.style4 {
	font-family: Arial;
	font-weight: bold;
	text-decoration: underline;
}
.style5 {color: #FF0000}
.style6 {
	text-decoration: line-through;
	color: #777777
}
-->
</style></head>

<body>
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20" background="images/caption_green_1.gif"></td>
        <td width="104" background="images/caption_green_2.gif" class="style2">&nbsp;�����W��</td>
        <td width="18" background="images/caption_green_3.gif"></td>
        <td background="images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	  <p>�����x�j���z��u�W���W�H�ƭp 298 �H�A�䤤�k�� 133 �H�B�k�� 165 �H�C</p>
      <p>�����W�� 100 �H�G (�k�B�k�U 50 �H)</p>
      <p><span class="style5">�`�N�G���W�椤�w�]�t�ƨ��ɤW�̡A���D�A���ƨ��ɤW�̩����A�_�h�W��N���A�ܧ�C�䤤�Хܦ�������<img src="images/dot_red.gif" width="12" height="17" align="absmiddle">�̥N��w����״ڡF�Хܦ��Ŧ���<img src="images/dot_blue.gif" width="12" height="17" align="absmiddle">�̥N��w����a���P�N�ѡC</span></p>

<?php
$handle = fopen("list.txt", "r") ;
while (! feof($handle)) {
  $buffer = fgets($handle);
  if ($buffer[0] == '[') {
    $final_pos = strpos($buffer, ']') ;
    $area = substr($buffer, 1, $final_pos - 1) ;
    $output[$area] = "" ;
  }
  else {
    list($name, $state) = split(',', $buffer) ;
    if ($state == 9)
	  $output[$area] = $output[$area] . "<span class='style6'>" ;
	$output[$area] = $output[$area] . $name ;
    if ($state == 9)
	  $output[$area] = $output[$area] . "</span>" ;
	if ($state == 1 || $state == 3)
	  $output[$area] = $output[$area] . "<img src='images/dot_red.gif' width='12' height='17' align='absmiddle'>" ;
	if ($state == 2 || $state == 3)
	  $output[$area] = $output[$area] . "<img src='images/dot_blue.gif' width='12' height='17' align='absmiddle'>" ;
    $output[$area] = $output[$area] . "<br>" ;	  
  }
}
fclose($handle) ;
?>

      <table border="1" width="573" cellspacing="0" cellpadding="8" style="border-style: solid; border-width: 1px; border-color: #6EBF60; margin-top: 6px; margin-bottom: 12px">
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�Ĥ@�p��]</strong></p>
<?= $output['01'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤG�p��]</strong></p>
<?= $output['02'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤT�p��]</strong></p>
<?= $output['03'] ?>
		  </td>
        </tr>
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĥ|�p��]</strong></p>
<?= $output['04'] ?>
          </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�Ĥ��p��]</strong></p>
<?= $output['05'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�Ĥ��p��]</strong></p>
<?= $output['06'] ?>
		  </td>
        </tr>
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤC�p��]</strong></p>
<?= $output['07'] ?>
          </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤK�p��]</strong></p>
<?= $output['08'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤE�p��]</strong></p>
<?= $output['09'] ?>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤQ�p��]</strong></p>
<?= $output['10'] ?>
          </td>
        </tr>
      </table>

	</div>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20" background="images/caption_green_1.gif"></td>
        <td width="148" background="images/caption_green_2.gif" class="style2">&nbsp;<a name="procedure" style="color: #D4FFCC">���W�y�{�ѻ�</a></td>
        <td width="18" background="images/caption_green_3.gif"></td>
        <td background="images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
      <table border="1" width="573" cellspacing="0" cellpadding="0" style="border-style: solid; border-width: 1px; border-color: #6EBF60; margin-top: 6px; margin-bottom: 12px">
        <tr>
          <th width="85" height="45" align="center"><span class="style3">Step 1 </span></th>
          <td width="482" align="left" style="padding: 8px"><span class="style4">2005/12/18 (��)</span> �e�иԲӶ���W��A���W�e�нT�w�����P�N�C</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 2</th>
          <td align="left" style="padding: 8px"><span class="style4">2005/12/24 (��)</span> �e�|�b�����W���G�����W�� 100 �H�γƨ��W�� 30 �H�C</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 3</th>
          <td align="left" style="padding: 8px">�����W�椽�G��ڭ̷|�H�o E-mail �ήѭ��������q���A���e�]�t�״ڤ�k�ήa���P�N�ѵ��C�Х����̩� <span class="style4">2006/01/02 (�@)</span> �e�N���W�O�״ڦܫ��w�b�� (�ƨ��̤@�˷|����q���A���|����ú�O) �A�O���h�������ѥ[�A�ůʱN�ѳƨ��̻��ɡC</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 4</th>
          <td align="left" style="padding: 8px"><span class="style4">2006/01/05 (�|)</span> �e�|�T�w�ƨ��ɤW�W��A�ýгƨ��ɤW�̾��tú�O�����C</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 5</th>
          <td align="left" style="padding: 8px"><span class="style4">2006/02/06 ~ 02/10</span> �O�o�Ӱѥ[�w�֪��x�j���z���I</td>
        </tr>
      </table>
	</div>
	
	<table width="574" height="6" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td background="images/caption_green_5.gif"></td>
      </tr>
    </table>

  </td>
  </tr>
</table>
</body>
</html>
