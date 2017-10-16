<?php
require('config.php');
require('include.php');

if($_FILES['uploadimg']['error']>0){
    $uploadtype = false;
    switch($_FILES['uploadimg']['error']){
	    case 1:$errormsg = $message['error1'];break;
		case 2:$errormsg = $message['error2'];break;
		case 3:$errormsg = $message['error3'];break;
		case 4:$errormsg = $message['error4'];
	}
}

$suffix = strtolower(substr($_FILES['uploadimg']['name'],-4));
if(!valid_suffix($suffix)){
    $uploadtype = false;
	$errormsg = $message['error_valid'];
}


if($uploadtype === false){


}else{

/////////////////REMOVE////////////////
$userip = ip2long($_SERVER['REMOTE_ADDR']);
$date = date("Y_m_d_H-i-s");
$temp = $_FILES['uploadimg']['name'];
$main = substr($temp,0,strrpos($temp,'.'));
$name = strtolower($main);
$newpath = UPLOAD_DIR . $name . '_' . $date . $userip . $suffix;
if(is_uploaded_file($_FILES['uploadimg']['tmp_name'])){
    if(!move_uploaded_file($_FILES['uploadimg']['tmp_name'],$newpath)){
	    $uploadtype = false;
		$errormsg = $message['error_uploaded'];
	}else{
	    $uploadtype = true;
	}
}else{
    $uploadtype = false;
	$errormsg = $message['error_uploaded'];
}
/////////////////END_REMOVE////////////

}



if($uploadtype === false){
    //echo 'Error:'.$errormsg;
	//header('Location:'.SITE_DIR.'?error='.urlencode($errormsg));
}else{
    setcookie('uploaded',$time.'x'.$userip.$suffix.'|'.$_COOKIE['uploaded'],time()+3600*24*365);
	//header('Location:'.SITE_DIR.'?url='.urlencode($time.'x'.$userip.$suffix));
    //echo 'Your file URL: '.SITE_DIR.$newpath;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=SITE_NAME?> - <?=SITE_ADV?></title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="../thickbox.js"></script>
<link rel="stylesheet" href="../thickbox.css" type="text/css" media="screen" /> 
</head>
<body>

<div id="logo">
	<h1><a href="<?=SITE_DIR?>"><?=SITE_NAME?></a></h1>
	<p><?=SITE_ADV?></p>
</div>
<div id="menu">
	<ul>
		<li class="current_page_item"><a href="<?=SITE_DIR?>#upload"><?=$message['message']?></a></li>
		
		<li><a href="<?=SITE_DIR?>#terms"><?=$message['terms']?></a></li>	
	</ul>
</div>



<div id="page">
	<div id="page-bg">
	  <div id="latest-post">
<?php
if($uploadtype === false){
?>
<p>
<strong>Error:</strong><br />
<font size=3 color="#FF0000"><?=$errormsg?></font><br />
<a href="<?=SITE_DIR?>">&laquo; <font size=3>重新上傳</font></a>
</p>
<p>
  <?php
}else{
?>
</p>
<p>&nbsp; </p>
<p>
  <strong><?=$message['success']?></strong>
  <font size=3>點這裡看相片:</font> <a href="<?=SITE_DIR.$newpath?>" class="thickbox" target="_blank"><font size=3>Click Here!!</font></a>
  </p>
<p><br />
  <a href="<?=SITE_DIR?>">&laquo; <font size=3>回到報名專區</font></a>
</p></font>
<?php
}
?>
	  </div>



		<div style="clear: both;">&nbsp;</div>

	</div>
</div>

<div id="footer">Copyright &copy; </span>B97<a href="http://www.phys.ntu.edu.tw" target="_blank">台大物理系</a>學生會 | template designed by <a href="http://www.freecsstemplates.org/" target="_blank">Free CSS Templates</a> | best view in <a href="http://www.google.com/chrome" target="_blank">Google Chrome</a></div>
  </div>
</body>
</html>
