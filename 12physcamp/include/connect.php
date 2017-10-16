<?php 
    $db_server = "localhost";
    $db_name = "physcamp";
    $db_user = "physcamp";
    $db_passwd = "campPHYSmysql";
    $table_name = "2k12_list"; /* Database Table Name for 2012 physcamp */
    if(!mysql_connect($db_server, $db_user, $db_passwd)) die("無法對資料庫連線");
    if(!mysql_select_db($db_name)) die("無法對資料庫連線");
    mysql_query("SET NAMES utf8");
?>

