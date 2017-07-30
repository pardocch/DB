<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null){ ?>
<?php
		  mysql_query("SET NAMES utf8");
function GetSQLValueString($theValue, $theType) {
  switch ($theType) {
    case "string":
    $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";
    break;
    case "int":
    $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
    break;
    case "email":
    $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";
    break;
    case "url":
    $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";
    break;      
  }
  return $theValue;
}
include("mysql_connect.inc.php");
//require_once("connMysql.php");
$pid = 0;
if(isset($_GET["id"])&&($_GET["id"]!="")){
	$pid = GetSQLValueString($_GET["id"],"int");
}
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT album.album_title,albumphoto.* FROM album,albumphoto WHERE (album.album_id=albumphoto.album_id) AND ap_id={$pid}";
//將SQL敘述句查詢資料到 $result 中
$RecPhoto = $db_link->query($query_RecPhoto);
//取得相簿資訊
$row_RecPhoto=$RecPhoto->fetch_assoc();
?>
<html>
<head>
  <title>數位串流專區</title>
  <style type="text/css"></style>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">龍門國小遊學特色網</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="culture.php">文化遺產</a>
          </li>
          <li>
            <a href="community.php">社區資源</a>
          </li>
          <li>
            <a href="route.php">路線</a>
          </li>
          <li>
            <a href="media.php">數位串流</a>
          </li>
          <li>
            <a href="download.php">下載區</a>
          </li>
          <li>
            <a href="./logout.php">登出</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row">
   <div class="col-lg-12" align="center">
    <h1 class="page-hrader" >數位串流專區</h1>
    
    <div class="container" align="Right">
      <!--<button type="button" class="btn btn-primary" onclick="location.href='index.php'"">相簿首頁</button>
      <button type="button" class="btn btn-primary" onclick="location.href='admin.php'" >相簿管理</button>
-->
      <button type="button" class="btn btn-primary" onclick="location.href='albumshow.php?id=<?php echo $row_RecPhoto["album_id"];?>'">回上一頁</button>

      
    </div>   
  </div>
</div>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <tr>
      <td><div class="subjectDiv"><h3 class="bg-info" align="center"><?php echo $row_RecPhoto["album_title"];?></h3><br></div>

        <div class="photoDiv" align="center"><img src="photos/<?php echo $row_RecPhoto["ap_picurl"];?>" /></div>
        <div class="normalDiv">
          <p align="center"><h4 lass="bg-info" align="center" ><?php echo $row_RecPhoto["ap_subject"];?></h4></p>
        </div></td>
      </tr>
    </table>
  </div></td>
</tr>

</table>
<footer >
  <div class="row" align="center">

    <div class="col-lg-12">
      <p>Copyright&copy; 虎尾科技大學資工系 2017</p>
    </div>
  </div>
</footer> 
</body>
</html>
<?php
$db_link->close();
?>
<?php }
      else{
        include("albumphotoforuser.php");
      }
?> 