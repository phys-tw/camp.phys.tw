<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ;
require_once("source/ID_test.php") ;
$messenge = "" ;
if (time() > $deadline)	//檢查時間
  $messenge = "報名已截止。" ;
else if ($_POST['Name'] == "")
  $messenge = "請填寫姓名。" ;
else if ($_POST['Sex'] == "")
  $messenge = "請填寫性別。" ;
else if ($_POST['ID'] == "")
  $messenge = "請填寫身分證字號。" ;
else if ($_POST['B_Year'] == "")
  $messenge = "請選取生日年份。" ;
else if ($_POST['B_Month'] == "")
  $messenge = "請選取生日月份。" ;
else if ($_POST['B_Day'] == "")
  $messenge = "請選取生日日期。" ;
else if ($_POST['ParentName'] == "")
  $messenge = "請填寫監護人姓名。" ;
else if ($_POST['Email'] == "")
  $messenge = "請填寫 E-mail。" ;
else if ($_POST['P_Prefix'] == "")
  $messenge = "請填寫家裡電話之區碼。" ;
else if ($_POST['P_Code'] == "")
  $messenge = "請填寫家裡電話。" ;
else if ($_POST['Address'] == "")
  $messenge = "請填寫地址。" ;
else if ($_POST['School'] == "")
  $messenge = "請填寫就讀高中。" ;
else if ($_POST['Grade'] == "")
  $messenge = "請選取年級。" ;
else if (preg_match('/^.+@[^\.].*\.[a-z]{2,}$/', $_POST['Email'])<=0)
  $messenge = "Email 格式錯誤！請檢查。" ;
else if (! ID_test($_POST['ID']))
  $messenge = "身分證字號錯誤！請檢查。" ;
else {
  require_once("source/db.php") ;
  require_once("source/school_trans.php") ;//統一學校名稱用
  $db = new DB;
  if (! $db->open())
    die($db->error()) ;
  $db->query("Select ID From $dataTableName Where ID = '" . $_POST['ID'] . "' And State != 9") ;
  if ($db->fetchArray($db->result) && $_POST['AutoNo'] == 0)
    $messenge = "您已報名過了。若資料有誤請至 <a href='edit_enter.php' target='_self'>修改個人報名資料</a> 頁面處理。" ;
  else {
	$p_Name = $_POST['Name'] ;
	$p_Sex = $_POST['Sex'] ;
	$p_ID = strtoupper($_POST['ID']) ;
	$p_Birthday = mktime(0, 0, 0, $_POST['B_Month'], $_POST['B_Day'], $_POST['B_Year']) ;
	$p_Parent = $_POST['ParentName'] ;
	$p_Email = $_POST['Email'] ;
	$p_Phone = "(" . $_POST['P_Prefix'] . ")" . $_POST['P_Code'] ;
	$p_CellPhone = $_POST['CellPhone'] ;
	$p_Address = $_POST['Address'] ;
	if (strcmp(school_trans(substr($_POST['School'], 0, 4) . ' '), substr($_POST['School'], 0, 4) . ' ') != 0)
	  $p_School = school_trans(substr($_POST['School'], 0, 4) . ' ') ;
	else
	  $p_School = school_trans($_POST['School']) ;
	$p_Grade = $_POST['Grade'] ;
	$p_Introduction = $_POST['Introduction'] ;
  }
  $db->freeResult() ;
  $db->close() ;
}

?>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理營,臺大物理營,物理營,大學營隊,物理,Physics,Camp,NTU">
  <title>2010 台大物理營 不可能的任物</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="../style/green.css" />
</head>

<body>
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
        我要報名　|　 
        <a href="./look_up_enter.php">查詢資料</a>　|　
        <a href="./edit_enter.php">修改資料</a>　|　
        <a href="./delete_enter.php">取消報名</a></p>
        <br />

	<div>
    <h2>資料確認</h2>
	
<?php
if ($messenge != "") {
  echo "<p align='center' class='style3'>", $messenge, "</p>" ;
  echo "<p align='center'><a href='javascript:history.back();'>回上一頁</a></p>" ;
    echo "<p align='center'><a href='../p4_signup.htm'>回「線上報名」</a></p>" ;
}
else {
?>

	  <p>請仔細檢查每一項資料，確認無誤後再送出。</p>
	  <form action="sign_up_save.php" method="post" name="form1">
	    <input name="AutoNo" type="hidden" value="<?= $_POST['AutoNo'] ?>">
	    <table width="500" border="0" cellspacing="0" cellpadding="0" style="margin-left: 10px">
          <tr>
            <td class="tditem">姓名：</td>
            <td class="style4"><input name="p_Name" type="hidden" value="<?= $p_Name ?>"><?= $p_Name ?></td>
          </tr>
          <tr>
            <td class="tditem">性別：</td>
            <td class="style4"><input name="p_Sex" type="hidden" value="<?= $p_Sex ?>"><?php
			  if ($p_Sex == 1) echo "男" ; else if ($p_Sex == 2) echo "女" ;
			?></td>
          </tr>
          <tr>
            <td class="tditem">身分證字號：</td>
            <td class="style4"><input name="p_ID" type="hidden" value="<?= $p_ID ?>"><?= $p_ID ?></td>
          </tr>
          <tr>
            <td class="tditem">出生年月日：</td>
            <td class="style4"><input name="p_Birthday" type="hidden" value="<?= date("Y-m-d", $p_Birthday) ?>"><?= date("Y/m/d", $p_Birthday) ?></td>
          </tr>
          <tr>
            <td class="tditem">監護人姓名：</td>
            <td class="style4"><input name="p_Parent" type="hidden" value="<?= $p_Parent ?>"><?= $p_Parent ?></td>
          </tr>
          <tr>
            <td class="tditem">E-mail：</td>
            <td class="style4"><input name="p_Email" type="hidden" value="<?= $p_Email ?>"><?= $p_Email ?></td>
          </tr>
          <tr>
            <td class="tditem">家裡電話：</td>
            <td class="style4"><input name="p_Phone" type="hidden" value="<?= $p_Phone ?>"><?= $p_Phone ?></td>
          </tr>
          <tr>
            <td class="tditem">手機：</td>
            <td class="style4"><input name="p_CellPhone" type="hidden" value="<?= $p_CellPhone ?>"><?= $p_CellPhone ?></td>
          </tr>
          <tr>
            <td class="tditem">地址：</td>
            <td class="style4"><input name="p_Address" type="hidden" value="<?= $p_Address ?>"><?= $p_Address ?></td>
          </tr>
          <tr>
            <td class="tditem">就讀高中：</td>
            <td class="style4"><input name="p_School" type="hidden" value="<?= $p_School ?>"><?= $p_School ?></td>
          </tr>
          <tr>
            <td class="tditem">年級：</td>
            <td class="style4"><input name="p_Grade" type="hidden" value="<?= $p_Grade ?>"><?php
			  if ($p_Grade == 1) echo "一年級" ; else if ($p_Grade == 2) echo "二年級" ; else if ($p_Grade == 3) echo "三年級" ;
			?></td>
          </tr>
          <tr>
            <td class="tditem" valign="top" style="padding-top: 2px">自我介紹：</td>
            <td valign="top" style="padding-top: 2px" class="style4"><input name="p_Introduction" type="hidden" value="<?= str_replace("\n", "<br>", stripslashes(htmlspecialchars($p_Introduction))) ?>"><?= str_replace("\n", "<br>", stripslashes(htmlspecialchars($p_Introduction))) ?></td>
          </tr>
          <tr align="center" valign="bottom">
            <td colspan="2" height="40">
			  <input name="Submit" type="submit" value="確認送出" class="submit">&nbsp;
              <input name="Reset" type="button" value="重新填寫"  class="submit" onclick="location.href='sign_up_form.php';">
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
