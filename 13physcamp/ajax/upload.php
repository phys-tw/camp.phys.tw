<?php
include '../include/connect.php';
$p_ID = strtoupper($_POST['ID']);
if($_FILES['uploadimg']['error']>0){
	echo "上傳錯誤";
	exit;
    $uploadtype = false;
    switch($_FILES['uploadimg']['error']){
	    case 1:$errormsg = $message['error1'];break;
		case 2:$errormsg = $message['error2'];break;
		case 3:$errormsg = $message['error3'];break;
		case 4:$errormsg = $message['error4'];
	}
}

$suffix = strtolower(substr($_FILES['uploadimg']['name'],-4));
if($suffix!='.jpg' && $suffix!='.png' && $suffix!='.gif'){
	echo "檔案格式不正確";
	exit;
    $uploadtype = false;
	$errormsg = $message['error_valid'];
}

$userip = ip2long($_SERVER['REMOTE_ADDR']);
$date = date("Y_m_d_H-i-s");
$temp = $_FILES['uploadimg']['name'];
$main = substr($temp,0,strrpos($temp,'.'));
$name = strtolower($main);
$newpath = $uploadDir.$date.$userip.$suffix;
if(is_uploaded_file($_FILES['uploadimg']['tmp_name'])){
    if(!move_uploaded_file($_FILES['uploadimg']['tmp_name'],$newpath)){
    	echo "上傳錯誤";
		exit;
	    $uploadtype = false;
		$errormsg = $message['error_uploaded'];
	}else{
	    $uploadtype = true;
	    

        //echo $p_ID;
        $sql = sprintf("SELECT * FROM `$table_name` WHERE `ID`='%s' AND `State`='0'", mysql_real_escape_string($p_ID));
        $result = mysql_query($sql) or die('Server Error');
        if (mysql_num_rows($result)!=1) {
            exit();
        }
        $row = mysql_fetch_row($result);
        $AutoNo = $row[0];
        $sql = sprintf("UPDATE `$table_name` SET `personal_img`='%s' WHERE `AutoNo`='%d'", 
        	mysql_real_escape_string($date.$userip.$suffix),
        	mysql_real_escape_string($AutoNo)
        	);
	    $result = mysql_query($sql) or die('Server Error');
	    echo '上傳成功<br>檔案：<a href="/13physcamp/upload/'.$date.$userip.$suffix.'" target="_blank">看照片</a>';
	}
}else{
	echo "上傳錯誤";
	exit;
    $uploadtype = false;
	$errormsg = $message['error_uploaded'];
}
?>
