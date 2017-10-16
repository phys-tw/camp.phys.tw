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
	margin-left: 0px;
	margin-top: 2px;
	margin-right: 0px;
	margin-bottom: 2px;
	background-image: url(images/box_middle_green.gif);
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
	font-family: 標楷體;
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
        <td width="104" background="images/caption_green_2.gif" class="style2">&nbsp;錄取名單</td>
        <td width="18" background="images/caption_green_3.gif"></td>
        <td background="images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
	  <p>本次台大物理營線上報名人數計 298 人，其中男生 133 人、女生 165 人。</p>
      <p>正取名單 100 人： (男、女各 50 人)</p>
      <p><span class="style5">注意：本名單中已包含備取補上者，除非再有備取補上者放棄資格，否則名單將不再變更。其中標示有紅色圈圈<img src="images/dot_red.gif" width="12" height="17" align="absmiddle">者代表已收到匯款；標示有藍色圈圈<img src="images/dot_blue.gif" width="12" height="17" align="absmiddle">者代表已收到家長同意書。</span></p>

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
        </tr>
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第四小隊]</strong></p>
<?= $output['04'] ?>
          </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第五小隊]</strong></p>
<?= $output['05'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第六小隊]</strong></p>
<?= $output['06'] ?>
		  </td>
        </tr>
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第七小隊]</strong></p>
<?= $output['07'] ?>
          </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第八小隊]</strong></p>
<?= $output['08'] ?>
		  </td>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第九小隊]</strong></p>
<?= $output['09'] ?>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top">
<p style="margin-left: 6px; text-indent: 0px; margin-top: 0px; margin-bottom: 4px"><strong>[第十小隊]</strong></p>
<?= $output['10'] ?>
          </td>
        </tr>
      </table>

	</div>
	
	<table width="574" height="26" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20" background="images/caption_green_1.gif"></td>
        <td width="148" background="images/caption_green_2.gif" class="style2">&nbsp;<a name="procedure" style="color: #D4FFCC">報名流程解說</a></td>
        <td width="18" background="images/caption_green_3.gif"></td>
        <td background="images/caption_green_4.gif">&nbsp;</td>
      </tr>
    </table>
	
	<div style="margin-top: 12px; margin-bottom: 8px">
      <table border="1" width="573" cellspacing="0" cellpadding="0" style="border-style: solid; border-width: 1px; border-color: #6EBF60; margin-top: 6px; margin-bottom: 12px">
        <tr>
          <th width="85" height="45" align="center"><span class="style3">Step 1 </span></th>
          <td width="482" align="left" style="padding: 8px"><span class="style4">2005/12/18 (日)</span> 前請詳細填報名表，報名前請確定父母同意。</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 2</th>
          <td align="left" style="padding: 8px"><span class="style4">2005/12/24 (六)</span> 前會在網站上公佈正取名單 100 人及備取名單 30 人。</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 3</th>
          <td align="left" style="padding: 8px">錄取名單公佈後我們會寄發 E-mail 及書面的錄取通知，內容包含匯款方法及家長同意書等。請正取者於 <span class="style4">2006/01/02 (一)</span> 前將報名費匯款至指定帳號 (備取者一樣會收到通知，但尚不需繳費) ，逾期則視為放棄參加，空缺將由備取者遞補。</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 4</th>
          <td align="left" style="padding: 8px"><span class="style4">2006/01/05 (四)</span> 前會確定備取補上名單，並請備取補上者儘速繳費完畢。</td>
        </tr>
        <tr>
          <th height="45" align="center" class="style3">Step 5</th>
          <td align="left" style="padding: 8px"><span class="style4">2006/02/06 ~ 02/10</span> 記得來參加歡樂的台大物理營唷！</td>
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
