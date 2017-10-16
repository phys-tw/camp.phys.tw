<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>無標題文件</title>
<base target="_parent">
<style type="text/css">
<!--
body {
	background-color: #ECE9D8;
	background-attachment: fixed;
	font-size: 11pt;
	color: #000000;
	font-family: "細明體";
	background-image: url(images/physcampbg01.jpg);    /*scrollbar-face-color: #6EBF60;
	scrollbar-highlight-color: #D4FFCC;
	scrollbar-darkshadow-color: #6EBF60;
    scrollbar-3dlight-color: #D4FFCC;
	scrollbar-track-color: #D4FFCC;
	scrollbar-arrow-color: #000000;*/
}
td {
	font-size: 11pt;
	font-family: 細明體;
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
	font-family: 標楷體;
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
<span class="style2">&nbsp;<span class="style8">錄取名單(測試版)</span></span>
<table width="580" border="0" cellspacing="0" cellpadding="0" style="margin-left: 26px">
  <tr><td>
	
	
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	  <p>本次台大物理營線上報名人數計 3000 人，其中男生 100 人、女生 2900 人。</p>
      <p>正取名單 100 人： (男、女各 50 人)</p>
      <p><span class="style5">其中標示有紅色圈圈<img src="images/dot_red.gif" width="12" height="17" align="absmiddle">者代表已收到匯款；標示有藍色圈圈<img src="images/dot_blue.gif" width="12" height="17" align="absmiddle">者代表已收到家長同意書。</span></p>
      <p>備取名單依據備取順序排列，我們將會在2007/01/06之後陸續公佈備取補上的名單。</p>
      <p>其他詳情請見報名流程。</p>
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
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第一小隊]</strong></p>
<?= $output['01'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第二小隊]</strong></p>
<?= $output['02'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第三小隊]</strong></p>
<?= $output['03'] ?>
		  </td>

          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第四小隊]</strong></p>
<?= $output['04'] ?>
          </td>
</tr><tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第五小隊]</strong></p>
<?= $output['05'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第六小隊]</strong></p>
<?= $output['06'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第七小隊]</strong></p>
<?= $output['07'] ?>
          </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第八小隊]</strong></p>
<?= $output['08'] ?>
		  </td>
</tr><tr>		  
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第九小隊]</strong></p>
<?= $output['09'] ?>
          </td>
           <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第十小隊]</strong></p>
<?= $output['10'] ?>
          </td>
</table>
<!--以下為備取攔-->
<p class="style9">&nbsp;<br><strong>備取名單</strong></p>
<table border="1" width="370" cellspacing="0" cellpadding="8" style="border-style: solid; border-width: 1px;  margin-top: 6px; margin-bottom: 12px">

<td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[男生備取]</strong></p>
<?= $output['備取欄1'] ?>
          </td>
		  
<td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[女生備取]</strong></p>
<?= $output['備取欄2'] ?>
</td>

        </tr>
      </table>

	</div>
	
	
</body>
</html>
