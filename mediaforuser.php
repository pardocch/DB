<?php error_reporting(0);?>
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
session_start();
//檢查是否經過登入
//if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	//header("Location: login.php");
//}
//執行登出動作
//if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	//unset($_SESSION["loginMember"]);
	//header("Location: index.php");
//}
$sid = 0;
if(isset($_GET["id"])&&($_GET["id"]!="")){
	$sid = GetSQLValueString($_GET["id"],"int");
}
//刪除相簿
if(isset($_GET["action"])&&($_GET["action"]=="delete")){
	//刪除所屬相片
	$query_delphoto = "SELECT * FROM albumphoto WHERE album_id={$sid}";
	$delphoto = $db_link->query($query_delphoto);
	while($row_delphoto=$delphoto->fetch_assoc()){
		unlink("photos/".$row_delphoto["ap_picurl"]);
	}
	//刪除相簿
	$query_del1 = "DELETE FROM album WHERE album_id={$sid}";
	$query_del2 = "DELETE FROM albumphoto WHERE album_id={$sid}";
	$db_link->query($query_del1);
	$db_link->query($query_del2);
	//重新導向回到主畫面
	header("Location: media.php");
}
//預設每頁筆數
$pageRow_records = 12;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecAlbum = "SELECT album.album_id , album.album_date , album.album_location , album.album_title , album.album_desc , albumphoto.ap_picurl, count( albumphoto.ap_id ) AS albumNum FROM album LEFT JOIN albumphoto ON album.album_id = albumphoto.album_id GROUP BY album.album_id , album.album_date , album.album_location , album.album_title , album.album_desc ORDER BY album_date DESC";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecAlbum = $query_RecAlbum." LIMIT {$startRow_records}, {$pageRow_records}";
//以加上限制顯示筆數的SQL敘述句查詢資料到 $RecAlbum 中
$RecAlbum = $db_link->query($query_limit_RecAlbum);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecAlbum 中
$all_RecAlbum = $db_link->query($query_RecAlbum);
//計算總筆數
$total_records = $all_RecAlbum->num_rows;
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records/$pageRow_records);
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
  <script language="javascript">
    function deletesure(){
      if (confirm('\n您確定要刪除整個相簿嗎?\n刪除後無法恢復!\n')) return true;
      return false;
    }
  </script>
</head>
<body >
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
				<?php if(($_SESSION['username'] != null)&&$_SESSION['au'] == 0){ ?>
				<li>
						<a href="./logout.php">登出</a>
				</li>
				<?php }else{?>
				<li>
							<a href="./logon.php">登入</a>
				</li>
				<?php }?>
      </ul>
    </div>
  </div>
</nav>
<div class="row">
 <div class="col-lg-12" align="center">
  <h1 class="page-hrader" >數位串流-相簿管理</h1>

  <div class="container" align="Right">
    <!--<button type="button" class="btn btn-primary" onclick="location.href='index.php'"">相簿首頁</button>
    <button type="button" class="btn btn-primary" onclick="location.href='media.php'" >相簿管理</button>-->
    <?php /*?><button type="button" class="btn btn-primary" onclick="location.href='mediaadd.php'" >新增相簿</button><?php */?><hr>


  </div>
</div>
</div>

</tr>
<tr>
 <td >
  <div>
   <tr>
     <td>

       <?php  while($row_RecAlbum=$RecAlbum->fetch_assoc()){ ?>

       <div class="col-md-3 img-portfoilo" align="center">
         <a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"];?>"><?php if($row_RecAlbum["albumNum"]==0){?>
           <img  class="img-thumbnail" src="img/nopic.png" alt="暫無圖片" width="304" height="236" border="0" /><?php }else{?>
           <img class="img-thumbnail" src="photos/<?php echo $row_RecAlbum["ap_picurl"];?>" alt="<?php echo $row_RecAlbum["album_title"];?>" width="304" height="236" border="0" /><?php }?>
         </a>
         <div class="albuminfo" align="center"><a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"];?>"><h3 ><?php echo $row_RecAlbum["album_title"];?></h3></a>
           <span class="smalltext">共 <?php echo $row_RecAlbum["albumNum"];?> 張</span><br>
           <?php /*?><a href="?action=delete&id=<?php echo $row_RecAlbum["album_id"];?>" class="smalltext" onClick="javascript:return deletesure();">(刪除相簿)</a><br><?php */?>
         </div>
       </div>


       <?php }?>

     </td>
   </tr>
 </div>
</td>
</tr>
<footer >
  <div class="row" align="center">
    <div class="col-lg-12">
      <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
      <a href="?page=1">|&lt;</a> <a href="?page=<?php echo $num_pages-1;?>">&lt;&lt;</a>
      <?php }else{?>
      |&lt; &lt;&lt;
      <?php }?>
      <?php
      for($i=1;$i<=$total_pages;$i++){
        if($i==$num_pages){
         echo $i." ";
       }else{
        echo "<a href=\"?page=$i\">$i</a> ";
      }
    }
    ?>
    <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
    <a href="?page=<?php echo $num_pages+1;?>">&gt;&gt;</a> <a href="?page=<?php echo $total_pages;?>">&gt;|</a>
    <?php }else{?>
    &gt;&gt; &gt;|
    <?php }?>
  </div>
  <div class="col-lg-12" align="center">
    <br>
    <h4 class="bg-info">相簿總數: <?php echo $total_records;?></h4>
    <p>Copyright&copy; 虎尾科技大學資工系 2017</p>
  </div>
</div>
</footer>
</body>
</html>
<?php
$db_link->close();
?>
