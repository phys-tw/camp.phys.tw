<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>�d�߳��W���</title>
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
	font-family: �ө���;
}
td {
	font-size: 10pt;
	font-family: �ө���;
	background-color: #FFFFFF ;
}
th {
	font-size: 10pt;
	font-family: �ө���;
	background-color: #CCCCCC;
	text-align: left;
}
p {
    margin-top: 0px;
	margin-bottom: 0px;
}
select {
	font-size: 9pt;
	font-family: �ө���;
}
input {
	font-size: 9pt;
	font-family: �ө���;
}
-->
</style>
</head>
<body>

<?php

$sysop = false ;
if (array_key_exists('password', $_POST))
  if ($_POST['password'] == "physland")
    $sysop = true ;

if ($sysop) {
  if ((! array_key_exists('no', $_POST)) || $_POST['no'] == '') $no = '' ; else $no = $_POST['no'] ;
  if ((! array_key_exists('list_sex', $_POST)) || $_POST['list_sex'] == '') $list_sex = -1 ; else $list_sex = $_POST['list_sex'] ;
  if ((! array_key_exists('list_state', $_POST)) || $_POST['list_state'] == '') $list_state = -1 ; else $list_state = $_POST['list_state'] ;
  if ((! array_key_exists('list_team', $_POST)) || $_POST['list_team'] == '') $list_team = -1 ; else $list_team = $_POST['list_team'] ;
  if ((! array_key_exists('list_remit', $_POST)) || $_POST['list_remit'] == '') $list_remit = -1 ; else $list_remit = $_POST['list_remit'] ;
  if (! array_key_exists('sort1', $_POST)) {
    $sort1 = '@SignTime' ;
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
  if ((! array_key_exists('row_disp', $_POST)) || $_POST['row_disp'] == '') $row_disp = '' ; else $row_disp = $_POST['row_disp'] ;
  if ((! array_key_exists('page', $_POST)) || $_POST['page'] == '') $page = '' ; else $page = $_POST['page'] ;
  require_once("source/db.php") ;
  require_once("source/para.php") ;
  $db = new DB('localhost', 'physcamp', 'physland', 'physcamp') ;
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
    if (! $db->query("Select Count(AutoNo) As Row_number From 2k07_list" . $p_SQL))
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
    $sort_show = array('���W�ɶ��@[��]', '���W�ɶ��@[��]', '�m�W�@�@�@[��]', '�m�W�@�@�@[��]', '�ʧO�@�@�@[��]', '�ʧO�@�@�@[��]', '�����Ҧr��[��]', '�����Ҧr��[��]', 
                       '�X�ͦ~���[��]', '�X�ͦ~���[��]', '���@�H�@�@[��]', '���@�H�@�@[��]', 'E-mail�@�@[��]', 'E-mail�@�@[��]', '�q�ܡ@�@�@[��]', '�q�ܡ@�@�@[��]',
                       '����@�@�@[��]', '����@�@�@[��]', '�NŪ�����@[��]', '�NŪ�����@[��]', '�~�š@�@�@[��]', '�~�š@�@�@[��]', '���A�@�@�@[��]', '���A�@�@�@[��]', 
					   '�O�_�״ڡ@[��]', '�O�_�״ڡ@[��]', '�p���@�@�@[��]', '�p���@�@�@[��]') ;
    echo "<form action='view.php' method='post' name='form_top'>" ;
    echo "<p align='center'>�ȦC�X�G<select name='list_sex' id='list_sex' onChange='document.form_top.submit();'>" ;
    echo "<option value=''", ($list_sex == -1 ? ' selected' : ''), ">�����ʧO</option>" ;
    for ($j = 1 ; $j <= 2 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_sex ? ' selected' : ''), ">", $Sex_code[$j], "</option>" ;
    echo "</select> <select name='list_state' id='list_state' onChange='document.form_top.submit();'>" ;
    echo "<option value=''", ($list_state == -1 ? ' selected' : ''), ">�������A</option>" ;
    echo "<option value='0'", (0 == $list_state ? ' selected' : ''), ">(���]�w)</option>" ;
    for ($j = 1 ; $j <= 3 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_state ? ' selected' : ''), ">", $State_code[$j], "</option>" ;
    echo "<option value='6'", (6 == $list_state ? ' selected' : ''), ">���R��</option>" ;
    echo "<option value='7'", (7 == $list_state ? ' selected' : ''), ">�����P�ƨ�</option>" ;
    echo "<option value='8'", (8 == $list_state ? ' selected' : ''), ">�������P���]�w</option>" ;
    echo "<option value='9'", (9 == $list_state ? ' selected' : ''), ">", $State_code[9], "</option>" ;
    echo "</select> <select name='list_team' id='list_team' onChange='document.form_top.submit();'>" ;
    echo "<option value=''", ($list_team == -1 ? ' selected' : ''), ">�����p��</option>" ;
    for ($j = 1 ; $j <= 10 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_team ? ' selected' : ''), ">��", $Team_code[$j], "�p��</option>" ;
    echo "<option value='-2'", ($list_team == -2 ? ' selected' : ''), ">�����w�p��</option>" ;
    echo "</select> <select name='list_remit' id='list_remit' onChange='document.form_top.submit();'>" ;
    echo "<option value=''", ($list_remit == -1 ? ' selected' : ''), ">���׶״ڻP�_</option>" ;
    for ($j = 0 ; $j <= 1 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_remit ? ' selected' : ''), ">", $Remit_code[$j], "</option>" ;
    echo "</select></p><p align='center'>�ƧǨ̾ڢ��G<select name='sort1' id='sort1'>" ;
    echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> �ƧǨ̾ڢ��G<select name='sort2' id='sort2'>" ;
    echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> �ƧǨ̾ڢ��G<select name='sort3' id='sort3'>" ;
    echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> �ƧǨ̾ڢ��G<select name='sort4' id='sort4'>" ;
    echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select>" ;
    echo "�@<input type='submit' value='����' style='font-size: 10pt; padding-top: 2px'>" ;
    echo "</p><p align='center'>�`�@ ", $row_number, " ����ơA�� ", ceil($row_number / $row_disp), " ���C�ثe��ܲ� <select name='page' id='page' onChange='document.form_top.submit();'>" ;
    echo "<option value=''", ($page == '' ? ' selected' : ''), ">����</option>" ;
    for ($j = 1 ; $j <= ceil($row_number / $row_disp) ; $j++)
      echo "<option value='", $j, "'", ($j == $page ? ' selected' : ''), ">", $j, "</option>" ;
    echo "</select> ���A�C����� <input name='row_disp' type='text' value='", $row_disp, "' size='3'> ����ơC" ;
    echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
    echo "</form>" ;
  }

//  echo "Select * From 2k07_list" . $p_SQL ;
  if (! $db->query("Select * From 2k07_list" . $p_SQL))
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
	echo "<th width='80'>���W�ɶ��G</td>" ;
	echo "<td width='140'>", date("Y/m/d H:i:s", strtotime($fetch_Assoc['SignTime'])), "</td>" ;
	echo "<th width='50'>���A�G</td>" ;
	echo "<td width='50'>", $State_code[$fetch_Assoc['State']], "</td>" ;
	if ($fetch_Assoc['State'] == 9) {
	  echo "<th width='80'>�R����]�G</td>" ;
	  echo "<td width='320'>", $fetch_Assoc['Reason'], "</td>" ;
	}
	echo "<th width='80'>�O�_�״ڡG</td>" ;
	echo "<td width='30'>", $Remit_code[$fetch_Assoc['isRemitted']], "</td>" ;
	echo "<th width='50'>�p���G</td>" ;
	echo "<td width='30'>", $Team_code[$fetch_Assoc['Team']], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table border='0'><tr>" ;
	echo "<th width='50'>�m�W�G</td>" ;
	echo "<td width='75'>", $fetch_Assoc['Name'], "</td>" ;
	echo "<th width='50'>�ʧO�G</td>" ;
	echo "<td width='30'>", $Sex_code[$fetch_Assoc['Sex']], "</td>" ;
	echo "<th width='95'>�����Ҧr���G</td>" ;
	echo "<td width='90'>", $fetch_Assoc['ID'], "</td>" ;
	echo "<th width='95'>�X�ͦ~���G</td>" ;
	echo "<td width='90'>", date("Y/m/d", strtotime($fetch_Assoc['Birthday'])), "</td>" ;
	echo "<th width='65'>���@�H�G</td>" ;
	echo "<td width='75'>", $fetch_Assoc['Parent'], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='50'>�q�ܡG</td>" ;
	echo "<td width='100'>", $fetch_Assoc['Phone'], "</td>" ;
	echo "<th width='50'>����G</td>" ;
	echo "<td width='100'>", $fetch_Assoc['CellPhone'], "</td>" ;
	echo "<th width='65'>E-mail�G</td>" ;
	echo "<td>", $fetch_Assoc['Email'], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='50'>�a�}�G</td>" ;
	echo "<td>", $fetch_Assoc['Address'], "</td>" ;
	echo "<th width='80'>�NŪ�����G</td>" ;
	echo "<td width='170'>", $fetch_Assoc['School'], "</td>" ;
	echo "<th width='50'>�~�šG</td>" ;
	echo "<td width='30'>", $Grade_code[$fetch_Assoc['Grade']], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='50'>�ۤ��G</td>" ;
	echo "<td>", $fetch_Assoc['Introduction'], "</td>" ;
	echo "</tr></table>" ;

    echo "</td></tr><tr><td style='background-color: #AAAAAA'>";
	
    echo "<table width='990' border='0'><tr>" ;
	echo "<th width='110'>�u�@�H���Ƶ��G</td>" ;
	echo "<td>", $fetch_Assoc['Notation'], "</td>" ;
	echo "<th width='65'>���WIP�G</td>" ;
	echo "<td width='110'>", $fetch_Assoc['IP'], "</td>" ;
	echo "</tr></table>" ;
	
	

	
    echo "</td></tr></table><br>";
    
    
  	// �R��/��_����s�r��

	if ($fetch_Assoc['State'] == 9) {
  //echo "<br>��_���W���(undelete)/���]���A  �п�J�y�������enter (�Фp�ߨϥ�)";
  echo "<script language=\"javascript\">function newpage() {document.form.submit();}</script><form name=\"form\" method=\"post\" action=\"sysop_un_delete.php\" target=\"newpage\" ><input type=\"hidden\" name=\"no\" value=\"", $fetch_Assoc['AutoNo'] ,"\"><input type=\"hidden\" name=\"password\" value=\"physland\"><input type=\"button\" onclick=\"newpage()\" value=\"�e�X\"></form>";
	}




	//�s�r�ϵ��� 

  }
  
  if ($no == '') {
    echo "<form action='view.php' method='post' name='form_bottom'>" ;
    echo "<p align='center'>�ȦC�X�G<select name='list_sex' id='list_sex' onChange='document.form_bottom.submit();'>" ;
    echo "<option value=''", ($list_sex == -1 ? ' selected' : ''), ">�����ʧO</option>" ;
    for ($j = 1 ; $j <= 2 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_sex ? ' selected' : ''), ">", $Sex_code[$j], "</option>" ;
    echo "</select> <select name='list_state' id='list_state' onChange='document.form_bottom.submit();'>" ;
    echo "<option value=''", ($list_state == -1 ? ' selected' : ''), ">�������A</option>" ;
    echo "<option value='0'", (0 == $list_state ? ' selected' : ''), ">(���]�w)</option>" ;
    for ($j = 1 ; $j <= 3 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_state ? ' selected' : ''), ">", $State_code[$j], "</option>" ;
    echo "<option value='6'", (6 == $list_state ? ' selected' : ''), ">���R��</option>" ;
    echo "<option value='7'", (7 == $list_state ? ' selected' : ''), ">�����P�ƨ�</option>" ;
    echo "<option value='8'", (8 == $list_state ? ' selected' : ''), ">�������P���]�w</option>" ;
    echo "<option value='9'", (9 == $list_state ? ' selected' : ''), ">", $State_code[9], "</option>" ;
    echo "</select> <select name='list_team' id='list_team' onChange='document.form_bottom.submit();'>" ;
    echo "<option value=''", ($list_team == -1 ? ' selected' : ''), ">�����p��</option>" ;
    for ($j = 1 ; $j <= 10 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_team ? ' selected' : ''), ">��", $Team_code[$j], "�p��</option>" ;
    echo "<option value='-2'", ($list_team == -2 ? ' selected' : ''), ">�����w�p��</option>" ;
    echo "</select> <select name='list_remit' id='list_remit' onChange='document.form_bottom.submit();'>" ;
    echo "<option value=''", ($list_remit == -1 ? ' selected' : ''), ">���׶״ڻP�_</option>" ;
    for ($j = 0 ; $j <= 1 ; $j++)
      echo "<option value='", $j, "'", ($j == $list_remit ? ' selected' : ''), ">", $Remit_code[$j], "</option>" ;
    echo "</select></p><p align='center'>�ƧǨ̾ڢ��G<select name='sort1' id='sort1'>" ;
    echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> �ƧǨ̾ڢ��G<select name='sort2' id='sort2'>" ;
    echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> �ƧǨ̾ڢ��G<select name='sort3' id='sort3'>" ;
    echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select> �ƧǨ̾ڢ��G<select name='sort4' id='sort4'>" ;
    echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">�w</option>" ;
    for ($j = 0 ; $j < 28 ; $j++)
      echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
    echo "</select>" ;
    echo "�@<input type='submit' value='����' style='font-size: 10pt; padding-top: 2px'>" ;
    echo "</p><p align='center'>�`�@ ", $row_number, " ����ơA�� ", ceil($row_number / $row_disp), " ���C�ثe��ܲ� <select name='page' id='page' onChange='document.form_bottom.submit();'>" ;
    echo "<option value=''", ($page == '' ? ' selected' : ''), ">����</option>" ;
    for ($j = 1 ; $j <= ceil($row_number / $row_disp) ; $j++)
      echo "<option value='", $j, "'", ($j == $page ? ' selected' : ''), ">", $j, "</option>" ;
    echo "</select> ���A�C����� <input name='row_disp' type='text' value='", $row_disp, "' size='3'> ����ơC" ;
    echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
    echo "</form>" ;
  }

  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>�z���v�������I</p>" ;

?>

</body>
</html>