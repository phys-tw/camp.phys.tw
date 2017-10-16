<?php
  header("Expires: Sat, 1 Jan 2000 00:00:00 GMT") ;
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>查詢報名資料 - 編輯特定欄位</title>
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
input {
	font-size: 9pt;
	font-family: 細明體;
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
  require_once("source/db.php") ;
  $db = new DB('localhost', 'physcamp', 'physland', 'physcamp') ;
  if (! $db->open())
    die($db->error()) ;

  $p_SQL = "Name = '" . $_POST['Name'] . "'" ;
  $p_SQL = $p_SQL . ", Parent = '" . $_POST['ParentName'] . "'" ;
  $p_SQL = $p_SQL . ", Email = '" . $_POST['Email'] . "'" ;
  $p_SQL = $p_SQL . ", Phone = '" . $_POST['Phone'] . "'" ;
  $p_SQL = $p_SQL . ", CellPhone = '" . $_POST['CellPhone'] . "'" ;
  $p_SQL = $p_SQL . ", Address = '" . $_POST['Address'] . "'" ;
  $p_SQL = $p_SQL . ", School = '" . $_POST['School'] . "'" ;
  $p_SQL = $p_SQL . ", Notation = '" . $_POST['Notation'] . "'" ;
  $p_SQL = "Update 2k07_list Set " . $p_SQL . " Where AutoNo = " . $_POST['AutoNo'] ;

  if (! $db->query($p_SQL))
    die($db->error()) ;

  echo "<script language='JavaScript'>opener.window.location.reload(); window.close();</script>" ;
  
  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>