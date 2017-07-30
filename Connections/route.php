<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_route = "localhost";
$database_route = "route";
$username_route = "bernie";
$password_route = "1111";
$route = mysql_pconnect($hostname_route, $username_route, $password_route) or trigger_error(mysql_error(),E_USER_ERROR); 
?>