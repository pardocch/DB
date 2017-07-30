<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null && $_SESSION['au'] =! 0){ ?>
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
$sid = 0;
if(isset($_GET["id"])&&($_GET["id"]!="")){
	$sid = GetSQLValueString($_GET["id"],"int");
}
//計算點閱數
if(isset($_GET["action"])&&($_GET["action"]=="hits")){	
	$query_hits = "UPDATE albumphoto SET ap_hits=ap_hits+1 WHERE ap_id={$sid}";
	$db_link->query($query_hits);
	header("Location: albumphoto.php?id={$sid}");
}
//顯示相簿資訊SQL敘述句
$query_RecAlbum = "SELECT * FROM album WHERE album_id={$sid}";
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT * FROM albumphoto WHERE album_id={$sid} ORDER BY ap_date DESC";
//將二個SQL敘述句查詢資料儲存到 $RecAlbum、$RecPhoto 中
$RecAlbum = $db_link->query($query_RecAlbum);
$RecPhoto = $db_link->query($query_RecPhoto);
//計算照片總筆數
$total_records = $RecPhoto->num_rows;
//取得相簿資訊
$row_RecAlbum=$RecAlbum->fetch_assoc();
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
    <button type="button" class="btn btn-primary" onclick="location.href='media.php'"">相簿首頁</button>
  </div>   
</div>
</div>

</tr>
<tr>
 <td >
  <div>
   <tr>
     <td>
       <div class="container">


         <div class="subjectDiv" align="center"><h3 class="bg-info"><?php echo $row_RecAlbum["album_title"];?></h3> 
          <br>
          
        </div>
        <ul class="list-group">
          <li>
            <h4 class="bg-success">拍攝時間 ：<?php echo $row_RecAlbum["album_date"];?></h4>
          </li>
          <li>
            <h4 class="bg-success">拍攝地點 ：<?php echo $row_RecAlbum["album_location"];?></h4>
          </li>
          <li>
            <h4 class="bg-success">內容介紹 ：<?php echo nl2br($row_RecAlbum["album_desc"]);?></h4>
            <!--  -->
          </li>
        </ul>

        <?php while($row_RecPhoto=$RecPhoto->fetch_assoc()){?>
        <div class="col-md-3 img-portfoilo"> 
         <a href="?action=hits&id=<?php echo $row_RecPhoto["ap_id"];?>"><img src="photos/<?php echo $row_RecPhoto["ap_picurl"];?>" alt="<?php echo $row_RecPhoto["ap_subject"];?>" width="120" height="120"/></a>

         <div class="albuminfo"><a href="?action=hits&id=<?php echo $row_RecPhoto["ap_id"];?>"><?php echo $row_RecPhoto["ap_subject"];?></a><br />
           <span class="smalltext">點閱次數：<?php echo $row_RecPhoto["ap_hits"];?></span></div>
         </div>
         <?php }?></td>
       </tr>
     </div>
   </tr>
   <footer>
    <div class="col-lg-12" align="center">
     <h4 class="bg-info">照片總數：<?php echo $total_records;?></h4>
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
      include("albumshowforuser.php");
      }
?> 