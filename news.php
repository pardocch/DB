<?php session_start(); ?>
<?php error_reporting(0);
      if(($_SESSION['username'] != null)&&$_SESSION['au'] != 0){ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>最新消息</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/tablehref.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<style>
  pp{
    border-style: solid;
    border-width: 1px;
  }
  </style>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="./index.php">龍門國小遊學特色網</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                      <a href="./culture.php">文化遺產</a>
                  </li>
                  <li>
                      <a href="./community.php">社區資源</a>
                  </li>
                  <li>
                      <a href="./route.php">路線</a>
                  </li>
                  <li>
                      <a href="./media.php">數位串流</a>
                  </li>
                  <li>
                      <a href="./download.php">下載區</a>
                  </li>
                  <li>
                      <a href="./logout.php">登出</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
    <header id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('./img/南寮村落/1.jpg');"></div>
                <div class="carousel-caption">
                    <h3>南寮社區</h3>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('./img/北寮奎壁山/1.jpg');"></div>
                <div class="carousel-caption">
                    <h3>北寮奎壁山</h3>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('./img/青螺濕地/1.jpg');"></div>
                <div class="carousel-caption">
                    <h3>青螺濕地</h3>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
        <div class="container">

            <!-- 最新消息 -->
            <div class="row">
              <div class="col-lg-12" >
                  <h1 class="page-header">
                      最新消息
                  </h1>
              </div>
            </div>
<body>
  <!--資料庫連線-->
  <?php include("mysql_connect.inc.php");?>
  <?php $sql = "SELECT * FROM news";?>
  <?php $result = mysql_query($sql);?>
  <?php while($row = mysql_fetch_row($result)){
    if($_GET["A"]==$row[0]){?>
      <tbody>
      <div class="row">
          <pp class="text-left col-md-8"><h3><?php echo"$row[2]".'<br>';?></h3></pp>
          <pp class="text-left col-md-8"><h5><?php echo"$row[1]　　　　　　　　　$row[4]";?></h5></pp>
          <pp class="text-leftt col-md-8"><h3><?php echo"$row[3]";?></h3></pp>
      </div>
    </tbody>

  <?php }}?>
<form action="" method="post">
<?php echo'<a button type="submit" class="btn btn-default" name="data_update" id="data_update" href="./data_update.php?B='.$_GET["A"].'"'.'>修改資料</a>';?>
<input button type="submit" class="btn btn-default" name="data_delete" id="data_delete" value="　刪除　"></input>
<?php
if(isset($_POST['data_delete'])){
      $sql1 = "DELETE FROM `news` WHERE `news`.`dbnewsid` = '$_GET[A]'";
      $result1 = mysql_query($sql1);
	echo '已成功刪除!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
  }?>
</form>
          <footer>
              <div class="row">
                  <div class="col-lg-12">
                      <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
                  </div>
              </div>
          </footer>
      </div>
          <script src="./js/jquery.js"></script>
          <script src="./js/bootstrap.min.js"></script>
          <script>
          $( "#accordion" ).accordion();
          $('.carousel').carousel({
              interval: 5000 //changes the speed
          })
          </script>

      </body>

      </html>
<?php }
      else{
        include("newsforuser.php");
      }
?>
