<?php session_start(); ?>
<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>路線</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="index.php">龍門國小遊學特色網</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
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

          <?php if(($_SESSION['username'] != null)&&(($_SESSION['au'] != 0)||($_SESSION['au'] == 0))){ ?>
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <!-- Page Content -->
    <div class="container">
	<!-- Page Heading -->

      <!-- Footer -->
        <footer>
          <div class="row">
            <div class="col-lg-12" >
                <h1 class="page-header">
                    路線　　　　　　　　　　　　　　　　　　　　　　　　　
                    <a button class="btn btn-default" href="./email.php"><h3>我要預約!!</h3></a>
                </h1>
            </div>
                <!-- <p>
                  <input type="submit" name="button2" id="button2" value="搜尋">
                  <input type="submit" name="button3" id="button3" value="新增">
                  <input type="submit" name="button4" id="button4" value="刪除">
                  <input type="submit" name="button5" id="button5" value="修改">
                </p> -->
            <form name="form1" method="post" action="indexi.php">

                <!-- <p>
                  <input type="submit" name="button" id="button" value="返回">
                </p> -->
                  <table width="100%" border="1">
                    <tr>
                      <td>主題名稱</td>
    				          <td>適合年級</td>
    				          <td>活動時間</td>
    				          <td>人數限制</td>
   				            <!-- <td>路線負責人</td>
    				          <td>支援器材</td>
    				          <td>活動內容</td> -->
                    </tr>
                    <?php
					  include("mysql_connect.inc.php");
                    $sql = "SELECT * from route";
                    $result = mysql_query($sql);
                    while($row=mysql_fetch_row($result)){?>
                    <tr>
                      <td><?php echo'<a href="./routeselect.php?A='.$row[7].'"'.'id="dbnewstitle" style="color:black;" ><h5>'.$row[0].'</h5></a>';?></td>
                      <!-- <td><?php //echo $row[0]; ?></td> -->
                      <td><?php echo $row[1]; ?></td>
                      <td><?php echo $row[2]; ?></td>
                      <td><?php echo $row[3]; ?></td>
                      <!-- <td><?php //echo $row[4]; ?></td>
                      <td><?php //echo $row[5]; ?></td>
                      <td><?php //echo $row[6]; ?></td> -->
                    </tr>
                  <?php }?>
                  </table>
            </form>
                <div class="col-lg-12">
                  <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
                </div>
          </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="./js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
<?php
mysql_free_result($Recordset1);
?>
