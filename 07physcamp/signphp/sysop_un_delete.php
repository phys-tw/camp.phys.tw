<?php
  header("Expires: Sat, 1 Jan 2000 00:00:00 GMT") ;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>�d�߳��W��� - ��_�浧���</title>
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
input {
	font-size: 9pt;
	font-family: �ө���;
	margin-top: -1px;
	margin-bottom: -1px;
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
  $execute = false ;
  if (array_key_exists('execute', $_POST))
    if ($_POST['execute'] == "YES")
      $execute = true ;

  if ($execute) {
	require_once("source/db.php") ;
	$db = new DB('localhost', 'physcamp', 'physland', 'physcamp') ;
	if (! $db->open())
      die($db->error()) ;
	if (! $db->query("Select ID From 2k07_list Where AutoNo = " . $no))
      die($db->error()) ;
    $fetch_Assoc = $db->fetchAssoc() ;
	if (! $db->query("Update 2k07_list Set State = 9, Reason = '��_���������' Where ID = '" . $fetch_Assoc['ID'] . "' And State != 9"))
      die($db->error()) ;
	if (! $db->query("Update 2k07_list Set State = 0, Reason = '�R����A��_', SignTime = '" . date("Y-m-d H:i:s", time()) . "' Where AutoNo = " . $no))
      die($db->error()) ;
	$db->freeResult() ;
	$db->close() ;
	echo "<script language='JavaScript'>opener.window.location.reload(); window.close();</script>" ;
  }
  else {
	echo "<form action='sysop_un_delete.php' method='post' name='form1'>" ;
	echo "<input type='hidden' name='password' value='", $_POST['password'], "'>" ;
	echo "<input type='hidden' name='no' value='", $no, "'>" ;
	echo "<input type='hidden' name='execute' value='YES'>" ;
	echo "<p align='center'>�Y��_������ơA<br>�h������ƪ����W�ɶ��N�Q���]���ثe�ɶ��I</p>";
	echo "<p align='center' style='margin-top: 4px'><input type='submit' value='�T�w��_' style='font-size: 10pt; padding-top: 2px'>�@<input type='button' value='����' style='font-size: 10pt; padding-top: 2px' onClick='window.close();'></p>";
	echo "</form>" ;
  }
}
else
  echo "<p style='color: #FF0000'>�z���v�������I</p>" ;

?>

</body>
</html>