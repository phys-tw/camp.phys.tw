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
	font-size: 11pt;
	color: #000000;
	font-family: "�ө���";
	background-image: url(images/physcampbg01.jpg);    /*scrollbar-face-color: #6EBF60;
	scrollbar-highlight-color: #D4FFCC;
	scrollbar-darkshadow-color: #6EBF60;
    scrollbar-3dlight-color: #D4FFCC;
	scrollbar-track-color: #D4FFCC;
	scrollbar-arrow-color: #000000;*/
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
/*a:hover {
	text-decoration: underline;
	color: #6EBF60;
}
a:active {
	text-decoration: none;
	color: #6EBF60;
}*/
.style2 {
	font-size: 15pt;
	font-weight: bold;
	font-family: �з���;
	color: #333333;
	padding-top: 4px;
	line-height: 1;
}
.style5 {color: #FF0000}
.style8 {font-size: 18pt}
.style9 {font-size: 12pt}
-->
</style></head>

<body>
<!---->
<span class="style2">&nbsp;<span class="style8">�����W��(���ժ�)</span></span>
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	  <p>�����x�j���z��u�W���W�H�ƭp 3000 �H�A�䤤�k�� 100 �H�B�k�� 2900 �H�C</p>
      <p>�����W�� 100 �H�G (�k�B�k�U 50 �H)</p>
      <p><span class="style5">�䤤�Хܦ�������<img src="images/dot_red.gif" width="12" height="17" align="absmiddle">�̥N��w����״ڡF�Хܦ��Ŧ���<img src="images/dot_blue.gif" width="12" height="17" align="absmiddle">�̥N��w����a���P�N�ѡC</span></p>
      <p>�ƨ��W��̾ڳƨ����ǱƦC�A�ڭ̱N�|�b2007/01/06���ᳰ�򤽧G�ƨ��ɤW���W��C</p>
      <p>��L�Ա��Ш����W�y�{�C</p>
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
    @list($name, $state) = split(',', $buffer) ;
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

      <table border="1" width="740" cellspacing="0" cellpadding="8" style="border-style: solid; border-width: 1px;  margin-top: 6px; margin-bottom: 12px">
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

          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĥ|�p��]</strong></p>
<?= $output['04'] ?>
          </td>
</tr><tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�Ĥ��p��]</strong></p>
<?= $output['05'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�Ĥ��p��]</strong></p>
<?= $output['06'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤC�p��]</strong></p>
<?= $output['07'] ?>
          </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤK�p��]</strong></p>
<?= $output['08'] ?>
		  </td>
</tr><tr>		  
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤE�p��]</strong></p>
<?= $output['09'] ?>
          </td>
           <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�ĤQ�p��]</strong></p>
<?= $output['10'] ?>
          </td>
</table>
<!--�H�U���ƨ��d-->
<p class="style9">&nbsp;<br><strong>�ƨ��W��</strong></p>
<table border="1" width="370" cellspacing="0" cellpadding="8" style="border-style: solid; border-width: 1px;  margin-top: 6px; margin-bottom: 12px">

<td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�k�ͳƨ�]</strong></p>
<?= $output['�ƨ���1'] ?>
          </td>
		  
<td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[�k�ͳƨ�]</strong></p>
<?= $output['�ƨ���2'] ?>
</td>

        </tr>
      </table>

	</div>
	
	
</body>
</html>
