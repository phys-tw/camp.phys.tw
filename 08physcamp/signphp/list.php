<?php
  header("Expires: Sat, 1 Jan 2000 00:00:00 GMT") ;
?>

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
.input2 {
	font-size: 8pt;
	font-family: �ө���;
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
if (array_key_exists('password', $_POST))//�i�D�q���b$_POST�}�C��, 'password'�o�Ӱ}�C��O�_�s�b
  if ($_POST['password'] == "campregadmin")
    $sysop = true ;

if ($sysop) {
  if ((! array_key_exists('list_sex', $_POST)) || $_POST['list_sex'] == '') $list_sex = -1 ; else $list_sex = $_POST['list_sex'] ; //�M�wlist_sex����(��ܨk�k��)
  if (! array_key_exists('list_state', $_POST))
    $list_state = 6 ;//���R��
  else if ($_POST['list_state'] == '')
    $list_state = -1 ;//�ťթM-1�����������A
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
  $sort_show = array('���W�ɶ��@[��]', '���W�ɶ��@[��]', '�m�W�@�@�@[��]', '�m�W�@�@�@[��]', '�ʧO�@�@�@[��]', '�ʧO�@�@�@[��]', '�����Ҧr��[��]', '�����Ҧr��[��]', 
                     '�X�ͦ~���[��]', '�X�ͦ~���[��]', '���@�H�@�@[��]', '���@�H�@�@[��]', 'E-mail�@�@[��]', 'E-mail�@�@[��]', '�q�ܡ@�@�@[��]', '�q�ܡ@�@�@[��]',
                     '����@�@�@[��]', '����@�@�@[��]', '�NŪ�����@[��]', '�NŪ�����@[��]', '�~�š@�@�@[��]', '�~�š@�@�@[��]', '���A�@�@�@[��]', '���A�@�@�@[��]', 
					 '�O�_�״ڡ@[��]', '�O�_�״ڡ@[��]', '�p���@�@�@[��]', '�p���@�@�@[��]') ;
  echo "<form action='list.php' method='post' name='form_top'>" ;
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
  echo "</select>�@�`�@ ", $row_number, " ����ơC</p><p align='center'>�ƧǨ̾ڢ��G<select name='sort1' id='sort1'>" ;
  echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> �̾ڢ��G<select name='sort2' id='sort2'>" ;
  echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> �̾ڢ��G<select name='sort3' id='sort3'>" ;
  echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> �̾ڢ��G<select name='sort4' id='sort4'>" ;
  echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select>" ;
  echo "�@<input type='submit' value='����' style='font-size: 10pt; padding-top: 2px'>" ;
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
  echo "<input type='submit' value='�d�ݧ�����' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "</form>" ;
  echo "</div>" ;

//  echo "Select * From $dataTableName" . $p_SQL ;
  if (! $db->query("Select * From $dataTableName" . $p_SQL))
    die($db->error()) ;

  echo "<form action='list_save.php' method='post' name='form_data' style='margin-top: -50px'>" ;
  echo "<p style='margin-left: 135px; margin-bottom: 4px'>" ;
  echo "<select name='list_action' id='list_action' style='margin-bottom: 3px'>" ;
  echo "<option value='save' selected>�x�s�ܧ�</option>" ;
  echo "<option value='mail'>�s�ձH�H�W��</option>" ;
  echo "<option value='address'>�C�L�l�H�a�}</option>" ;
  echo "</select>" ;
  echo " <input type='submit' value='����' style='font-size: 10pt; padding-top: 2px'>" ;
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
  
  /*���q���� �o�T��אּ�@�Ӫ��s��
  echo "<th width='17'>&nbsp;</td>";
  echo "<th width='17'>&nbsp;</td>";
  echo "<th width='17'>&nbsp;</td>";
  */
  
  //�U�@�欰�W�@�q�����N
  echo "<th width='59'>�y����</td>";

  echo "<th width='67'>���A</td>";
  echo "<th width='20'>�״�</td>";
  echo "<th width='43'>�p��</td>";
  echo "<th width='60'>�m�W</td>";
  echo "<th width='20'>�ʧO</td>";
  echo "<th width='75'>�����Ҧr��</td>";
  echo "<th width='75'>�ͤ�</td>";
  echo "<th width='95'>�q��</td>";
  echo "<th width='85'>���</td>";
  echo "<th>�NŪ����</td>";
  echo "<th width='20'>�~��</td>";
  echo "<th width='105'>���W�ɶ�</td>";
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

	//�U�@�楻������
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('view.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=1002,height=300,scrollbars=no,resizable=yes');\"><img src='images/browse.png' width='16' height='16' border='0' alt='�d�ݧ�����'></a></td>" ;
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:'', 'width=1002,height=300,scrollbars=no,resizable=yes');\"><img src='images/browse.png' width='16' height='16' border='0' alt='�d�ݧ����� ���\��Ȯɰ��� �ШϥΤW����s�N�� ���� ^^'></a></td>" ;
	//�W�@�欰�d�ݧ�����
	
	//�U�@�欰���T�w�榡���s�� ver1.7����
	//echo "|Number:",$fetch_Assoc['AutoNo'];
	
	//�U�@�q���T�w�榡�s��(�y����) ver1.7��ҥ�
	echo "<th width='59' style='text-align: center; background-color: ", $background, "'>",$fetch_Assoc['AutoNo'] ,"</td>";
	
	
	
	//�U�@�楻������
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_edit.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=744,height=262,scrollbars=no,resizable=no');\"><img src='images/edit.png' width='16' height='16' border='0' alt='�s��S�w���'></a></td>" ;
	//echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript: '', 'width=744,height=262,scrollbars=no,resizable=no');\"><img src='images/edit.png' width='16' height='16' border='0' alt='�s��S�w��� ���\��Ȯɰ��� ���٤���ѨM�o�̪��w���ʰ��D... ���ݭn�Ь�peter53 �ڷ|�N���w���������A...XD '></a></td>" ;
	//�W�@�欰�s��S�w���
	/*
	if ($fetch_Assoc['State'] != 9)
		//�U�@�楻������
	  //echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_delete.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/delete.png' width='16' height='16' border='0' alt='�R���������'></a></td>" ;
	  echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript: '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/delete.png' width='16' height='16' border='0' alt='�R��������� ���βz�ѦP�� �A�����n��p Orz... ���L�k�誺�����B�״ڻP�_�����ҥi���`�B�@ - peter53'></a></td>" ;
	  //�W�@�欰�R���������
	else
		//�U�@�楻������
	  //echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_un_delete.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/un_delete.png' width='16' height='16' border='0' alt='��_�������'></a></td>" ;
	  echo "<td width='17' style='background-color: ", $background, "'><a href='Javascript:' onClick=\"window.open('sysop_un_delete.php?password=", $_POST['password'], "&no=", $fetch_Assoc['AutoNo'], "', '', 'width=354,height=80,scrollbars=no,resizable=yes');\"><img src='images/un_delete.png' width='16' height='16' border='0' alt='��_�������  ���βz�ѦP�� �A�����n��p Orz... ���L�k�誺�����B�״ڻP�_�����ҥi���`�B�@ - peter53'></a></td>" ;
	  //�W�@�欰��_�������
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
  echo "<p style='margin-left: 135px; margin-top: 4px'><input type='submit' value='����' style='font-size: 10pt; padding-top: 2px'></p>" ;
  echo "<br></form>" ;
  
  echo "<form action='list.php' method='post' name='form_bottom'>" ;
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
  echo "</select>�@�`�@ ", $row_number, " ����ơC</p><p align='center'>�ƧǨ̾ڢ��G<select name='sort1' id='sort1'>" ;
  echo "<option value=''", ($sort1 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort1) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> �̾ڢ��G<select name='sort2' id='sort2'>" ;
  echo "<option value=''", ($sort2 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort2) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> �̾ڢ��G<select name='sort3' id='sort3'>" ;
  echo "<option value=''", ($sort3 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort3) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select> �̾ڢ��G<select name='sort4' id='sort4'>" ;
  echo "<option value=''", ($sort4 == '' ? ' selected' : ''), ">�w</option>" ;
  for ($j = 0 ; $j < 28 ; $j++)
    echo "<option value='", $sort_item[$j], "'", (strtoupper($sort_item[$j]) == strtoupper($sort4) ? ' selected' : ''), ">", $sort_show[$j], "</option>" ;
  echo "</select>" ;
  echo "�@<input type='submit' value='����' style='font-size: 10pt; padding-top: 2px'>" ;
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
  echo "<input type='submit' value='�d�ݧ�����' style='font-size: 10pt; padding-top: 2px'>" ;
  echo "</form>" ;
  
  //�}�s�����H�s����
  echo "<br>�ק���W��� �п�J�y�������enter �|�}�Ҥ@�ק��Ƥ��s����<br>�аȥ��ֹ�Ҷ}�Ҥ��������e�P�A�ҿ�������e�O�_�ۦP�I thanks ^";
  echo "<script language=\"javascript\">function newpage() {document.form.submit();}</script><form name=\"form01\" method=\"post\" action=\"sysop_edit.php\" target=\"newpage\" ><input type=\"text\" name=\"no\"><input type=\"hidden\" name=\"password\" value=\"campregadmin\"><input type=\"button\" onclick=\"newpage()\" value=\"�e�X\"></form>";
  
  echo "<br><----------------------------------------------------------------------------->";
  
	
  echo "</div>" ;

  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>�z���v�������I</p>" ;

?>

</body>
</html>
