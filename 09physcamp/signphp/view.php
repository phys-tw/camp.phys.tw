<?php
function endSession(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-90000, '/');
	session_destroy();
}
session_save_path ('../session');
session_start();
$sysop=false;
$sysop = ($_SESSION['auth']=="reg_SYSOP");
if(time()-$_SESSION['time']>1200 || $sysop==false) {endSession(); $sysop=false;}
else $_SESSION['time']=time();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
-->
</style>
</head>
<body>
<p align="right" style="font-size: 150%"><a href='../admin.php?logout=true'>使用完後請務必按此登出</a></p><hr>
<?php

if ($sysop) {
  if ((! array_key_exists('no', $_GET)) || $_GET['no'] == '') $no = '' ; else $no = $_GET['no'] ;
  if ((! array_key_exists('list_sex', $_GET)) || $_GET['list_sex'] == '') $list_sex = -1 ; else $list_sex = $_GET['list_sex'] ;
  if ((! array_key_exists('list_state', $_GET)) || $_GET['list_state'] == '') $list_state = -1 ; else $list_state = $_GET['list_state'] ;
  if ((! array_key_exists('list_team', $_GET)) || $_GET['list_team'] == '') $list_team = -1 ; else $list_team = $_GET['list_team'] ;
  if ((! array_key_exists('list_remit', $_GET)) || $_GET['list_remit'] == '') $list_remit = -1 ; else $list_remit = $_GET['list_remit'] ;
  if (! array_key_exists('sort1', $_GET)) {
    $sort1 = '@SignTime' ;
    $sort2 = '' ;
    $sort3 = '' ;
    $sort4 = '' ;
  }
  else {
    if ($_GET['sort1'] == '') $sort1 = '' ; else $sort1 = $_GET['sort1'] ;
    if ((! array_key_exists('sort2', $_GET)) || $_GET['sort2'] == '') $sort2 = '' ; else $sort2 = $_GET['sort2'] ;
    if ((! array_key_exists('sort3', $_GET)) || $_GET['sort3'] == '') $sort3 = '' ; else $sort3 = $_GET['sort3'] ;
    if ((! array_key_exists('sort4', $_GET)) || $_GET['sort4'] == '') $sort4 = '' ; else $sort4 = $_GET['sort4'] ;
  }
  if ((! array_key_exists('row_disp', $_GET)) || $_GET['row_disp'] == '') $row_disp = '' ; else $row_disp = $_GET['row_disp'] ;
  if ((! array_key_exists('page', $_GET)) || $_GET['page'] == '') $page = '' ; else $page = $_GET['page'] ;
  require_once("source/db.php") ;
  require_once("source/para.php") ;
  $db = new DB;
  if (! $db->open())
    die($db->error()) ;
  $p_SQL = "" ;
  if ($no != '')
    $p_SQL = " Where AutoNo = " . $no ;
  else {
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
//	else
//	  $p_SQL = $p_SQL . " Order By SignTime Desc" ;
    if (! $db->query("Select Count(AutoNo) As Row_number From $dataTableName" . $p_SQL))
      die($db->error()) ;
	$fetch_Assoc = $db->fetchAssoc() ;
	$row_number = $fetch_Assoc['Row_number'] ;
    $row_start = 0 ;
    if ($row_disp == '') {
	  $row_disp = 30 ;
	  $page = 1 ;
	}
    if ($page != '') {
	  if ($page > ceil($row_number / $row_disp))
	    $page = ceil($row_number / $row_disp);
	  if ($page < 1)
	    $page = 1;
	  $row_start = $row_disp * ($page - 1) ;
      $p_SQL = $p_SQL . " Limit " . $row_start . ", " . $row_disp ;
    }
  }
  
  if ($no == '') {
    $sort_item = array('SignTime', '@SignTime', 'Name', '@Name', 'Sex', '@Sex', 'ID', '@ID',
                       'Birthday', '@Birthday', 'Parent', '@Parent', 'Email', '@Email', 'Phone', '@Phone',
                       'CellPhone', '@CellPhone', 'School', '@School', 'Grade', '@Grade', 'State', '@State', 
					   'isRemitted', '@isRemitted', 'Team', '@Team') ;
    $sort_show = array('報名時間　[順]', '報名時間　[反]', '姓名　　　[順]', '姓名　　　[反]', '性別　　　[順]', '性別　　　[反]', '身分證字號[順]', '身分證字號[反]', 
                       '出生年月日[順]', '出生年月日[反]', '監護人　　[順]', '監護人　　[反]', 'E-mail　　[順]', 'E-mail　　[反]', '電話　　　[順]', '電話　　　[反]',
                       '手機　　　[順]', '手機　　　[反]', '就讀高中　[順]', '就讀高中　[反]', '年級　　　[順]', '年級　　　[反]', '狀態　　　[順]', '狀態　　　[反]', 
					   '是否匯款　[順]', '是否匯款　[反]', '小隊　　　[順]', '小隊　　　[反]') ;
    echo "<form action='view.php' method='get' name='form_top'>" ;
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
    echo "</select></p><p align='center'>排序依據１：<select name='sort1' id='sort1'>" ;
    echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> 排序依據２：<select name='sort2' id='sort2'>" ;
    echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> 排序依據３：<select name='sort3' id='sort3'>" ;
    echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> 排序依據４：<select name='sort4' id='sort4'>" ;
    echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select>" ;
    echo "　<input type='submit' value='執行' style='font-size: 10pt; padding-top: 2px'>" ;
    echo "</p><p align='center'>總共 ", $row_number, " 筆資料，分 ", ceil($row_number / $row_disp), " 頁。目前顯示第 <select name='page' id='page' onChange='document.form_top.submit();'>" ;
    echo "<option value=''", ($page == '' ? ' selected' : ''), ">全部</option>" ;
    for ($j = 1 ; $j <= ceil($row_number / $row_disp) ; $j++)
      echo "<option value='", $j, "'", ($j == $page ? ' selected' : ''), ">", $j, "</option>" ;
    echo "</select> 頁，每頁顯示 <input name='row_disp' type='text' value='", $row_disp, "' size='3'> 筆資料。" ;
    //echo "<input type='hidden' name='password' value='", $_GET['password'], "'></p>" ;
    echo "</p>";
    echo "</form>" ;
  }

//  echo "Select * From $dataTableName" . $p_SQL ;
  if (! $db->query("Select * From $dataTableName" . $p_SQL))
    die($db->error()) ;
  $i = 0 ;
  while ($fetch_Assoc = $db->fetchAssoc()) {
    $i++ ;
    echo "<table width='990' border='1' cellspacing='0' cellpadding='0'><tr><td style='background-color: #AAAAAA'>";

    echo "<table border='0'><tr>" ;
	if ($no == '') {
	  if ($fetch_Assoc['State'] == 9)
	    echo "<th width='40' style='text-align: center; background-color: #FF8888'>", $i + $row_start, "</td>" ;
	  else if ($fetch_Assoc['State'] == 1)
	    echo "<th width='40' style='text-align: center; background-color: #99FF99'>", $i + $row_start, "</td>" ;
	  else if ($fetch_Assoc['State'] == 2)
	    echo "<th width='40' style='text-align: center; background-color: #A4EDFF'>", $i + $row_start, "</td>" ;
	  else
	    echo "<th width='40' style='text-align: center; background-color: #FFFF88'>", $i + $row_start, "</td>" ;
	}
	echo "<th width='80'>報名時間：</td>" ;
	echo "<td width='140'>", date("Y/m/d H:i:s", strtotime($fetch_Assoc['SignTime'])), "</td>" ;
	echo "<th width='50'>狀態：</td>" ;
	echo "<td width='50'>", $State_code[$fetch_Assoc['State']], "</td>" ;
	if ($fetch_Assoc['State'] == 9) {
	  echo "<th width='80'>刪除原因：</td>" ;
	  echo "<td width='320'>", $fetch_Assoc['Reason'], "</td>" ;
	}
	echo "<th width='80'>是否匯款：</td>" ;
	echo "<td width='30'>", $Remit_code[$fetch_Assoc['isRemitted']], "</td>" ;
	echo "<th width='50'>小隊：</td>" ;
	echo "<td width='30'>", $Team_code[$fetch_Assoc['Team']], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table border='0'><tr>" ;
	echo "<th width='50'>姓名：</td>" ;
	echo "<td width='75'>", $fetch_Assoc['Name'], "</td>" ;
	echo "<th width='50'>性別：</td>" ;
	echo "<td width='30'>", $Sex_code[$fetch_Assoc['Sex']], "</td>" ;
	echo "<th width='95'>身分證字號：</td>" ;
	echo "<td width='90'>", $fetch_Assoc['ID'], "</td>" ;
	echo "<th width='95'>出生年月日：</td>" ;
	echo "<td width='90'>", date("Y/m/d", strtotime($fetch_Assoc['Birthday'])), "</td>" ;
	echo "<th width='65'>監護人：</td>" ;
	echo "<td width='75'>", $fetch_Assoc['Parent'], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='50'>電話：</td>" ;
	echo "<td width='100'>", $fetch_Assoc['Phone'], "</td>" ;
	echo "<th width='50'>手機：</td>" ;
	echo "<td width='100'>", $fetch_Assoc['CellPhone'], "</td>" ;
	echo "<th width='65'>E-mail：</td>" ;
	echo "<td>", $fetch_Assoc['Email'], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='50'>地址：</td>" ;
	echo "<td>", $fetch_Assoc['Address'], "</td>" ;
	echo "<th width='80'>就讀高中：</td>" ;
	echo "<td width='170'>", $fetch_Assoc['School'], "</td>" ;
	echo "<th width='50'>年級：</td>" ;
	echo "<td width='30'>", $Grade_code[$fetch_Assoc['Grade']], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='50'>自介：</td>" ;
	echo "<td>", $fetch_Assoc['Introduction'], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='110'>工作人員備註：</td>" ;
	echo "<td>", $fetch_Assoc['Notation'], "</td>" ;
	echo "<th width='65'>報名IP：</td>" ;
	echo "<td width='110'>", $fetch_Assoc['IP'], "</td>" ;
	echo "</tr></table>" ;
	
    echo "</td></tr></table><br>";
  }
  
  if ($no == '') {
    echo "<form action='view.php' method='get' name='form_bottom'>" ;
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
    echo "</select></p><p align='center'>排序依據１：<select name='sort1' id='sort1'>" ;
    echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> 排序依據２：<select name='sort2' id='sort2'>" ;
    echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> 排序依據３：<select name='sort3' id='sort3'>" ;
    echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> 排序依據４：<select name='sort4' id='sort4'>" ;
    echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">─</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select>" ;
    echo "　<input type='submit' value='執行' style='font-size: 10pt; padding-top: 2px'>" ;
    echo "</p><p align='center'>總共 ", $row_number, " 筆資料，分 ", ceil($row_number / $row_disp), " 頁。目前顯示第 <select name='page' id='page' onChange='document.form_bottom.submit();'>" ;
    echo "<option value=''", ($page == '' ? ' selected' : ''), ">全部</option>" ;
    for ($j = 1 ; $j <= ceil($row_number / $row_disp) ; $j++)
      echo "<option value='", $j, "'", ($j == $page ? ' selected' : ''), ">", $j, "</option>" ;
    echo "</select> 頁，每頁顯示 <input name='row_disp' type='text' value='", $row_disp, "' size='3'> 筆資料。" ;
    //echo "<input type='hidden' name='password' value='", $_GET['password'], "'></p>" ;
    echo "</p>";
    echo "</form>" ;
  }

  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>