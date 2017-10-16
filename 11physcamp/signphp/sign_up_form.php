<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

require_once("source/para.php") ; //引入deadline變數，在line 22, 167,168
$messenge = "" ;
$p_AutoNo = 0 ;
$p_Name = "" ;
$p_Sex = 0 ;
$p_ID = "" ;
$p_B_Year = "" ;
$p_B_Month = "" ;
$p_B_Day = "" ;
$p_Parent = "" ;
$p_Email = "" ;
$p_P_Prefix = "" ;
$p_P_Code = "" ;
$p_CellPhone = "" ;
$p_Address = "" ;
$p_School = "" ;
$p_Grade = 0 ;
$p_Introduction = "" ;
$p_State = 0 ;
if (time() > $deadline)
  $messenge = "報名已截止。" ;
else if (array_key_exists('ID', $_GET)) {
  require_once("source/db.php") ;
  $db = new DB;
  if (! $db->open()) {
    $messenge = "資料查詢失敗：無法開啟資料庫。" ;
    die($db->error()) ;
  }
  else if (! $db->query("Select * From $dataTableName Where ID = '" . $_GET['ID'] . "' Order By SignTime Desc")) {
    $messenge = "資料查詢失敗：無法讀取資料。" ;
    die($db->error()) ;
  }
  else if (! ($fetch_Assoc = $db->fetchAssoc()))
    $messenge = "找不到您的資料，可能身分證字號有誤，或報名未成功。<br>若要報名請至 <a href='..\p4_signup.html' target='_self'>報名系統</a> 填寫個人資料。" ;
  else {
	$p_SignTime = strtotime($fetch_Assoc['SignTime']) ;
	$p_Name = $fetch_Assoc['Name'] ;
	$p_Sex = $fetch_Assoc['Sex'] ;
	$p_ID = $fetch_Assoc['ID'] ;
	$p_B_Year = substr($fetch_Assoc['Birthday'], 0, 4) ;
	$p_B_Month = substr($fetch_Assoc['Birthday'], 5, 2) ;
	$p_B_Day = substr($fetch_Assoc['Birthday'], 8, 2) ;
	$p_Parent = $fetch_Assoc['Parent'] ;
	$p_Email = $fetch_Assoc['Email'] ;
	$pos1 = strpos($fetch_Assoc['Phone'], '(');
	$pos2 = strpos($fetch_Assoc['Phone'], ')');
	$p_P_Prefix = substr($fetch_Assoc['Phone'], $pos1 + 1, $pos2 - $pos1 - 1) ;
	$p_P_Code = substr($fetch_Assoc['Phone'], $pos2 + 1) ;
	$p_CellPhone = $fetch_Assoc['CellPhone'] ;
    $p_Address = $fetch_Assoc['Address'] ;
    $p_School = $fetch_Assoc['School'] ;
	$p_Grade = $fetch_Assoc['Grade'] ;
	$p_Introduction = $fetch_Assoc['Introduction'] ;
	$p_State = $fetch_Assoc['State'] ;
	if ($p_State != 9)
	  $p_AutoNo = $fetch_Assoc['AutoNo'] ;
  }
  $db->freeResult() ;
  $db->close() ;
}

?><head>
  <meta name="google-site-verification" content="4MVHMfil4n3_K2IAMAvPMe9RfWroffKjmGr3lknaDdQ" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="zh-TW" />
  <meta name="keywords" content="台大物理系,台大物理營,物理營,寒假營隊,物理,Physics,Camp,NTU">
  <title>2011 台大物理營 Knock!Knock!</title>
  <meta name="description" content="website description" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="thickbox.js"></script>
  <link rel="stylesheet" href="../thickbox.css" type="text/css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>

 

<style>
        fieldset {
            width: 50%;
            margin: 15px 0px 25px 0px;
            padding: 15px;
        }
        legend {
            font-weight: bold;
        }
        .button {
            text-align: right;
        }
        .button input {
            font-weight: bold;
        }

    </style>

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
      <div id="column2">
        <div>
          <form action="sign_up_check.php" method="post" name="form1">
            <div id="site_content2">
              <div class="sidebar">
                <h1>最新動態</h1>
        <h2>2010/10/27</h2>
      網站製作開始<br/>
       <br/>
       <h2>2010/11/02</h2>
      網站正式上線<br/>
       <br/>
      <h2>2010/11/22</h2>
      補充說明近來報名的常見問題 </div>
              <div id="column1">
                <div class="sidebaritem"> </div>
              </div>
              <div id="column">
                <h1><strong>線上報名系統</strong></h1>
                <hr />
                <p><br/><font size=3 color="#0F0F0F">|&nbsp;&nbsp; 
        我要報名&nbsp;&nbsp;&nbsp;|
          &nbsp;&nbsp;<a href="../imageupon/index.php"><font color="#CD6600">上傳照片</font></a>&nbsp;&nbsp;&nbsp;|
          &nbsp;&nbsp;<a href="look_up_enter.php"><font color="#CD6600">查詢資料</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
          <a href="edit_enter.php"><font color="#CD6600">修改資料</font></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="delete_enter.php"><font color="#CD6600">取消報名</font></a> &nbsp;&nbsp;|</font><br/></p>
                <div>
                  <?php
if ($messenge != "") {
  echo "<p>", $messenge, "</p>" ;
}
else if ($p_State == 9)
  echo "<script language='JavaScript'>location.href='look_up.php?ID=" . $_GET['ID'] . "';</script>" ;
else {
  if (array_key_exists('ID', $_GET))
    echo "<p><font color='red'>修改報名資料將視為「重新報名」，非資料填寫錯誤請勿隨意修改。</font></p>" ;
?>
                  <p style="font-size: 100%; font-weight: bold;">E-mail 欄位請填寫您經常使用的電子郵件信箱，以免遺漏任何重要資訊。<br/>
                  <p style="font-size: 100%; font-weight: bold;">並請於填寫完報名表單後，至上傳照片系統上傳一張你的照片，才算報名成功喔^^</p>
                  <input name="AutoNo" type="hidden" value="<?= $p_AutoNo ?>" />
                  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php if ($p_AutoNo != 0) { ?>
                    <tr>
                      <td class="tditem">報名時間：</td>
                      <td><?= date("Y/m/d H:i:s", $p_SignTime) ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td class="tditem">姓名：</td>
                      <td><input name="Name" type="text" class="form1" id="Name" size="12" maxlength="5" value="<?= $p_Name ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">性別：</td>
                      <td><input name="Sex" type="radio" value="1"<?= ($p_Sex == 1 ? ' checked' : '') ?> />
                        男　　
                        <input name="Sex" type="radio" value="2"<?= ($p_Sex == 2 ? ' checked' : '') ?> />
                        女</td>
                    </tr>
                    <tr>
                      <?php if ($p_AutoNo != 0) { ?>
                      <td class="tditem">身分證字號：</td>
                      <td><input name="ID" type="hidden" value="<?= $p_ID ?>" />
                        <?= $p_ID ?></td>
                      <?php } else { ?>
                      <td class="tditem">身分證字號：</td>
                      <td><input name="ID" type="text" class="form1" id="ID" size="12" maxlength="10" /></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td class="tditem">出生年月日：</td>
                      <td><select name="B_Year" class="form2" id="B_Year">
                        <option value="" selected="selected"></option>
                        <option value="1988"<?= ($p_B_Year == "1988" ? ' selected' : '') ?>>1988</option>
                        <option value="1989"<?= ($p_B_Year == "1989" ? ' selected' : '') ?>>1989</option>
                        <option value="1990"<?= ($p_B_Year == "1990" ? ' selected' : '') ?>>1990</option>
                        <option value="1991"<?= ($p_B_Year == "1991" ? ' selected' : '') ?>>1991</option>
                        <option value="1992"<?= ($p_B_Year == "1992" ? ' selected' : '') ?>>1992</option>
                        <option value="1993"<?= ($p_B_Year == "1993" ? ' selected' : '') ?>>1993</option>
                        <option value="1994"<?= ($p_B_Year == "1994" ? ' selected' : '') ?>>1994</option>
                        <option value="1995"<?= ($p_B_Year == "1995" ? ' selected' : '') ?>>1995</option>
                        <option value="1996"<?= ($p_B_Year == "1996" ? ' selected' : '') ?>>1996</option>
                      </select>
                        年
                        <select name="B_Month" class="form2" id="B_Month">
                          <option value="" selected="selected"></option>
                          <option value="1"<?= ($p_B_Month == "01" ? ' selected' : '') ?>>01</option>
                          <option value="2"<?= ($p_B_Month == "02" ? ' selected' : '') ?>>02</option>
                          <option value="3"<?= ($p_B_Month == "03" ? ' selected' : '') ?>>03</option>
                          <option value="4"<?= ($p_B_Month == "04" ? ' selected' : '') ?>>04</option>
                          <option value="5"<?= ($p_B_Month == "05" ? ' selected' : '') ?>>05</option>
                          <option value="6"<?= ($p_B_Month == "06" ? ' selected' : '') ?>>06</option>
                          <option value="7"<?= ($p_B_Month == "07" ? ' selected' : '') ?>>07</option>
                          <option value="8"<?= ($p_B_Month == "08" ? ' selected' : '') ?>>08</option>
                          <option value="9"<?= ($p_B_Month == "09" ? ' selected' : '') ?>>09</option>
                          <option value="10"<?= ($p_B_Month == "10" ? ' selected' : '') ?>>10</option>
                          <option value="11"<?= ($p_B_Month == "11" ? ' selected' : '') ?>>11</option>
                          <option value="12"<?= ($p_B_Month == "12" ? ' selected' : '') ?>>12</option>
                        </select>
                        月
                        <select name="B_Day" class="form2" id="B_Day">
                          <option value="" selected="selected"></option>
                          <option value="1"<?= ($p_B_Day == "01" ? ' selected' : '') ?>>01</option>
                          <option value="2"<?= ($p_B_Day == "02" ? ' selected' : '') ?>>02</option>
                          <option value="3"<?= ($p_B_Day == "03" ? ' selected' : '') ?>>03</option>
                          <option value="4"<?= ($p_B_Day == "04" ? ' selected' : '') ?>>04</option>
                          <option value="5"<?= ($p_B_Day == "05" ? ' selected' : '') ?>>05</option>
                          <option value="6"<?= ($p_B_Day == "06" ? ' selected' : '') ?>>06</option>
                          <option value="7"<?= ($p_B_Day == "07" ? ' selected' : '') ?>>07</option>
                          <option value="8"<?= ($p_B_Day == "08" ? ' selected' : '') ?>>08</option>
                          <option value="9"<?= ($p_B_Day == "09" ? ' selected' : '') ?>>09</option>
                          <option value="10"<?= ($p_B_Day == "10" ? ' selected' : '') ?>>10</option>
                          <option value="11"<?= ($p_B_Day == "11" ? ' selected' : '') ?>>11</option>
                          <option value="12"<?= ($p_B_Day == "12" ? ' selected' : '') ?>>12</option>
                          <option value="13"<?= ($p_B_Day == "13" ? ' selected' : '') ?>>13</option>
                          <option value="14"<?= ($p_B_Day == "14" ? ' selected' : '') ?>>14</option>
                          <option value="15"<?= ($p_B_Day == "15" ? ' selected' : '') ?>>15</option>
                          <option value="16"<?= ($p_B_Day == "16" ? ' selected' : '') ?>>16</option>
                          <option value="17"<?= ($p_B_Day == "17" ? ' selected' : '') ?>>17</option>
                          <option value="18"<?= ($p_B_Day == "18" ? ' selected' : '') ?>>18</option>
                          <option value="19"<?= ($p_B_Day == "19" ? ' selected' : '') ?>>19</option>
                          <option value="20"<?= ($p_B_Day == "20" ? ' selected' : '') ?>>20</option>
                          <option value="21"<?= ($p_B_Day == "21" ? ' selected' : '') ?>>21</option>
                          <option value="22"<?= ($p_B_Day == "22" ? ' selected' : '') ?>>22</option>
                          <option value="23"<?= ($p_B_Day == "23" ? ' selected' : '') ?>>23</option>
                          <option value="24"<?= ($p_B_Day == "24" ? ' selected' : '') ?>>24</option>
                          <option value="25"<?= ($p_B_Day == "25" ? ' selected' : '') ?>>25</option>
                          <option value="26"<?= ($p_B_Day == "26" ? ' selected' : '') ?>>26</option>
                          <option value="27"<?= ($p_B_Day == "27" ? ' selected' : '') ?>>27</option>
                          <option value="28"<?= ($p_B_Day == "28" ? ' selected' : '') ?>>28</option>
                          <option value="29"<?= ($p_B_Day == "29" ? ' selected' : '') ?>>29</option>
                          <option value="30"<?= ($p_B_Day == "30" ? ' selected' : '') ?>>30</option>
                          <option value="31"<?= ($p_B_Day == "31" ? ' selected' : '') ?>>31</option>
                        </select>
                        日 </td>
                    </tr>
                    <tr>
                      <td class="tditem">監護人姓名：</td>
                      <td><input name="ParentName" type="text" class="form1" id="ParentName" size="12" maxlength="5" value="<?= $p_Parent ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">E-mail：</td>
                      <td><input name="Email" type="text" class="form1" id="Email" size="40" maxlength="60" value="<?= $p_Email ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">家裡電話：</td>
                      <td> (
                        <input name="P_Prefix" type="text" class="form1" size="3" maxlength="3" value="<?= $p_P_Prefix ?>" />
                        )
                        <input name="P_Code" type="text" class="form1" size="11" maxlength="9" value="<?= $p_P_Code ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">手機：</td>
                      <td><input name="CellPhone" type="text" class="form1" id="CellPhone" size="12" maxlength="11" value="<?= $p_CellPhone ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">地址：</td>
                      <td><input name="Address" type="text" class="form1" id="Address" size="52" maxlength="150" value="<?= $p_Address ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">就讀高中：</td>
                      <td><input name="School" type="text" class="form1" id="School" size="30" maxlength="20" value="<?= $p_School ?>" /></td>
                    </tr>
                    <tr>
                      <td class="tditem">年級：</td>
                      <td><select name="Grade" class="form2" id="Grade">
                        <option value="" selected="selected"></option>
                        <option value="1"<?= ($p_Grade == 1 ? ' selected' : '') ?>>一年級</option>
                        <option value="2"<?= ($p_Grade == 2 ? ' selected' : '') ?>>二年級</option>
                        <option value="3"<?= ($p_Grade == 3 ? ' selected' : '') ?>>三年級</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td class="tditem" valign="top"><br/>
                        自我介紹： <br/>
                        (請盡量填寫)</td>
                      <td><textarea name="Introduction" cols="53" rows="25" class="form1"><?= html_entity_decode(str_replace("\n<br>", "\n", $p_Introduction)) ?>
            </textarea></td>
                      <?php // html_entity_decode(str_replace("<br>", "\n", $p_Introduction)) ?>
                    </tr>
                    <tr align="center" valign="bottom">
                      <td colspan="2" height="30"><input name="Submit" type="submit" value="送出" class="submit" />
                        &nbsp;
                        <input name="Reset" type="reset" value="重新填寫" class="submit" />
                        <?php if (array_key_exists('ID', $_GET)) echo '<input name="Back" type="button" value="返回" class="submit" onClick="location.href=\'edit_enter.php\';">'; ?></td>
                    </tr>
                  </table>
                  <?php
}
?>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="footer">
    Copyright &copy; <a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>系學會 | template designed by <a href="http://www.dcarter.co.uk" target="_blank">dcarter</a> | best view in <a href="http://www.moztw.org/" target="_blank">Firefox</div>
  </div>
  </div>
</body>
</html>
