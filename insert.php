<?
$link  =mysqli_connect("localhost","admin","admin") or die("無法連接".mysql_error());  // 建立MySQL的資料庫連結
mysqli_select_db($link,"news")or die ("無法選擇資料庫".mysql_error()); // 選擇資料庫

mysqli_query($link, 'SET CHARACTER SET utf8');

mysqli_query($link,  'SET collation_connection = 'utf8_general_ci"");

$sql ="INSERT INTO test (dbnewsid,dbnewstime,dbnewstitle,dbnewsvalues,dbnewsclass)  VALUES ( NULL ,'$_POST[dbnewstime]','$_POST[dbnewstitle]','$_POST[dbnewsvalues]','$_POST[dbnewsclass]')";  //新增資料

mysqli_query($link,$sql)or die ("無法新增".mysql_error()); //執行sql語法

mysql_close($link); //關閉資料庫連結

header( "location:index.php");  //回index.php
?>
