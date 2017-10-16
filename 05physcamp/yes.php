<?php require_once('Connections/db.php'); ?>
<?php
// *** Validate request to login to this site.
session_start();

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($accesscheck)) {
  $GLOBALS['PrevUrl'] = $accesscheck;
  session_register('PrevUrl');
}

if (isset($_POST['IDnumber'])) {
  $loginUsername=$_POST['IDnumber'];
  $password=$_POST['IDnumber'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "yes.php";
  $MM_redirectLoginFailed = "no.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db, $db);
  
  $LoginRS__query=sprintf("SELECT IDNumber, IDNumber FROM id_list WHERE IDNumber='%s' AND IDNumber='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $db) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $GLOBALS['MM_Username'] = $loginUsername;
    $GLOBALS['MM_UserGroup'] = $loginStrGroup;	      

    //register the session variables
    session_register("MM_Username");
    session_register("MM_UserGroup");

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>確認報名</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style type="text/css">
<!--
.unnamed1 {
	font-size: 14px;
}
.style1 {
	font-size: 16px;
	font-weight: bold;
}
.style2 {color: #FF0000}
.style3 {color: #000000}
.style5 {font-size: 14px; font-weight: bold; }
body {
	margin-left: 20px;
	margin-top: 20px;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="500" border="0" align="left">
    <tr>
      <td><div align="center">
          <table width="450" border="0">
            <tr>
              <td><div align="left"><span class="style1">2005 臺大物理營，報名確認系統。</span></div></td>
            </tr>
          </table>
        </div>
          <form ACTION="<?php echo $loginFormAction; ?>" name="form1" method="POST">
            <div align="center">
              <table width="450" border="0" bgcolor="#FFCC66">
                <tr>
                  <td width="362"><div align="center"><span class="style5">請輸入您的身份證字號：</span>
                          <input name="IDnumber" type="text" id="IDnumber" size="25" maxlength="10">
                  </div></td>
                  <td width="78"><p align="center">
                      <input type="submit" name="Submit" value="送出">
                  </p></td>
                </tr>
              </table>
            </div>
          </form>
          <p align="center"><span class="style1"><br>
        確認結果：<span class="style2">您的報名資料已在我們的資料庫中。 </span></span></p>
          <p align="center">&nbsp;</p>
          <p align="center"><span class="style1"><span class="style3"><a href="main.htm">回首頁</a></span></span></p></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>
