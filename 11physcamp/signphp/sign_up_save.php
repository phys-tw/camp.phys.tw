<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else {
  require_once("source/db.php") ;
  require_once("source/school_trans.php") ;
  $db = new DB;
  if (! $db->open()) {
    $messenge = "資料寫入失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  if (! $db->query("UPDATE $dataTableName SET State = 9, Reason = '重新報名' Where AutoNo = " . $_POST['AutoNo']))
    die($db->error()) ;
  if (! $db->query("Insert Into $dataTableName (" .
      "SignTime, IP, Name, Sex, ID, BirthDay, Parent, Email, Phone, " .
	  "CellPhone, Address, School, Grade, Introduction) Values ('" .
	  date("Y-m-d H:i:s", time()) . "', '" .
	  getenv ("REMOTE_ADDR") . "', '" .
	  $_POST['p_Name'] . "', " .
	  $_POST['p_Sex'] . ", '" .
	  $_POST['p_ID'] . "', '" .
	  $_POST['p_Birthday'] . "', '" .
	  $_POST['p_Parent'] . "', '" .
	  $_POST['p_Email'] . "', '" .
	  $_POST['p_Phone'] . "', '" .
	  $_POST['p_CellPhone'] . "', '" .
	  $_POST['p_Address'] . "', '" .
	  $_POST['p_School'] . "', " .
	  $_POST['p_Grade'] . ", '" .
	  $_POST['p_Introduction'] . "')")) {
    $messenge = "資料寫入失敗：新增資料失敗。" ;
    die($db->error()) ;
  }
  $db->freeResult() ;
  $db->close() ;
}

?>
<head>
  <meta name="google-site-verification" content="4MVHMfil4n3_K2IAMAvPMe9RfWroffKjmGr3lknaDdQ" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理系,台大物理營,物理營,寒假營隊,物理,Physics,Camp,NTU">
  <title>2011 台大物理營 Knock!Knock!</title>
  <meta name="description" content="website description" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="thickbox.js"></script>
  <link rel="stylesheet" href="../thickbox.css" type="text/css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
<style type="text/css">
<!--
body {
	background-image: url(../image/DSC0474711.JPG);
}
-->
</style></head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="green", allows you to change the colour of the text - other classes are: "blue", "orange", "red", "purple" and "yellow" -->
          <h1><span class="green">2011 台大物理營</span><br/>Knock! Knock!</h1>
        </div>
        <div id="menubar">
          <ul id="menu">
            <li><a href="../index.html">首頁</a></li>
            <li><a href="../p2_history.html">營隊簡史</a></li>
            <li><a href="../p3_info.html">活動資訊</a></li>
            <li class="tab_selected"><a href="../p4_signup.html">報名專區</a></li>
            <li><a href="../p5_faq.html">常見問題</a></li>
            <!--<li><a href="../board/board.php">留言板</a></li>-->
		    <li><a class="last" href="../p6_contact.html">聯絡我們</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="column2">
    <h1>線上報名系統</h1>
    <hr />
    
 <?php
if ($messenge != "") {
  echo "<p class='style3'>", $messenge, "</p>" ;
  echo "<p><a href='#' onclick='location.href=\"sign_up_form.php\";'>回上一頁</a>" ;
}
else
  echo "<script language='JavaScript'>alert('資料填寫成功！請接著至照片上傳系統上傳一張你的照片，才算報名成功喔^^'); location.href='../p4_signup.html';</script>" ;
?>

	</div>
      </div>
    </div>    
    <div id="footer">Copyright &copy; </span>B97<a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>學生會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a></div>
  </div>
  </div>
</body>
</html>
