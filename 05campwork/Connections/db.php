<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_db = "localhost";
$database_db = "physcamp";
$username_db = "STsociety";
$password_db = "0569";
$db = mysql_pconnect($hostname_db, $username_db, $password_db) or die(mysql_error());
?>