<?php 
    $db_server = "localhost";
    $db_name = "physcamp";
    $db_user = "physcamp";
    //$db_user="root";
    $db_passwd = "campPHYSmysql";
    //$db_passwd = "shunlin1006";
    $table_name = "2k14_list"; /* Database Table Name for 2014 physcamp */
    // Create connection
	if(!$con=new mysqli($db_server,$db_user,$db_passwd)) die("Could Not Connect to Server!!!");
    $con->query("SET NAMES 'utf8'");
    // Check connection
	if ($con->connect_errno) {
    	printf("Connect failed: %s\n", $con->connect_error);
    	exit();
	}
    if(!$con->select_db($db_name)) die("無法對資料庫連線");
    $uploadDir='/homex/physcamp/public_html/14physcamp/upload/';
?>

