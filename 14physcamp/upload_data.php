<?php
include_once('bind_array.php');
include('connect.php');


if(!empty($_REQUEST["type"])){
	session_start();
	if($_REQUEST["type"]=="new_reg")
	{
		date_default_timezone_set("Asia/Taipei"); 
		$SignTime=date("Y-m-d H:i:s");
		$IP=$_SERVER['REMOTE_ADDR'];
		$Name=htmlentities($_POST["name"],ENT_QUOTES);
		$Sex=$_POST["sex"];
		$ID=$_POST["id"];
		$Birthday=sprintf("%04s",$_POST["year"])."/".sprintf("%02s", $_POST["month"])."/".sprintf("%02s", $_POST["day"]);
		$Parent=htmlentities($_POST["parent"],ENT_QUOTES);
		$Email=$_POST["email"];
		$Phone=$_POST["home_phone"];
		$CellPhone=$_POST["cell_phone"];
		$Address=htmlentities($_POST["addr"],ENT_QUOTES);
		$School=htmlentities($_POST["school"],ENT_QUOTES);
		$Grade=htmlentities($_POST["grade"],ENT_QUOTES);
		$Introduction=htmlentities($_POST["intro"],ENT_QUOTES);

		$query="INSERT INTO ".$table_name." (SignTime,IP,Name,Sex,ID,Birthday,Parent,Email,Phone,CellPhone,Address,School,Grade,Introduction) VALUES ";
		if ($stmt = $con->prepare($query."(?,?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
	    	$stmt->bind_param("sssissssssssis",$SignTime,$IP,$Name,$Sex,$ID,$Birthday,$Parent,$Email,$Phone,$CellPhone,$Address,$School,$Grade,$Introduction);
	    	$stmt->execute();
	    	$stmt->close();
		}	
		if($_SESSION["stat"]!="edit")
		{
			$_SESSION["stat"]="reg";
		}

		header("Location: register.php");
	}
	elseif($_REQUEST["type"]=="edit")
	{
				$Id=$_REQUEST["id"];
		if($stmt =$con->prepare("SELECT * FROM ".$table_name." WHERE Id=? ORDER BY AutoNo DESC")) {

			$stmt->bind_param("s",$Id);
			$stmt->execute();
			bind_array($stmt,$row);
	    	//$result=mysqli_stmt_get_result();
	    	//$stmt->close();
			if($stmt->fetch())
			{
				$Name=$row["Name"];
				$Sex=$row["Sex"];
				$ID=$row["ID"];
				$Birthday=$row["Birthday"];
				$arr=str_split($Birthday);
				$Year=$arr[0].$arr[1].$arr[2].$arr[3];
				$Month=$arr[5].$arr[6];
				$Day=$arr[8].$arr[9];
				$Parent=$row["Parent"];
				$Email=$row["Email"];
				$Phone=$row["Phone"];
				$CellPhone=$row["CellPhone"];
				$Address=$row["Address"];
				$School=$row["School"];
				$Grade=$row["Grade"];
				$Introduction=$row["Introduction"];
				$M="";
				$F="";
				if($Sex==1)
				{
					$M="checked";
				}
				else
				{
					$F="checked";
				}

ECHO <<<END

				<h2>查詢資料</h2>
				<form name="signup" method="POST" action="upload_data.php" onsubmit="">
					<div class="reg_q">姓名：</div><div class="reg_a"><input type="text" name="name" maxlength="10" value="$Name" /></div>
					<div class="reg_q">性別：</div><div class="reg_a">男<input type="radio" name="sex" value="1" $M />　女<input type="radio" name="sex" value="2" $F /></div>
					<div class="reg_q">身分證字號：</div><div class="reg_a"><input type="text" name="id" maxlength="10" value="$ID" /></div>
					<div class="reg_q">生日：</div>
					<div class="reg_a">
						<input type="text" name="year" maxlength="4" width="4" size="3" value="$Year" />年
						<input type="text" name="month" maxlength="2" max="12" size="1" value="$Month" />月
						<input type="text" name="day" maxlength="2" max="31" size="1" value="$Day" />日
					</div>
					<div class="reg_q">監護人姓名：</div><div class="reg_a"><input type="text" name="parent" maxlength="10" value="$Parent" /></div>
					<div class="reg_q">E-mail：</div><div class="reg_a"><input type="text" name="email" value="$Email" /></div>
					<div class="reg_q">家裡電話：</div><div class="reg_a"><input type="text" name="home_phone" value="$Phone" /></div>
					<div class="reg_q">手機：</div><div class="reg_a"><input type="text" name="cell_phone" maxlength="10" value="$CellPhone" /></div>
					<div class="reg_q">地址：</div><div class="reg_a"><input type="text" name="addr" value="$Address" /></div>
					<div class="reg_q">就讀高中：</div><div class="reg_a"><input type="text" name="school" value="$School" /></div>
					<div class="reg_q">年級：</div><div class="reg_a"><input type="text" name="grade" maxlength="1" value="$Grade" /></div>
					<div class="reg_q">自我介紹：</div><div class="reg_a"><textarea name="intro" style="width:95%;" rows="6">$Introduction</textarea></div>
					<input type="hidden" name="type" value="new_reg" />
					<div class="reg_q" style="float:right;margin-right:20%;"><input type="submit" value="送出" style="width:150px;height:30px;border:2px black outset" /></div>
				</form>
END;
				$stmt->close();
			}
			else
			{
				echo "查無報名資料！";
			}
			
			$_SESSION["stat"]="edit";
	    }
	}
	elseif($_REQUEST["type"]=="lookup")
	{
		$Id=$_REQUEST["id"];
		if($stmt =$con->prepare("SELECT * FROM ".$table_name." WHERE Id=? ORDER BY AutoNo DESC")) {

			$stmt->bind_param("s",$Id);
			$stmt->execute();
			bind_array($stmt,$row);
	    	//$result=mysqli_stmt_get_result();
	    	//$stmt->close();
			if($stmt->fetch())
			{
				$Name=$row["Name"];
				$Sex=$row["Sex"];
				$ID=$row["ID"];
				$Birthday=$row["Birthday"];
				$arr=str_split($Birthday);
				$Year=$arr[0].$arr[1].$arr[2].$arr[3];
				$Month=$arr[5].$arr[6];
				$Day=$arr[8].$arr[9];
				$Parent=$row["Parent"];
				$Email=$row["Email"];
				$Phone=$row["Phone"];
				$CellPhone=$row["CellPhone"];
				$Address=$row["Address"];
				$School=$row["School"];
				$Grade=$row["Grade"];
				$Introduction=$row["Introduction"];
				if($Sex==1)
				{
					$Sex="男";
				}
				else
				{
					$Sex="女";
				}

ECHO <<<END

				<h2>查詢資料</h2>
				<form name="signup" method="POST" action="upload_data.php" onsubmit="">
					<div class="reg_q">姓名：</div><div class="reg_a">$Name</div>
					<div class="reg_q">性別：</div><div class="reg_a">$Sex</div>
					<div class="reg_q">身分證字號：</div><div class="reg_a">$ID</div>
					<div class="reg_q">生日：</div>
					<div class="reg_a">
						$Year 年
						$Month 月
						$Day 日
					</div>
					<div class="reg_q">監護人姓名：</div><div class="reg_a">$Parent</div>
					<div class="reg_q">E-mail：</div><div class="reg_a">$Email</div>
					<div class="reg_q">家裡電話：</div><div class="reg_a">$Phone</div>
					<div class="reg_q">手機：</div><div class="reg_a">$CellPhone</div>
					<div class="reg_q">地址：</div><div class="reg_a">$Address</div>
					<div class="reg_q">就讀高中：</div><div class="reg_a">$School</div>
					<div class="reg_q">年級：</div><div class="reg_a">$Grade</div>
					<div class="reg_q">自我介紹：</div><div class="reg_a"><div name="intro" style="width:95%;" rows="6">$Introduction</div></div>
					<input type="hidden" name="type" value="new_reg" />
				</form>
END;
				$stmt->close();
			}
			else
			{
				echo "查無報名資料！";
			}
			
			$_SESSION["stat"]="look";
	    }
	}
	elseif($_REQUEST["type"]=="cancel")
	{
		$Id=$_REQUEST["id"];
		if($stmt =$con->prepare("DELETE FROM ".$table_name." WHERE Id=?")) {

			$stmt->bind_param("s",$Id);
			$stmt->execute();
			$stmt->close();
		}
		else
		{
			echo "查無報名資料！";
		}
			
		$_SESSION["stat"]="cancel";
		echo "<div>成功取消報名！</div>";
	}
	else
	{

	}

}
$con->close();



?>