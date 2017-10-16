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
p {
    margin-top: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<body>

<?php

$sysop = false ;
if (array_key_exists('password', $_POST))
  if ($_POST['password'] == "campregadmin")
    $sysop = true ;

if ($sysop) {
  require_once("source/db.php") ;
  require_once("source/para.php") ;
  $db = new DB;
  if (! $db->open())
    die($db->error()) ;

//  echo "<pre>" ;
//  print_r($_POST) ;
//  echo "</pre>" ;

  if ($_POST['list_action'] == "save") {
    for ($i = 0 ; $i < count($_POST['State']) ; $i++) {
      $p_SQL = "" ;
      if ($_POST['isRemitted'][$i] == 'on')
	    $p_SQL = "State = " . $_POST['State'][$i] . ", isRemitted = 1, Team = " . $_POST['Team'][$i] ;
  	  else
	    $p_SQL = "State = " . $_POST['State'][$i] . ", isRemitted = 0, Team = " . $_POST['Team'][$i] ;
      $p_SQL = "Update $dataTableName Set " . $p_SQL . " Where AutoNo = " . $_POST['AutoNo'][$i] ;

//      echo $p_SQL, "<br>" ;
	  if (! $db->query($p_SQL))
	    die($db->error()) ;
    }

    echo "<form action='list.php' method='post' name='form_return'>" ;
    echo "<input type='hidden' name='list_sex' value='", $_POST['list_sex'], "'></p>" ;
    echo "<input type='hidden' name='list_state' value='", $_POST['list_state'], "'></p>" ;
    echo "<input type='hidden' name='list_team' value='", $_POST['list_team'], "'></p>" ;
    echo "<input type='hidden' name='list_remit' value='", $_POST['list_remit'], "'></p>" ;
    echo "<input type='hidden' name='sort1' value='", $_POST['sort1'], "'></p>" ;
    echo "<input type='hidden' name='sort2' value='", $_POST['sort2'], "'></p>" ;
    echo "<input type='hidden' name='sort3' value='", $_POST['sort3'], "'></p>" ;
    echo "<input type='hidden' name='sort4' value='", $_POST['sort4'], "'></p>" ;
    echo "<input type='hidden' name='password' value='", $_POST['password'], "'></p>" ;
    echo "</form>" ;

    echo "<script language='JavaScript'>document.form_return.submit();</script>" ;
  }
  else if ($_POST['list_action'] == "mail") {
    $mail_list = "" ;
    for ($i = 0 ; $i < count($_POST['State']) ; $i++) {
      $p_SQL = "Select Name, Email From $dataTableName Where AutoNo = " . $_POST['AutoNo'][$i] ;
	  if (! $db->query($p_SQL))
	    die($db->error()) ;
      if ($fetch_Assoc = $db->fetchAssoc())
	    if ($mail_list == "")
          $mail_list = "\"" . $fetch_Assoc['Name'] . "\" <" . $fetch_Assoc['Email'] . ">" ;
		else
          $mail_list = $mail_list . ", \"" . $fetch_Assoc['Name'] . "\" <" . $fetch_Assoc['Email'] . ">" ;
    }
	
    echo "<div align='center'><table width='732' border='1' cellspacing='0' cellpadding='0'><tr><td style='background-color: #AAAAAA'>";
    echo "<table border='0'><tr><th width='160' style='font-size: 10pt; font-family: 細明體; background-color: #CCCCCC; text-align: left'>以下是群組寄信名單：</th></tr></table>" ;
    echo "<table width='732' border='0'><tr><td	style='font-size: 10pt;	font-family: 細明體; background-color: #FFFFFF'><textarea name='mail_list_show' cols='100' rows='10'>", $mail_list, "</textarea></td></tr></table>";
    echo "</td></tr></table></div>" ;
    echo "<p align='center' style='margin-top: 4px'><input type='button' value='返回' style='font-size: 10pt; padding-top: 2px' onClick='history.back();'></p>";
  }
  else if ($_POST['list_action'] == "address") {
    $address_list = "" ;
	$k = 0 ;
    for ($i = 0 ; $i < count($_POST['State']) ; $i++) {
      $p_SQL = "Select Name, Address From $dataTableName Where AutoNo = " . $_POST['AutoNo'][$i] ;
	  if (! $db->query($p_SQL))
	    die($db->error()) ;
      if ($fetch_Assoc = $db->fetchAssoc()) {
	    if ($k == 0)
		  $address_list = "<hr style='margin-top: 6px; margin-bottom: 6px'>" ;
	    else if ($k % 10 == 0)
		  $address_list = $address_list . "<br><br><hr style='margin-top: 6px; margin-bottom: 6px'>" ;
	    $k++ ;
        $address_list = $address_list . "<p style='font-size: 16pt' style='margin-left: 15px;'>" . $fetch_Assoc['Address'] . "</p><p style='font-size: 24pt' align='right' style='margin-right: 30px'>" . $fetch_Assoc['Name'] . " 同學 收</p><hr style='margin-top: 6px; margin-bottom: 6px'>" ;
	  }
    }
	
    echo "<table width='670' border='0' cellspacing='0' cellpadding='0'><tr><td style='background-color: #FFFFFF'>";
    echo $address_list ;
    echo "</td></tr></table>" ;
  }

  $db->freeResult() ;
  $db->close() ;
} else
  echo "<p style='color: #FF0000'>您的權限不足！</p>" ;

?>

</body>
</html>
