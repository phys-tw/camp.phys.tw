<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ;
$messenge = "" ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else {
  require_once("source/db.php") ;
  $db = new DB;
  if (! $db->open()) {
    $messenge = "資料刪除失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  if (! $db->query("UPDATE $dataTableName SET State = 9, Reason = '自行取消報名' Where AutoNo = " . $_POST['AutoNo'])) {
    $messenge = "資料刪除失敗：無法刪除資料。" ;
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
    </div
      ><div id="column2">
        <h1><strong>線上報名系統</strong></h1>
        <hr />
        
        
	<div>

	<div>
	
<?php
if ($messenge != "") {
  echo "<p>", $messenge, "</p>" ;
}
else
  echo "<script language='JavaScript'>alert('您已取消報名。往後有機會歡迎再參加。'); location.href='../p4_signup.html';</script>" ;
?>

	</div>
      </div>
    </div>
    <div id="footer">Copyright &copy; </span>B97<a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>學生會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a></div>
  </div>
  </div>
</body>
</html>

