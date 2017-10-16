<?php 
include './include/connect.php';
?>
<!DOCTYPE html>
 <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="zh-TW" />
		<meta charset="UTF-8">
		<meta name="author" content="Yen-chi Chen">
		<title>2013 台大物理營 Time Travelers - Viewer</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	
	<body>
		<section>
<?
$sql = sprintf("SELECT * FROM `2k13_list` WHERE `State`='0' ORDER BY `AutoNo`");
$result = mysql_query($sql) or die('Server Error');
while ($row = mysql_fetch_row($result)){
    echo '<div style="height:300px;display:inline-block;overflow:auto;width:170px;padding:10px;">AutoNo:'.htmlentities_m($row[0]).'<br/>Name:'.htmlentities_m($row[3]).'<br><img src="../upload/'.htmlentities_m($row[21]).'" style="width:150px;" /></div>';
}
?>
		</section>
		
		<div class="footer">By Yen-chi Chen, Viewer Page Protected by Password</div>
	</body>
</html>
<?php
function htmlentities_m($x) {
        return htmlentities($x, ENT_QUOTES, "UTF-8");
    }
?>