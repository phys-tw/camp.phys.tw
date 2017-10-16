<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<title>2014 台大物理營 Pauli Island</title>
	<link rel="icon" href="feynman.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="feynman.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript">
		function ajaxForm(str)
		{
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    document.getElementById("ajax_change_div").innerHTML=xmlhttp.responseText;
			    }

			  }
			xmlhttp.open("POST",str,true);
			xmlhttp.send();
		}

		function show(form){
			var str="ajax_form.php?form="+form;
			ajaxForm(str);
		}
		function showData()
		{
			var str="upload_data.php?type=lookup&id="+document.getElementById("lookup_id").value;
			ajaxForm(str);
		}
		function editData()
		{
			var str="upload_data.php?type=edit&id="+document.getElementById("edit_id").value;
			ajaxForm(str);
		}
		function cancel()
		{
			var ans=confirm('確定要取消報名嗎？');
			if(ans)
			{
				var str="upload_data.php?type=cancel&id="+document.getElementById("cancel_id").value;
				ajaxForm(str);
			}
		}
		function check_form()
		{
			var flag=1;

			var patID=/[a-zA-Z][0-9]{9}/g;
			var patYear=/[0-9]{4}/g;
			var patMonth=/[0-9]{1,2}/g;
			var patDay=/[0-9]{1,2}/g;
			var patEmail=/[a-zA-Z0-9_]{1,}@[a-zA-Z0-9_]{1,}\.[a-zA-Z0-9_]{1,}/g;
			var patPhone=/[0-9]{1,}-[0-9]{1,}/g;
			var patCell=/[0-9]{10}/g;
			var patGrade=/[1-3]{1}/g;

			if(document.getElementById("reg_name").value=="")
			{
				alert('要寫名字喔！');
				flag=0;
			}else if(document.getElementById("reg_parent").value==""){
				alert('要寫監護人的名字喔！');
				flag=0;
			}else if(document.getElementById("reg_addr").value==""){
				alert('要寫地址喔！');
				flag=0;
			}else if(document.getElementById("reg_school").value==""){
				alert('要寫學校喔！');
				flag=0;
			}else if(document.getElementById("reg_intro").innerHTML==""){
				alert('要寫自我介紹喔！');
				flag=0;
			}else if(!patID.test(document.getElementById("reg_id").value)){
				alert('身分證字號好像有點問題喔！');
				flag=0;
			}else if(!patYear.test(document.getElementById("reg_year").value)){
				alert('生日好像有點問題喔！');
				flag=0;
			}else if(!patMonth.test(document.getElementById("reg_month").value)){
				alert('生日好像有點問題喔！');
				flag=0;
			}else if(!patDay.test(document.getElementById("reg_day").value)){
				alert('生日好像有點問題喔！');
				flag=0;
			}else if(!patEmail.test(document.getElementById("reg_email").value)){
				alert('Email好像有點問題喔！');
				flag=0;
			}else if(!patPhone.test(document.getElementById("reg_home_phone").value)){
				alert('家裡電話好像有點問題喔！');
				flag=0;
			}else if(!patCell.test(document.getElementById("reg_cell_phone").value)){
				alert('手機好像有點問題喔！');
				flag=0;
			}else if(!patGrade.test(document.getElementById("reg_grade").value)){
				alert('年級好像有點問題喔！');
				flag=0;
			}
			return flag;
			
		}
		function submit_form()
		{
			if(check_form())
			{
				document.forms["reg_form"].submit();
			}
		}

	</script>
</head>


<body>

<div id="container">

	<div id="header">
		<div id="name">
			<h1 id="year">2014 台大物理營</h1>
			<h1 id="camp">PAULI ISLAND</h1>
		</div>
		<nav id="top_nav">
			<ul id="nav_ul">
				<li class="nav_li"><a class="nav_li_a" href="contact.php">聯絡我們</a></li>
				<li class="nav_li"><a class="nav_li_a" href="question.php">常見問題</a></li>
				<li class="nav_li"><a class="nav_li_a" href="enrolled.php">錄取名單</a></li>
				<li class="nav_li"><a class="nav_li_a" href="register.php">報名專區</a></li>
				<li class="nav_li"><a class="nav_li_a" href="info.php">活動資訊</a></li>
				<li class="nav_li"><a class="nav_li_a" href="history.php">營隊簡史</a></li>
				<li class="nav_li"><a class="nav_li_a" href="index.php">首頁</a></li>
			</ul>
		</nav>
	</div>

	<div id="content">
		<img src="wallpaper.jpg" id="wallpaper" />
		<div id="intro">
			<h2>報名專區</h2>
			<ul id="register_ul">
			<li><a onclick="show('signup')">我要報名</a></li>
			<li><a onclick="show('lookup')">查詢資料</a></li>
			<li><a onclick="show('edit')">修改資料</a></li>
			<li><a onclick="show('cancel')">取消報名</a></li>
			</ul>
			<div class="register_hide_div" id="ajax_change_div">
<?php
if(!empty($_SESSION))
{
	if($_SESSION["stat"]=="edit") echo "<div>修改成功！</div>";
	if($_SESSION["stat"]=="reg") echo "<div>報名成功！</div>";
	if($_SESSION["stat"]=="cancel") echo "<div>成功取消報名！</div>";
}
session_destroy();
?>
			</div>
		</div>
	</div>
	<div id="footer">2014 台大物理營 PAULI ISLAND</div>
</div>




</body>


</html>