<?php
  header("Expires: Sat, 1 Jan 2000 00:00:00 GMT") ;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>查詢報名資料</title>
<style type="text/css">
<!--
body {
	background-color: #AAAAAA;
	margin-left: 4px;
	margin-top: 10px;
	margin-right: 4px;
	margin-bottom: 10px;
	font-size: 10pt;
	color: #000000;
	font-family: 細明體;
}
td {
	font-size: 10pt;
	font-family: 細明體;
	background-color: #FFFFFF ;
}
th {
	font-size: 10pt;
	font-family: 細明體;
	background-color: #CCCCCC;
	text-align: left;
}
p {
    margin-top: 0px;
	margin-bottom: 0px;
}
select {
	font-size: 9pt;
	font-family: 細明體;
}
input {
	font-size: 9pt;
	font-family: 細明體;
}
.input2 {
	font-size: 8pt;
	font-family: 細明體;
	margin-top: -1px;
	margin-bottom: -1px;
}
a {
	color: #000000;
	text-decoration: none;
}
a:hover {
	color: #880000;
	text-decoration: underline;
}
-->
</style>
</head>
<body>

<?php

$sysop = false ;//
if (array_key_exists('password', $_POST))//告訴電腦在$_POST陣列中, 'password'這個陣列鍵是否存在
  if ($_POST['password'] == "campregadmin")
    $sysop = true ;

if ($sysop) {
  if ((! array_key_exists('list_sex', $_POST)) || $_POST['list_sex'] == '') $list_sex = -1 ; else $list_sex = $_POST['list_sex'] ; //決定list_sex之值(顯示男女生)
  if (! array_key_exists('list_state', $_POST))
    $list_state = 6 ;//未刪除
  else if ($_POST['list_state'] == '')
    $list_state = -1 ;//空白和-1的為全部狀態
  else
    $list_state = $_POST['list_state'] ;
  if ((! array_key_exists('list_team', $_POST)) || $_POST['list_team'] == '') $list_team = -1 ; else $list_team = $_POST['list_team'] ;
  if ((! array_key_exists('list_remit', $_POST)) || $_POST['list_remit'] == '') $list_remit = -1 ; else $list_remit = $_POST['list_remit'] ;
  if (! array_key_exists('sort1', $_POST)) {
    $sort1 = 'SignTime' ;
    $sort2 = '' ;
    $sort3 = '' ;
    $sort4 = '' ;
  }
  else {
    if ($_POST['sort1'] == '') $sort1 = '' ; else $sort1 = $_POST['sort1'] ;
    if ((! array_key_exists('sort2', $_POST)) || $_POST['sort2'] == '') $sort2 = '' ; else $sort2 = $_POST['sort2'] ;
    if ((! array_key_exists('sort3', $_POST)) || $_POST['sort3'] == '') $sort3 = '' ; else $sort3 = $_POST['sort3'] ;
    if ((! array_key_exists('sort4', $_POST)) || $_POST['sort4'] == '') $sort4 = '' ; else $sort4 = $_POST['sort4'] ;
  }
  require_once("source/db.php") ;
  require_once("source/para.php") ;
  $db = new DB;
  if (! $db->open())
    die($db->error()) ;
  $p_SQL = "" ;

  $where_or_and = " Where " ;
  if ($list_sex != -1) {
	$p_SQL = $p_SQL . $where_or_and . "Sex = " . $list_sex ;
	$where_or_and = " And " ;
  }
  if ($list_state != -1) {
    if ($list_state == 6)
	  $p_SQL = $p_SQL . $where_or_and . "(State = 0 Or State = 1 Or State = 2 Or State = 3)" ;
	else if ($list_state == 7)
	  $p_SQL = $p_SQL . $where_or_and . "(State = 1 Or State = 2)" ;
	else if ($list_state == 8)
	  $p_SQL = $p_SQL . $where_or_and . "(State = 0 Or State = 3)" ;
	else
	  $p_SQL = $p_SQL . $where_or_and . "State = " . $list_state ;
	$where_or_and = " And " ;
  }
  if ($list_team != -1) {
    if ($list_team == -2)
	  $p_SQL = $p_SQL . $where_or_and . "Team = 0" ;
	else
      $p_SQL = $p_SQL . $where_or_and . "Team = " . $list_team ;
	$where_or_and = " And " ;
  }
  if ($list_remit != -1)
	$p_SQL = $p_SQL . $where_or_and . "isRemitted = " . $list_remit ;
  if ($sort1 != '') {
	if ($sort1[0] == '@')
	  $p_SQL = $p_SQL . " Order By " . substr($sort1, 1) . " Desc" ;
	else
	  $p_SQL = $p_SQL . " Order By " . $sort1 ;
    if ($sort2 != '') {
	  if ($sort2[0] == '@')
	    $p_SQL = $p_SQL . ", " . substr($sort2, 1) . " Desc" ;
      else
	    $p_SQL = $p_SQL . ", " . $sort2 ;
      if ($sort3 != '') {
	    if ($sort3[0] == '@')
	      $p_SQL = $p_SQL . ", " . substr($sort3, 1) . " Desc" ;
		else
	      $p_SQL = $p_SQL . ", " . $sort3 ;
        if ($sort4 != '') {
	      if ($sort4[0] == '@')
	        $p_SQL = $p_SQL . ", " . substr($sort4, 1) . " Desc" ;
		  else
	        $p_SQL = $p_SQL . ", " . $sort4 ;
        }
	  }
    }
  }
//  else
//	$p_SQL = $p_SQL . " Order By SignTime" ;

  if (! $db->query("Select Count(AutoNo) As Row_number From $dataTableName" . $p_SQL))
    die($db->error()) ;
  $fetch_Assoc = $db->fetchAssoc() ;
  $row_number = $fetch_Assoc['Row_number'] ;
  
  $sort_item = array('SignTime', '@SignTime', 'Name', '@Name', 'Sex', '@Sex', 'ID', '@ID',
                     'Birthday', '@Birthday', 'Parent', '@Parent', 'Email', '@Email', 'Phone', '@Phone',
                     'CellPhone', '@CellPhone', 'School', '@School', 'Grade', '@Grade', 'State', '@State', 
			         'isRemitted', '@isRemitted', 'Team', '@Team') ;
  $sort_show = array('報名時間　[順]', '報名時間　[反]', '姓名　　　[順]', '姓名　　　[反]', '性別　　　[順]', '性別　　　[反]', '身分證字號[順]', '身分證字號[反]', 
                     '出生年月日[順]', '出生年月日[反]', '監護人　　[順]', '監護人　　[反]', 'E-mail　　[順]', 'E-mail　　[反]', '電話　　　[順]', '電話　　　[反]',
                     '手機　　　[順]', '手機　　　[反]', '就讀高中　[順]', '就讀高中　[反]', '年級　　　[順]', '年級　　　[反]', '狀態　　　[順]', '狀態　　　[反]', 
					 '是否匯款　[順]', '是否匯款　[反]', '小隊　　　[順]', '小隊　　　[反]') ;
  echo "<form action='list.php' method='post' name='form_top'>" ;
  echo "<p align='center'>僅列出：<select name='list_sex' id='list_sex' onChange='document.form_top.submit();'>" ;
  echo "<option value=''", ($list_sex == -1 ? ' selected' : ''), ">全部性別</option>" ;
  for ($j = 1 ; $j <= 2 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_sex ? ' selected' : ''), ">", $Sex_code[$j], "</option>" ;
  echo "</select> <select name='list_state' id='list_state' onChange='document.form_top.submit();'>" ;
  echo "<option value=''", ($list_state == -1 ? ' selected' : ''), ">全部狀態</option>" ;
  echo "<option value='0'", (0 == $list_state ? ' selected' : ''), ">(未設定)</option>" ;
  for ($j = 1 ; $j <= 3 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_state ? ' selected' : ''), ">", $State_code[$j], "</option>" ;
  echo "<option value='6'", (6 == $list_state ? ' selected' : ''), ">未刪除</option>" ;
  echo "<option value='7'", (7 == $list_state ? ' selected' : ''), ">錄取與備取</option>" ;
  echo "<option value='8'", (8 == $list_state ? ' selected' : ''), ">未錄取與未設定</option>" ;
  echo "<option value='9'", (9 == $list_state ? ' selected' : ''), ">", $State_code[9], "</option>" ;
  echo "</select> <select name='list_team' id='list_team' onChange='document.form_top.submit();'>" ;
  echo "<option value=''", ($list_team == -1 ? ' selected' : ''), ">不分小隊</option>" ;
  for ($j = 1 ; $j <= 10 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_team ? ' selected' : ''), ">第", $Team_code[$j], "小隊</option>" ;
  echo "<option value='-2'", ($list_team == -2 ? ' selected' : ''), ">未指定小隊</option>" ;
  echo "</select> <select name='list_remit' id='list_remit' onChange='document.form_top.submit();'>" ;
  echo "<option value=''", ($list_remit == -1 ? ' selected' : ''), ">不論匯款與否</option>" ;
  for ($j = 0 ; $j <= 1 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_remit ? ' selected' : ''), ">", $Remit_code[$j], "</option>" ;
  echo "</select>　總共 ", $row_number, " 筆資料。</p><p align='center'>排序依據１：<select name='sort1' id='sort1'>" ;
  echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> 依據２：<select name='sort2' id='sort2'>" ;
  echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> 依據３：<select name='sort3' id='sort3'>" ;
  echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> 依據４：<select name='sort4' id='sort4'>" ;
  echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select>" ;
  echo "　<input type='submit' value='執行' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
  echo "</form>" ;

  echo "<div style='position:relative; z-index:1; left: 10px; top: -70px'>" ;
  echo "<form action='view.php' method='post' name='form_view_top' target='new_view'>" ;
  echo "<input type='hidden' name='list_sex' value='", $list_sex, "'></p>" ;
  echo "<input type='hidden' name='list_state' value='", $list_state, "'></p>" ;
  echo "<input type='hidden' name='list_team' value='", $list_team, "'></p>" ;
  echo "<input type='hidden' name='list_remit' value='", $list_remit, "'></p>" ;
  echo "<input type='hidden' name='sort1' value='", $sort1, "'></p>" ;
  echo "<input type='hidden' name='sort2' value='", $sort2, "'></p>" ;
  echo "<input type='hidden' name='sort3' value='", $sort3, "'></p>" ;
  echo "<input type='hidden' name='sort4' value='", $sort4, "'></p>" ;
  echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
  echo "<input type='submit' value='查看完整資料' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "</form>" ;
  echo "</div>" ;

//  echo "Select * From $dataTableName" . $p_SQL ;
  if (! $db->query("Select * From $dataTableName" . $p_SQL))
    die($db->error()) ;

  echo "<form action='list_save.php' method='post' name='form_data' style='margin-top: -50px'>" ;
  echo "<p style='margin-left: 135px; margin-bottom: 4px'>" ;
  echo "<select name='list_action' id='list_action' style='margin-bottom: 3px'>" ;
  echo "<option value='save' selected>儲存變更</option>" ;
  echo "<option value='mail'>群組寄信名單</option>" ;
  echo "<option value='address'>列印郵寄地址</option>" ;
  echo "</select>" ;
  echo " <input type='submit' value='執行' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "</p>" ;

  echo "<input type='hidden' name='list_sex' value='", $list_sex, "'></p>" ;
  echo "<input type='hidden' name='list_state' value='", $list_state, "'></p>" ;
  echo "<input type='hidden' name='list_team' value='", $list_team, "'></p>" ;
  echo "<input type='hidden' name='list_remit' value='", $list_remit, "'></p>" ;
  echo "<input type='hidden' name='sort1' value='", $sort1, "'></p>" ;
  echo "<input type='hidden' name='sort2' value='", $sort2, "'></p>" ;
  echo "<input type='hidden' name='sort3' value='", $sort3, "'></p>" ;
  echo "<input type='hidden' name='sort4' value='", $sort4, "'></p>" ;
  echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;

  echo "<table width='990' border='1' cellspacing='0' cellpadding='0'><tr><td style='background-color: #AAAAAA'>";
  echo "<table width='990' border='0'><tr>" ;
  echo "<th width='35'>&nbsp;</td>";
  
  /*此段停用 這三格改為一個的編號
  echo "<th width='17'>&nbsp;</td>";
  echo "<th width='17'>&nbsp;</td>";
  echo "<th width='17'>&nbsp;</td>";
  */
  
  //下一行為上一段的取代
  echo "<th width='59'>流水號</td>";

  echo "<th width='67'>狀態</td>";
  echo "<th width='20'>匯款</td>";
  echo "<th width='43'>小隊</td>";
  echo "<th width='60'>姓名</td>";
  echo "<th width='20'>性別</td>";
  echo "<th width='75'>身分證字號</td>";
  echo "<th width='75'>生日</td>";
  echo "<th width='95'>電話</td>";
  echo "<th width='85'>手機</td>";
  echo "<th>就讀高中</td>";
  echo "<th width='20'>年級</td>";
  echo "<th width='105'>報名時間</td>";
  echo "</tr></table>" ;

  $i = 0 ;
  $n = 0 ;
  while ($fetch_Assoc = $db->fetchAssoc()) {
    $i++ ;

	if ($fetch_Assoc['State'] == 1)
      $background = "#99FF99" ;
	else if ($fetch_Assoc['State'] == 2)
      $background = "#A4EDFF" ;
	else if ($fetch_Assoc['State'] == 3)
      $background = "#FFFF88" ;
	else
      $background = "" ;
    echo "<table width='990' border='0'><tr>" ;
    if ($fetch_Assoc['State'] == 9)
	  echo "<th width='35' height='19' style='text-align: center; background-color: #FF8888'>", $i, "</td>" ;
	else if ($fetch_Assoc['State'] == 1)
	  echo "<th width='35' style='text-align: center; background-color: #99FF99'>", $i, "</td>" ;
	else if ($fetch_Assoc['State'] == 2)
	  echo "<th width='35' style='text-align: center; background-color: #A4EDFF'>", $i, "</td>" ;
	else
	  echo "<th width='35' style='text-align: center; background-color: #FFFF88'>", $i, "</td>" ;

	//下一行本版停用
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('view.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=1002,height=300,scrollbars=no,resizable=yes');\"><img src='images/browse.png' width='16' height='16' border='0' alt='查看完整資料'></a></td>" ;
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:'', 'width=1002,height=300,scrollbars=no,resizable=yes');\"><img src='images/browse.png' width='16' height='16' border='0' alt='查看完整資料 本功能暫時停用 請使用上方按鈕代替 謝謝 ^^'></a></td>" ;
	//上一行為查看完整資料
	
	//下一行為未固定格式的編號 ver1.7停用
	//echo "|Number:",$fetch_Assoc['AutoNo'];
	
	//下一段為固定格式編號(流水號) ver1.7後啟用
	echo "<th width='59' style='text-align: center; background-color: ", $background, "'>",$fetch_Assoc['AutoNo'] ,"</td>";
	
	
	
	//下一行本版停用
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_edit.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=744,height=262,scrollbars=no,resizable=no');\"><img src='images/edit.png' width='16' height='16' border='0' alt='編輯特定欄位'></a></td>" ;
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript: '', 'width=744,height=262,scrollbars=no,resizable=no');\"><img src='images/edit.png' width='16' height='16' border='0' alt='編輯特定欄位 本功能暫時停用 ∵還不能解決這裡的安全性問題... 有需要請洽peter53 我會將不安全版的給你...XD '></a></td>" ;
	//上一行為編輯特定欄位
	/*
	if ($fetch_Assoc['State'] != 9)
		//下一行本版停用
	  //echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_delete.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/delete.png' width='16' height='16' border='0' alt='刪除此筆資料'></a></td>" ;
	  echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript: '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/delete.png' width='16' height='16' border='0' alt='刪除此筆資料 停用理由同左 再次說聲抱歉 Orz... 不過右方的錄取、匯款與否等選單皆可正常運作 - peter53'></a></td>" ;
	  //上一行為刪除此筆資料
	else
		//下一行本版停用
	  //echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_un_delete.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/un_delete.png' width='16' height='16' border='0' alt='恢復此筆資料'></a></td>" ;
	  echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_un_delete.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/un_delete.png' width='16' height='16' border='0' alt='恢復此筆資料  停用理由同左 再次說聲抱歉 Orz... 不過右方的錄取、匯款與否等選單皆可正常運作 - peter53'></a></td>" ;
	  //上一行為恢復此筆資料
	  */
	  
	if ($fetch_Assoc['State'] != 9) {
	  echo "<td width='67' style='background-color: ", $background, "'><select name='State[", $n, "]' class='input2'>" ;
	  for ($j = 0 ; $j <= 3 ; $j++)
	    echo "<option value='", $j, "'", ($j == $fetch_Assoc['State'] ? ' selected' : ''), ">", $State_code[$j], "</option>" ;
	  echo "</select></td>" ;
	  echo "<td width='20' style='background-color: ", $background, "'><input type='checkbox' name='isRemitted[", $n, "]' class='input2'", (1 == $fetch_Assoc['isRemitted'] ? ' checked' : ''), "></td>" ;
	  echo "<td width='43' style='background-color: ", $background, "'><select name='Team[", $n, "]' class='input2'>" ;
	  for ($j = 0 ; $j <= 10 ; $j++)
	    echo "<option value='", $j, "'", ($j == $fetch_Assoc['Team'] ? ' selected' : ''), ">", $Team_code[$j], "</option>" ;
	  echo "</select></td>" ;
	}
	else
	  echo "<th width='138' style='background-color: ", $background, "'>", $fetch_Assoc['Reason'], "</td>" ;	
	echo "<td width='60' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('view.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=1002,height=300,scrollbars=no,resizable=yes');\">", $fetch_Assoc['Name'], "</a></td>" ;
	echo "<td width='20' style='background-color: ", $background, "'>", $Sex_code[$fetch_Assoc['Sex']], "</td>" ;
	echo "<td width='75' style='background-color: ", $background, "'>", $fetch_Assoc['ID'], "</td>" ;
	echo "<td width='75' style='background-color: ", $background, "'>", date("Y/m/d", strtotime($fetch_Assoc['Birthday'])), "</td>" ;
	echo "<td width='95' style='background-color: ", $background, "'>", $fetch_Assoc['Phone'], "</td>" ;
	echo "<td width='85' style='background-color: ", $background, "'>", $fetch_Assoc['CellPhone'], "</td>" ;
	echo "<td style='background-color: ", $background, "'>", $fetch_Assoc['School'], "</td>" ;
	echo "<td width='20' style='background-color: ", $background, "'>", $Grade_code[$fetch_Assoc['Grade']], "</td>" ;
	echo "<td width='105' style='background-color: ", $background, "'>", date("m/d H:i:s", strtotime($fetch_Assoc['SignTime'])), "</td>" ;

	if ($fetch_Assoc['State'] != 9) {
	  echo "<input type='hidden' name='AutoNo[", $n, "]' value='", $fetch_Assoc['AutoNo'], "'>" ;
      $n++ ;
	}
    echo "</tr></table>" ;
  }

  echo "</td></tr></table>";
  echo "<p style='margin-left: 135px; margin-top: 4px'><input type='submit' value='執行' style='font-size: 10pt; padding-top: 2px'></p>" ;
  echo "<br></form>" ;
  
  echo "<form action='list.php' method='post' name='form_bottom'>" ;
  echo "<p align='center'>僅列出：<select name='list_sex' id='list_sex' onChange='document.form_bottom.submit();'>" ;
  echo "<option value=''", ($list_sex == -1 ? ' selected' : ''), ">全部性別</option>" ;
  for ($j = 1 ; $j <= 2 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_sex ? ' selected' : ''), ">", $Sex_code[$j], "</option>" ;
  echo "</select> <select name='list_state' id='list_state' onChange='document.form_bottom.submit();'>" ;
  echo "<option value=''", ($list_state == -1 ? ' selected' : ''), ">全部狀態</option>" ;
  echo "<option value='0'", (0 == $list_state ? ' selected' : ''), ">(未設定)</option>" ;
  for ($j = 1 ; $j <= 3 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_state ? ' selected' : ''), ">", $State_code[$j], "</option>" ;
  echo "<option value='6'", (6 == $list_state ? ' selected' : ''), ">未刪除</option>" ;
  echo "<option value='7'", (7 == $list_state ? ' selected' : ''), ">錄取與備取</option>" ;
  echo "<option value='8'", (8 == $list_state ? ' selected' : ''), ">未錄取與未設定</option>" ;
  echo "<option value='9'", (9 == $list_state ? ' selected' : ''), ">", $State_code[9], "</option>" ;
  echo "</select> <select name='list_team' id='list_team' onChange='document.form_bottom.submit();'>" ;
  echo "<option value=''", ($list_team == -1 ? ' selected' : ''), ">不分小隊</option>" ;
  for ($j = 1 ; $j <= 10 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_team ? ' selected' : ''), ">第", $Team_code[$j], "小隊</option>" ;
  echo "<option value='-2'", ($list_team == -2 ? ' selected' : ''), ">未指定小隊</option>" ;
  echo "</select> <select name='list_remit' id='list_remit' onChange='document.form_bottom.submit();'>" ;
  echo "<option value=''", ($list_remit == -1 ? ' selected' : ''), ">不論匯款與否</option>" ;
  for ($j = 0 ; $j <= 1 ; $j++)
    echo "<option value='", $j, "'", ($j == $list_remit ? ' selected' : ''), ">", $Remit_code[$j], "</option>" ;
  echo "</select>　總共 ", $row_number, " 筆資料。</p><p align='center'>排序依據１：<select name='sort1' id='sort1'>" ;
  echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> 依據２：<select name='sort2' id='sort2'>" ;
  echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> 依據３：<select name='sort3' id='sort3'>" ;
  echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> 依據４：<select name='sort4' id='sort4'>" ;
  echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">─</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select>" ;
  echo "　<input type='submit' value='執行' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
  echo "</form>" ;

  echo "<div style='position:relative; z-index:1; left: 10px; top: -70px'>" ;
  echo "<form action='view.php' method='post' name='form_view_bottom' target='new_view'>" ;
  echo "<input type='hidden' name='list_sex' value='", $list_sex, "'></p>" ;
  echo "<input type='hidden' name='list_state' value='", $list_state, "'></p>" ;
  echo "<input type='hidden' name='list_team' value='", $list_team, "'></p>" ;
  echo "<input type='hidden' name='list_remit' value='", $list_remit, "'></p>" ;
  echo "<input type='hidden' name='sort1' value='", $sort1, "'></p>" ;
  echo "<input type='hidden' name='sort2' value='", $sort2, "'></p>" ;
  echo "<input type='hidden' name='sort3' value='", $sort3, "'></p>" ;
  echo "<input type='hidden' name='sort4' value='", $sort4, "'></p>" ;
  echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
  echo "<input type='submit' value='查看完整資料' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "</form>" ;
  
  //開新視窗以編輯資料
  echo "<br>修改報名資料 請輸入流水號後按enter 會開啟一修改資料之新視窗<br>請務必核對所開啟之視窗內容與你所選取之內容是否相同！ thanks ^";
  echo "<script language=\"javascript\">function newpage() {document.form.submit();}</script><form name=\"form01\" method=\"post\" action=\"sysop_edit.php\" target=\"newpage\" ><input type=\"text\" name=\"no\"><input type=\"hidden\" name=\"password\" value=\"campregadmin\"><input type=\"button\" onclick=\"newpage()\" value=\"送出\"></form>";
  
  echo "<br><----------------------------------------------------------------------------->";
  
	
  echo "</div>" ;

  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>
