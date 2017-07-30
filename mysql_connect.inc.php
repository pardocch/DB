<?php
mysql_query("SET NAMES utf8");
//資料庫設定
//資料庫位置
$db_host = "localhost";
//資料庫名稱
$db_name = "db";
//資料庫管理者帳號
$db_username = "admin";
//資料庫管理者密碼
$db_password = "admin";
$db_link = @new mysqli($db_host, $db_username, $db_password, $db_name);
//對資料庫連線
if(!@mysql_connect($db_host, $db_username, $db_password))
        die("無法對資料庫連線");
//, $db_user, $db_passwd
//資料庫連線採UTF8
mysql_query("SET NAMES utf8");
$db_link->query("SET NAMES 'utf8'");
//選擇資料庫
if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
?>
