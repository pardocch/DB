<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null){ ?>
<?php
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

//新增相簿
if(isset($_POST["action"])&&($_POST["action"]=="add")){
	$query_insert = "INSERT INTO album (album_title, album_date, album_location, album_desc) VALUES (?, ?, ?, ?)";
	$stmt = $db_link->prepare($query_insert);
	$stmt->bind_param("ssss", 
    GetSQLValueString($_POST["album_title"], "string"),
    GetSQLValueString($_POST["album_date"], "string"),
    GetSQLValueString($_POST["album_location"], "string"),
    GetSQLValueString($_POST["album_desc"], "string"));
	$stmt->execute();

	//取得新增的相簿編號
	$album_pid = $stmt->insert_id;
	$stmt->close();
	
	for ($i=0; $i<count($_FILES["ap_picurl"]["name"]); $i++) {
   if ($_FILES["ap_picurl"]["tmp_name"][$i] != "") {
    $query_insert = "INSERT INTO albumphoto (album_id, ap_date, ap_picurl, ap_subject) VALUES (?, NOW(), ?, ?)";
    $stmt = $db_link->prepare($query_insert);
    $stmt->bind_param("iss", 
     GetSQLValueString($album_pid, "int"),
     GetSQLValueString($_FILES["ap_picurl"]["name"][$i], "string"),
     GetSQLValueString($_POST["ap_subject"][$i], "string"));
    $stmt->execute();
    if(!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"][$i] , "photos/" . $_FILES["ap_picurl"]["name"][$i])) die("檔案上傳失敗！");
    $stmt->close();
  }
}

	//重新導向到修改畫面
header("Location: media.php");
}	
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
    <h1 class="page-hrader" >數位串流-新增相簿</h1>

    <div class="container" align="Right">
      <button type="button" class="btn btn-primary" onclick="location.href='media.php'">回上一頁</button>
      <div class="row"></div>
    </div>   

  </div>
</div>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td background="images/album_r2_c1.jpg"><div id="mainRegion">
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
        <tr>
          <td><!-- <div class="subjectDiv"> 數位串流管理界面-相增相簿</div> -->

            <div class="normalDiv">
              <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <p>相簿名稱：<input type="text" name="album_title" id="album_title" /></p>
                <p>拍攝時間：<input name="album_date" type="text" id="album_date" value="<?php echo date("Y-m-d ");?>" /></p>
                <p>拍攝地點 ：<input type="text" name="album_location" id="album_location" /></p>
                <p>相簿說明：<textarea name="album_desc" id="album_desc" cols="45" rows="5"></textarea></p>
                <hr />
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
                            <input name="action" type="hidden" id="action" value="add">    
                            <input type="submit" name="button" id="button" value="確定新增" />
                            <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                          </p>
                        </form>
                      </div></td>
                    </tr>
                  </table>
                </div></td>
              </tr>
            </table>
            <footer >
              <hr>
              <div class="row" align="left">

                <div class="col-lg-12">
                  <p>Copyright&copy; 虎尾科技大學資工系 2017</p>
                </div>
              </div>
            </footer> 
          </body>
          </html>
<?php }
      else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=logon.php>';
      }
?>          