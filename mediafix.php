<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null){ ?>
<?php
// 
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
    default :
    $theValue = "";
    break;   
  }
  return $theValue;
}
include("mysql_connect.inc.php");
//require_once("connMysql.php");
//session_start();
//檢查是否經過登入
//if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	//header("Location: login.php");
//}
//執行登出動作
//if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	//unset($_SESSION["loginMember"]);
	//header("Location: index.php");
//}
//更新相簿
if(isset($_POST["action"])&&($_POST["action"]=="update")){	
	//更新相簿資訊
	$query_update = "UPDATE album SET album_title=?, album_date=?, album_location=?, album_desc=? WHERE album_id=?";
	$stmt = $db_link->prepare($query_update);
	$stmt->bind_param("ssssi", 
    $_POST["album_title"],
    $_POST["album_date"],
    $_POST["album_location"],
    $_POST["album_desc"],
    $_POST["album_id"]);
	 // GetSQLValueString($_POST["album_title"], "string"),
	 // GetSQLValueString($_POST["album_date"], "string"),
	 // GetSQLValueString($_POST["album_location"], "string"),
	 // GetSQLValueString($_POST["album_desc"], "string"),
	 // GetSQLValueString($_POST["album_id"]), "int");
	$stmt->execute();
	$stmt->close();
	//更新照片資訊
	for ($i=0; $i<count($_POST["ap_id"]); $i++) {
		$query_update = "UPDATE albumphoto SET ap_subject='{$_POST["update_subject"][$i]}' WHERE ap_id={$_POST["ap_id"][$i]}";	
		$db_link->query($query_update);
	}
	//執行檔案刪除
	for ($i=0; $i<count($_POST["delcheck"]); $i++) {
		$delid = $_POST["delcheck"][$i];
		$query_del = "DELETE FROM albumphoto WHERE ap_id={$_POST["ap_id"][$delid]}";	
		$db_link->query($query_del);
		unlink("photos/".$_POST["delfile"][$delid]);
	}
	//執行照片新增及檔案上傳
	for ($i=0; $i<count($_FILES["ap_picurl"]); $i++) {
   if ($_FILES["ap_picurl"]["tmp_name"][$i] != "") {
    $query_insert = "INSERT INTO albumphoto (album_id, ap_date, ap_picurl, ap_subject) VALUES (?, NOW(), ?, ?)";
    $stmt = $db_link->prepare($query_insert);
    $stmt->bind_param("iss", 
     GetSQLValueString($_POST["album_id"], "int"),
     GetSQLValueString($_FILES["ap_picurl"]["name"][$i], "string"), 
     GetSQLValueString($_POST["ap_subject"][$i], "string"));
    $stmt->execute();
    $stmt->close();
    if(!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"][$i] , "photos/" . $_FILES["ap_picurl"]["name"][$i])) die("檔案上傳失敗！");;		  
  }
}		
	//重新導向回到本畫面
header("Location: ?id=".$_POST["album_id"]);
}
//顯示相簿資訊SQL敘述句
$sid = 0;
if(isset($_GET["id"])&&($_GET["id"]!="")){
	$sid = GetSQLValueString($_GET["id"],"int");
}
$query_RecAlbum = "SELECT * FROM album WHERE album_id={$sid}";
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT * FROM albumphoto WHERE album_id={$sid} ORDER BY ap_date DESC";
//將二個SQL敘述句查詢資料到 $RecAlbum、$RecPhoto 中
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
  <link href="css/style.css" rel="stylesheet" type="text/css" />
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
    <h1 class="page-hrader" >數位串流-修改資訊</h1>

    <div class="container" align="Right">
      <button type="button" class="btn btn-primary" onclick="location.href='media.php'"">回管理首頁</button>
      <h4 class="bg-info">相片總數: <?php echo $total_records;?></h4>

    </div>   
  </div>
</div>
</tr>
<tr>
 <td >
  <div>
   <tr>
     <td>
      <table width="778" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
          <td background="images/album_r2_c1.jpg"><div id="mainRegion">
            <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
              <tr>
                <td>
                  <form action="mediafix.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <div class="normalDiv">
                      <p class="heading">相簿內容</p>
                      <p>相簿名稱：<input name="album_title" type="text" id="album_title" value="<?php echo $row_RecAlbum["album_title"];?>" />
                        <input name="album_id" type="hidden" id="album_id" value="<?php echo $row_RecAlbum["album_id"];?>" /></p>
                        <p>拍攝時間：<input name="album_date" type="text" id="album_date" value="<?php echo $row_RecAlbum["album_date"];?>" /></p>
                        <p>拍攝地點 ：<input name="album_location" type="text" id="album_location" value="<?php echo $row_RecAlbum["album_location"];?>" /></p>
                        <p>相簿說明：<textarea name="album_desc" id="album_desc" cols="45" rows="5"><?php echo $row_RecAlbum["album_desc"];?></textarea></p>
                        <hr />
                      </div>
                      <?php
                      $checkid=0;
                      while($row_RecPhoto=$RecPhoto->fetch_assoc()){
                        ?>
                        <!-- <div class="albumDiv"> -->
                        <div class="col-md-3 img-portfoilo">
                          <img src="photos/<?php echo $row_RecPhoto["ap_picurl"];?>" alt="<?php echo $row_RecPhoto["ap_subject"];?>" width="120" height="120"/>
                          <br>

                          <input name="ap_id[]" type="hidden" id="ap_id[]" value="<?php echo $row_RecPhoto["ap_id"];?>" />
                          <input name="delfile[]" type="hidden" id="delfile[]" value="<?php echo $row_RecPhoto["ap_picurl"];?>">
                          <input name="update_subject[]" type="text" id="update_subject[]" value="<?php echo $row_RecPhoto["ap_subject"];?>" size="15" />
                          <br>
                          <input name="delcheck[]" type="checkbox" id="delcheck[]" value="<?php echo $checkid;$checkid++ ?>" /> 刪除?
                        </div>
                        <!-- </div> -->
                        <?php }?>
                        <div class="normalDiv">
                          <hr />
                          <br>
                          <p class="heading">新增照片</p>
                          <div class="clear"></div>
                          <p>照片1<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                            說明1：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                            <p>照片2<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                              說明2：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                              <p>照片3<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                說明3：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                                <p>照片4<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                  說明4：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                                  <p>照片5<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                    說明5：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                                    <p>
                                      <input name="action" type="hidden" id="action" value="update">
                                      <input type="submit" name="button" id="button" value="確定修改" />
                                      <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                                    </p>
                                  </div>
                                </form></td>
                              </tr>
                            </table>
                          </div></td>
                        </tr>

                      </table>
                      <footer>
                        <div class="col-lg-12" align="center">
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
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=logon.php>';
      }
?>   				  