<?php session_start(); ?>
<?php error_reporting(0);
      if(($_SESSION['username'] != null)&&($_SESSION['au'] != 0)){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>龍門國小遊學特色網</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/tablehref.css" rel="stylesheet">
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
                <div class="fill" style="background-image:url('./img/北寮奎壁山/1.jpg');"></div>
                <div class="carousel-caption">
                    <h3>北寮奎壁山</h3>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('./img/南寮村落/1.jpg');"></div>
                <div class="carousel-caption">
                    <h3>南寮社區</h3>
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
        <div class="row col-md-10">
          <div class="col-lg-12" >
              <h1 class="page-header">
                  最新消息
              </h1>
          </div>
          <form action="" method="post">
                  <div align="right">
                  <table width="617" border="0">
                    <!--修改資料 條件查詢 顯示全部 資料新增 刪除資料-->
                    <tr>
                    <input type="date" name="bookdatestart" id="bookdatestart" value="<?php echo date('Y-m-d'); ?>" min="<?php //echo date('Y-m-d'); ?>" max="<?php //date('Y-m-d');?>"></center>
                    </tr>
                    ~
                    <tr>
                    <input type="date" name="bookdateend" id="bookdateend" value="<?php echo date('Y-m-d'); ?>" min="<?php //echo date('Y-m-d'); ?>" max="<?php //date('Y-m-d');?>"></center>
                    </tr>
                    <tr>
                      <a button type="submit" class="btn btn-default" name="data_insert" id="data_insert" onclick="window.open('./data_insert.php', '新增', config='height=500,width=1800');">新增資料</a>
                      <input button type="submit" class="btn btn-default" name="data_search" id="data_search" value="　查詢　"></input>
                      <input button type="submit" class="btn btn-default" name="data_show" id="data_show" value="顯示全部"></input>
                      </tr>
                  </table>
                <div class="panel panel-default">
                    <div class="panel-body">
                                <div class="row">
                                  <table class="table table-striped table-hover">
                                    <thead>
                                    <tr class="success">
                                      <th>
                                        <h4 class="text-center col-md-8">
                                          <?php echo"發佈日期";?>
                                        </h4>
                                      </th>
                                      <th>
                                        <h4 class="text-center col-md-4">
                                          <?php echo"文章標題";?>
                                        </h4>
                                      </th>
                                    </tr>
                                  </thead>
                                  <!--資料庫連線-->
                                  <?php include("mysql_connect.inc.php");?>
                                  <?php
                                    $sql = "SELECT * FROM news ORDER BY `news`.`dbnewsid` DESC";
                                  if(isset($_POST['data_search'])){
                                    $sql = "SELECT * FROM news WHERE `dbnewstime` between '$_POST[bookdatestart]' and '$_POST[bookdateend]' ORDER BY `news`.`dbnewsid` DESC";
                                  }
                                  if(isset($_POST['data_show'])){
                                      $sql = "SELECT * FROM news ORDER BY `news`.`dbnewsid` DESC";
                                  }
                                  ?>
                                  <?php $result = mysql_query($sql);?>
                                  <?php $data_nums = mysql_num_rows($result);?>
                                  <?php $per = 5;?>
                                  <?php $pages = ceil($data_nums/$per);?>
                                  <?php if (!isset($_GET["page"])){
                                    $page = 1;
                                  }else{
                                    $page = intval($_GET["page"]);
                                  }
                                  $start = ($page-1)*$per;
                                  $result = mysql_query($sql.' LIMIT '.$start.', '.$per);?>
                                  <?php
                                  while($row = mysql_fetch_row($result)){?>
                                    <tbody>
                                      <h3>
                                      <tr>
                                        <td>
                                          <a id="dbnewstime" style="color:black;" ><h5 class="text-center col-md-8"><?php echo"$row[1]";?></h5></a>
                                        </td>
                                        <td>
                                          <?php echo'<a href="./news.php?A='.$row[0].'"'.'id="dbnewstitle" style="color:black;" ><h5 class="text-center col-md-4">'.((mb_strlen($row[2],'utf8')>10) ? mb_substr($row[2],0,10,'utf8') : $row[2]).' '.((mb_strlen($row[2],'utf8')>10) ? " ..." : "") .'</h5></a>';?>
                                        </td>
                                      </tr>
                                      </h3>
                                    </tbody>
                                    <?php }?>
                                  </table>
                                </div>

                       <p class="text-center">
                       <?php
                       //分頁頁碼
                       echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁';
                       echo "<br /><a href=?page=1>首頁</a> ";
                       echo "第 ";
                       for( $i=1 ; $i<=$pages ; $i++ ) {
                           if ( $page-3 < $i && $i < $page+3 ) {
                               echo "<a href=?page=".$i.">".$i."</a> ";
                           }
                       }
                       echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
                       ?>
                     </p>
                    </div>
                </div>
            </div>
          </form>
        </div>
        <div class="row col-md-2">
          <div class="col-lg-12" >
              <h1 class="page-header">
                  緣起
              </h1>
          </div>
          <div class="row">
            <div class="col-md-offset-2">
            <br><br><br><br><br><br>
          龍門國小位處澎湖縣本島之郊區，離近馬公市約二十分鐘車程，為規模六班，學生數僅67人的偏遠小校 ，受限於偏鄉工作機會的匱乏與少子化因素，學生人數持續下探；學區包含以漁業為主要經濟活動的龍門村，以及農業為主要經濟活動的尖山村，鄰近澎湖唯一的火力發電廠 — 尖山電廠；在檢視既有環境條件與學校發展現況後，擬從以下五個觀點著眼，配合學校既有的鄉土主題教學活動、特色課程等，規劃學校特色遊學的總體課程架構，並轉化為「東拂龍門風文化，西遊澎湖山與海」的特色遊學方案。
        </div>
        </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">友站連結</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="http://www.penghu.gov.tw/ch/">
                    <img class="img-responsive img-portfolio img-hover" src="./img/友站連結/澎湖縣政府.gif" alt="">
                    <p>澎湖縣政府</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="http://www.cwb.gov.tw/V7/forecast/taiwan/Penghu_County.htm">
                    <img class="img-responsive img-portfolio img-hover" src="./img/友站連結/中央氣象局.png" alt="">
                    <p>澎湖縣天氣預報</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="http://www.lmps.phc.edu.tw/new/">
                    <img class="img-responsive img-portfolio img-hover" src="./img/友站連結/龍門國小.png" alt="">
                    <p>澎湖縣龍門國小</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="https://www.facebook.com/lmps.phc.edu.tw/">
                    <img class="img-responsive img-portfolio img-hover" src="./img/友站連結/龍門國小臉書.jpg" alt="">
                    <p>龍小粉絲專頁</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="http://taqm.epa.gov.tw/taqm/tw/default.aspx/">
                    <img class="img-responsive img-portfolio img-hover" src="./img/友站連結/行政院環保署.png" alt="">
                    <p>空氣品質監測網</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="https://www.edu.tw/">
                    <img class="img-responsive img-portfolio img-hover" src="./img/友站連結/教育部.jpg" alt="">
                    <p>教育部</p>
                </a>
            </div>
        </div>

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
      else {
        include("indexforuser.php");
      }
?>
