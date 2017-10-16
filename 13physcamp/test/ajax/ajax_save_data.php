<?php
    include '../include/connect.php';
    $AutoNo = $_POST['AutoNo'];
    //echo json_encode(array('error'=>$AutoNo));
    //exit();
    $p_Name = $_POST['Name'] ;
	$p_Sex = $_POST['Sex'] ;
	$p_ID = strtoupper($_POST['ID']) ;
	$p_B_Month = $_POST['B_Month'];
	$p_B_Day = $_POST['B_Day'];
	$p_B_Year = $_POST['B_Year'];
	$p_Birthday = date("Y-m-d", mktime(0, 0, 0, $p_B_Month, $p_B_Day, $p_B_Year));
	$p_ParentName = $_POST['ParentName'] ;
	$p_Email = $_POST['Email'] ;
	$p_Phone = "(" . $_POST['P_Prefix'] . ")" . $_POST['P_Code'] ;
	$p_CellPhone = $_POST['CellPhone'] ;
	$p_Address = $_POST['Address'] ;
    $p_School = $_POST['School'];
    $p_Grade = $_POST['Grade'] ;
	$p_Introduction = $_POST['Introduction'] ;
	$p_Size = $_POST['size'] ;
	
    if ($AutoNo=='0') {
    	//print_r($_FILES);
        if ($p_Name == "") {
            echo json_encode(array('error'=>"請填寫姓名。"));
            exit();
        } else if ($p_Sex == "") {
            echo json_encode(array('error'=>"請填寫性別。"));
            exit();
        }else if ($p_ID == "") {
            echo json_encode(array('error'=>"請填寫身分證字號。"));
            exit();
        }else if ($p_B_Year == "") {
            echo json_encode(array('error'=>"請選取生日年份。"));
            exit();
        }else if ($p_B_Month == ""){
            echo json_encode(array('error'=>"請選取生日月份。"));
            exit();
        }else if ($p_B_Day == ""){
            echo json_encode(array('error'=>"請選取生日日期。"));
            exit();
        }else if ($p_ParentName == ""){
            echo json_encode(array('error'=>"請填寫監護人姓名。"));
            exit();
        }else if ($p_Email == ""){
            echo json_encode(array('error'=>"請填寫 E-mail。"));
            exit();
        }else if ($_POST['P_Prefix'] == "") {
            echo json_encode(array('error'=>"請填寫家裡電話之區碼。"));
            exit();
        }else if ($_POST['P_Code'] == ""){
            echo json_encode(array('error'=>"請填寫家裡電話。"));
            exit();
        }else if ($p_Address == ""){
            echo json_encode(array('error'=>"請填寫地址。"));
            exit();
        }else if ($p_School == ""){
            echo json_encode(array('error'=>"請填寫就讀高中。"));
            exit();
        }else if ($p_Grade == ""){
            echo json_encode(array('error'=>"請選取年級。"));
            exit();
		}else if ($p_Size == ""){
            echo json_encode(array('error'=>"請選取營服大小。"));
            exit();
        }else if (preg_match('/^.+@[^\.].*\.[a-z]{2,}$/', $p_Email)<=0) {
            echo json_encode(array('error'=>"Email 格式錯誤！請檢查。"));
            exit();
        }
        $sql = sprintf("SELECT * FROM `$table_name` WHERE `ID`='%s' AND `State`='0'", mysql_real_escape_string($p_ID));
        $result = mysql_query($sql) or die('Server Error');
        if (mysql_num_rows($result)>0) {
            echo json_encode(array('data'=>"<p>你曾經報名過了，請勿重複報名</p>", 'message'=>'報名失敗'));
            exit();
        }
        
        $sql = sprintf("INSERT INTO `$table_name` (`AutoNo`, `IP`, `Name`, `Sex`, `ID`, `Birthday`, `Parent`, `Email`, `Phone`, `CellPhone`, `Address`, `School`, `Grade`, `Introduction`, `size`) VALUES (NULL, '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s')", 
			mysql_real_escape_string($_SERVER['REMOTE_ADDR']), 
			mysql_real_escape_string($p_Name), 
			mysql_real_escape_string($p_Sex), 
			mysql_real_escape_string($p_ID), 
			mysql_real_escape_string($p_Birthday), 
			mysql_real_escape_string($p_ParentName),
			mysql_real_escape_string($p_Email), 
			mysql_real_escape_string($p_Phone), 
			mysql_real_escape_string($p_CellPhone), 
			mysql_real_escape_string($p_Address), 
			mysql_real_escape_string($p_School), 
			mysql_real_escape_string($p_Grade), 
			mysql_real_escape_string($p_Introduction),
			mysql_real_escape_string($p_Size)
		);
        $result = mysql_query($sql) or die('Server Error');
        $sql2 = "SELECT LAST_INSERT_ID()";
        $result = mysql_query($sql2) or die('Server Error');
        $row = mysql_fetch_row($result);
        $data = array('data' => '<p>完成。<br>你的報名序號是：'.$row[0].'</p>', 'message'=>"報名成功");
        echo json_encode($data);
        exit();
    } else {
        $sql = sprintf("SELECT * FROM `$table_name` WHERE `ID`='%s' AND `State`='0'", mysql_real_escape_string($p_ID));
        $result = mysql_query($sql) or die('Server Error');
        if (mysql_num_rows($result)!=1) {
            $data = array('data' => '<p>發生錯誤，有任何問題請見「聯絡我們」網頁</p>', 'message'=>"發生錯誤！");
            echo json_encode($data);
            exit();
        }
        $row = mysql_fetch_row($result);
        $p_Img = $row[21];
        $sql = sprintf("UPDATE `$table_name` SET `State` = '98', `Reason`='更新資料' WHERE `AutoNo`='%d'", $row[0]);
        $result = mysql_query($sql) or die('Server Error');
        
        $sql = sprintf("INSERT INTO `$table_name` (`AutoNo`, `IP`, `Name`, `Sex`, `ID`, `Birthday`, `Parent`, `Email`, `Phone`, `CellPhone`, `Address`, `School`, `Grade`, `Introduction`, `size`, `personal_img`) VALUES (NULL, '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s')", 
        mysql_real_escape_string($_SERVER['REMOTE_ADDR']), 
        mysql_real_escape_string($p_Name), 
        mysql_real_escape_string($p_Sex), 
        mysql_real_escape_string($p_ID), 
        mysql_real_escape_string($p_Birthday), 
        mysql_real_escape_string($p_ParentName),
        mysql_real_escape_string($p_Email), 
        mysql_real_escape_string($p_Phone), 
        mysql_real_escape_string($p_CellPhone), 
        mysql_real_escape_string($p_Address), 
        mysql_real_escape_string($p_School), 
        mysql_real_escape_string($p_Grade), 
        mysql_real_escape_string($p_Introduction),
        mysql_real_escape_string($p_Size),
        mysql_real_escape_string($p_Img)
        );
        $result = mysql_query($sql) or die('Server Error');
        
        $data = array('data' => '<p>修改完成。</p>', 'message'=>"修改成功");
        echo json_encode($data);
        exit();
    }
	
  
?>
