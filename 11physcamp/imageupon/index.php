<?php
require('config.php');
require('include.php');
v();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<div id="site_content">
      <div class="sidebar">
        <h1>最新動態</h1>
        <h2>2010/10/27</h2>
      網站製作開始<br/>
       <br/>
       <h2>2010/11/02</h2>
      網站正式上線
<br/>
       <br/>
      <h2>2010/11/22</h2>
      補充說明近來報名的常見問題</div>
  <div id="content">
        <!-- insert the page content here -->
        <h1><strong>線上報名系統</strong></h1>
                <hr />
        <p><br/><font size=3 color="#0F0F0F">|&nbsp;&nbsp; 
        <a href="../signphp/sign_up_form.php"><font color="#CD6600">我要報名</font></a>&nbsp;&nbsp;&nbsp;|
          &nbsp;&nbsp;上傳照片</a>&nbsp;&nbsp;&nbsp;|
          &nbsp;&nbsp;<a href="../signphp/look_up_enter.php"><font color="#CD6600">查詢資料</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
          <a href="../signphp/edit_enter.php"><font color="#CD6600">修改資料</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="../signphp/delete_enter.php"><font color="#CD6600">取消報名</font></a> &nbsp;&nbsp;|</font>                
        <img src="logo.png" alt="<?=SITE_NAME?>" width="220" height="48" class="right" />
        <font size=3 color="#0F0F0F"><p><?=$message['terms']?>        
        <p><?=$message['terms_list']?>
	  </p>
		</font><hr />
<h1><?=$message['message']?></h1>
<p>
  <form enctype="multipart/form-data" action="upload.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="<?=MAX_SIZE?>" />
  <input type="file" name="uploadimg" />
  <input type="submit" value="<?=$message['submit']?>" />

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<div id="footer">Copyright &copy; </span>B97<a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>學生會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.google.com/chrome" target="_blank">Google Chrome</div>
</body>
</html>
