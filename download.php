<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null && $_SESSION['au'] != 0){ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>下載區</title>
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
    <div class="col-lg-12 page-header text-center">
      <h2>下載區</h2>
    </div>
  </div>
<?php
header("charset=utf-8");
//取得目前路徑
$fileDir = "./uplode/";
//執行刪除動作
if(isset($_GET["action"])&&$_GET["action"]=="delete"){
 $_GET["file"] = iconv("utf-8", "big5", $_GET["file"]);
 unlink($_GET["file"]);
 $fileDir =pathinfo($_GET["file"],PATHINFO_DIRNAME);
 //重新轉頁到目前目錄中
}
//執行上傳動作
if(isset($_GET["action"])&&$_GET["action"]=="upload"){
 if($_FILES["upload"]["error"]==0){
  move_uploaded_file($_FILES["upload"]["tmp_name"],iconv("utf-8","big5", $_POST["dir"]."//".$_FILES["upload"]["name"]));
 }
 //重新轉頁到目前目錄中
 header("Location: ?dir=".$_POST["dir"]);
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>下載區</title>
</head>
<body>
<?php
header("charset=utf-8");
//若有URL參數dir，其值即為目前路徑
if(isset($_GET["dir"])&&$_GET["dir"]!=""){
 $fileDir = $_GET["dir"];
}
//目前路徑上一層路徑
$fileUplevel = dirname($fileDir);
//取得目前路徑中的內容
$fileResource = scandir($fileDir);
echo '<table  width="500" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#000000">';
//顯示目前路徑
echo '<tr ><td  bgcolor="#FAFAFA"colspan="3"></td></tr>';
echo '<tr ><td  bgcolor="#FAFAFA"colspan="3" align="center">';
//設定URL參數action為upload
echo '<form  action="?action=upload" method="post" enctype="multipart/form-data" name="form1" id="form1">';
//將上一層路徑帶進連結的URL參數dir中
echo '上傳檔案<input type="file" name="upload" style="height:25px" />';
echo '<input type="submit" name="button" style="height:25px" value="送出" />';
echo '<input name="dir" type="hidden" id="dir" value="'.$fileDir.'" /></form>';
echo '<tr ><td  bgcolor="#FAFAFA">名稱</td><td bgcolor="#FAFAFA" width="80" align="center">功能</td></tr>';
//顯示資料夾內容

foreach($fileResource as $fileName){
 if(is_dir($fileDir.'\\'.$fileName)){
  //不顯示相對路徑「.」及「..」
  if($fileName != "." && $fileName !=".."){
   echo '<td  bgcolor="#FAFAFA" width="120">&nbsp;</td><td  bgcolor="#FAFAFA" width="80">&nbsp;</td></tr>';
  }
 }
}
//顯示檔案的內容
foreach($fileResource as $fileName){
 if(is_file($fileDir.'\\'.$fileName)){
$fileName=iconv("BIG5", "UTF-8",$fileName);
  echo '<tr ><td  bgcolor="#FAFAFA" width="300">'.$fileName.'</td>';
  echo '<td  bgcolor="#FAFAFA" width="80" align="center">&nbsp<a href="?file='.$fileDir.'\\'.$fileName.'&action=delete">刪除</a>&nbsp;<a href="./uplode/'.$fileName.'" target="1_blank">下載</a></td></tr>';

 }
}
echo '</table>';
?>
</div>
</body>
</html>
      <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
                </div>
            </div>
        </footer>
      </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>
<?php }
      else{
        include("downloadforuser.php");
      }
?>
