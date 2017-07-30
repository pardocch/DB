<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_test = "localhost";
$database_test = "news";
$username_test = "bernie";
$password_test = "1111";
$test = mysql_pconnect($hostname_test, $username_test, $password_test) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");
?>