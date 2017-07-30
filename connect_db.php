<?php

$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "login";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }else{
// 	//echo "connection susses! ";
// }

if(!@mysql_connect($servername, $username, $password))
        die("無法對資料庫連線");
//, $db_user, $db_passwd
//資料庫連線採UTF8
mysql_query("SET NAMES utf8");

//選擇資料庫
if(!@mysql_select_db($dbname))
        die("無法使用資料庫");
