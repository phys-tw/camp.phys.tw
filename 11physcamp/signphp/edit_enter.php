<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ;

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
      <div id="column1">
        <div class="sidebaritem">  
	</div>
      </div>
      <div id="column2">
        <h1><strong>線上報名系統</strong></h1>
        <hr /><p><br/><font size=3 color="#0F0F0F">|&nbsp;&nbsp; 
        <a href="sign_up_form.php"><font color="#CD6600">我要報名</font></a>&nbsp;&nbsp;&nbsp;|
          &nbsp;&nbsp;<a href="../imageupon/index.php"><font color="#CD6600">上傳照片</font></a>&nbsp;&nbsp;&nbsp;|
          &nbsp;&nbsp;<a href="look_up_enter.php"><font color="#CD6600">查詢資料</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
          修改資料&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="delete_enter.php"><font color="#CD6600">取消報名</font></a> &nbsp;&nbsp;|</font><br/></p>

	<div>
	
<?php
if (time() > $deadline) {
  echo "<p>報名已於 " . date("Y/m/d H:i:s", $deadline) . " 截止。</p>" ;
  echo "<p><a href='JavaScript: history.back();'>回上一頁</a></p>" ;
}
else {
?>	
	
	  <form action="sign_up_form.php" method="get" name="form1">
	  <p><font color='red'>修改報名資料將視為「重新報名」，非資料填寫錯誤請勿隨意修改。</font></p>
	    <table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="150" height="24">請輸入身分證字號：</td>
            <td><input name="ID" type="text" class="form1" id="ID" size="12" maxlength="10"></td>
          </tr>
          <tr valign="bottom">
            <td colspan="2" height="40">
			  <input name="Submit" type="submit" value="進入修改" class="submit">&nbsp;
              <input name="Reset" type="reset" value="重新輸入" class="submit">
			</td>
          </tr>
        </table>
	  </form>
	  
<?php
}
?>


	</div>
      </div>
    </div>
    <div id="footer">
    Copyright &copy; <a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>系學會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.moztw.org/" target="_blank">Firefox</div>
  </div>
  </div>
</body>
</html>
