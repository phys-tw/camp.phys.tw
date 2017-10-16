<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ;

?>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理營,臺大物理營,物理營,大學營隊,物理,Physics,Camp,NTU">
  <title>2010 台大物理營 不可能的任物</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="../style/green.css" />
</head>

<body onLoad="document.form1.ID.focus();">
  <div id="main">
    <div id="logo"><h1>2010 台大物理營 不可能的任物</h1></div>
    <div id="content">
      <div id="menu">
        <ul>
          <li><a href="../index.htm">不可能的任物</a></li>
          <li><a href="../p2_intro.htm">營隊簡史</a></li>
          <li><a href="../p3_activity.htm">活動資訊</a></li>
          <li><a id="selected" href="../p4_signup.htm">報名專區</a></li>
          <li><a href="../p5_faq.htm">常見問題</a></li>
          <li><a href="../board/board.php">留言板</a></li>
          <li><a href="../p7_contact.htm">聯絡方式</a></li>
        </ul>
      </div>
      <div id="column1">
        <div class="sidebaritem">  
	<div class="sbihead">
            <h1>最新消息</h1>
	  </div>
          <!-- **** INSERT NEWS ITEMS HERE **** -->
          <h2>2009/12/19</h2>
          <pnews>報名已截止</pnews>
          <h2>2009/12/16</h2>
          <pnews><font color="maroon">行前通知已上線</font></pnews>
          <h2>2009/11/22</h2>
          <pnews>網站正式上線</pnews>
		  <h2>2009/11/12</h2>
          <pnews>網站製作開始</pnews>
          <h2></h2>
          <p></p>
          <p></p>
        </div>
      </div>
      <div id="column2">
        <h1>線上報名系統</h1>
        <p><a href="../p4_signup.htm">報名專區</a>　|　
        <a href="./sign_up_form.php">我要報名</a>　|　 
        <a href="./look_up_enter.php">查詢資料</a>　|　
        修改資料　|　
        <a href="./delete_enter.php">取消報名</a></p>
        <br />

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
