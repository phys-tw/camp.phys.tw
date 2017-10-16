<?php
include("board/function.php");
session_save_path ('session');
session_start();

if($_GET['logout']=="true") endSession();
else if($_POST['password']=="physcampxu.6u06103" && $_POST['which']=="board"){
    	$_SESSION['auth'] = "SYSOP";
		$_SESSION['time'] = time();
        echo "<script>location.href='board/board.php';</script>";
        exit(0);
}
else if($_POST['password']=="yyhsiu696" && $_POST['which']=="reg"){
    	$_SESSION['auth'] = "reg_SYSOP";
		$_SESSION['time'] = time();
        echo "<script>location.href='signphp/list.php';</script>";
        exit(0);
}

?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-TW">

<head>
  <meta name="google-site-verification" content="4MVHMfil4n3_K2IAMAvPMe9RfWroffKjmGr3lknaDdQ" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理系,台大物理營,物理營,寒假營隊,物理,Physics,Camp,NTU">
  <title>2011 台大物理營 Knock!Knock!</title>
  <link rel="stylesheet" href="thickbox.css" type="text/css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

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
            <li class="tab_selected"><a href="index.html">首頁</a></li>
            <li><a href="p2_history.html">營隊簡史</a></li>
            <li><a href="p3_info.html">活動資訊</a></li>
            <li><a href="p4_signup.html">報名專區</a></li>
            <li><a href="p5_faq.html">常見問題</a></li>
            <li><a href="board/board.php">留言板</a></li>
		    <li><a class="last" href="p6_contact.html">聯絡我們</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="column2">
      
  <h1>留言板管理員登入</h1>
          <form name="form2" method="post" action="admin.php">
          <p>管理密碼：<input type="password" name="password" />
          <input type="hidden" value="board" name="which" />
          <input type="submit" name="Submit" value="送出" class="submit" /></p>
          </form>
          <p><font color="red">使用完畢請務必登出。</font></p>
          <br />
          
        <h1>報名系統管理介面</h1>
          <form name="form1" method="post" action="admin.php">
          <p>管理密碼：<input type="password" name="password" />
          <input type="hidden" value="reg" name="which" />
          <input type="submit" name="Submit" value="送出" class="submit" /></p>
          </form>
          <p><font color="red">使用完畢請務必登出。</font></p>
          <h2>版本紀錄</h2>
          <ul>
          <li>2006 物理營：小連製作本系統。</li>
          <li>2007 物理營：小飛俠將 GET method 改為 POST method。無法使用刪除功能。</li>
          <li>2009 物理營：茅茅將登入資料庫的資訊移到 source 內；將整個系統改為 utf-8 編碼；將 GET method 改為 session，所有功能可用。</li>
          <li>2011物理營：派大星嵌入imageupon照片上傳系統；可提供小隊員照片上傳，但並未整合進入資料庫。</li>
          </ul>
          <p>註：亦可直接使用 <a href="../phpMyAdmin/">phpMyAdmin 管理介面</a>。</p>

    </div>
      </div>
    <div id="footer">Copyright &copy; </span>B97<a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>學生會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a></div>
</body>
</html>
