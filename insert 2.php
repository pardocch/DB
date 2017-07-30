<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>路線-新增</title>

    <!-- Bootstrap Core CSS -->
    <link href="../test/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../test/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../test/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="../test/index.html">龍門國小遊學特色網</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../test/culture.html">文化遺產</a>
                    </li>
                    <li>
                        <a href="../test/community.html">社區資源</a>
                    </li>
                    <li>
                        <a href="../test/route.html">路線</a>
                    </li>
                    <li>
                        <a href="../test/media.html">數位串流</a>
                    </li>
                    <li>
                        <a href="../test/download.html">下載區</a>
                    </li>
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
                <p>
                  <input type="submit" name="button2" id="button2" value="搜尋" action="indexi.php">
                  <input type="submit" name="button3" id="button3" value="新增" action="insert.php">
                  <input type="submit" name="button4" id="button4" value="刪除" action="delete.php">
                  <input type="submit" name="button5" id="button5" value="修改" action="update.php">
                </p>
                <form name="form1" method="post" action="indexi.php">
                  <p>路線編號:
                    <input type="text" name="textfield3" id="textfield3">
                    <br>
                主題:
                <input type="text" name="textfield" id="textfield">
                <br>
                名稱:
                <input type="text" name="textfield2" id="textfield2">
                <br>
                  適合年級:
                  <input type="text" name="textfield4" id="textfield4">
                  <br>
                  人數限制:
                  <input type="text" name="textfield5" id="textfield5">
                  <br>
                  支援器材:
                  <input type="text" name="textfield6" id="textfield6">
                  <br>
                  活度內容:
                  <input type="text" name="textfield7" id="textfield7">
                  </p>
                  <p>
                    <input type="submit" name="button" id="button" value="新增">
                    <br>
                  </p>
                </form>
                <p>&nbsp;</p>
                
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../test/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../test/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
