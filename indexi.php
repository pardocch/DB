<?php require_once('Connections/test.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_test, $test);
$query_Recordset1 = "SELECT * FROM route";
$Recordset1 = mysql_query($query_Recordset1, $test) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
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
    <link href="../database/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../database/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../database/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <footer>
          <div class="row">
            <form>
                <p>
                  <!--<form name="form2" method="post" action="indexi.php">-->
                  <input type="submit" name="button2" id="button2" value="搜尋" >
                  <!-- </form> -->
                  <!-- <form name="form3" method="post" action="insert.php"> -->
                    <input type="submit" name="button3" id="button3" value="新增" >
                  <!-- </form> -->
                  <!-- <form name="form4" method="post" action="delete.php"> -->
                    <input type="submit" name="button4" id="button4" value="刪除" >
                  <!-- </form> -->
                  <!-- <form name="form5" method="post" action="update.php"> -->
                    <input type="submit" name="button5" id="button5" value="修改" >
                  <!-- </form> -->
                </p>

                 <?php
                  //while($row=mysql_fetch_row($Recordset1))
                  //if(isset($_POST["button2"])){
                    ?>

              <form name="form1" method="post" action="select.php">
				  <p>路線編號:
                    <select name="rNum" id="select">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <!-- <option value="" <?php //if (!(strcmp("", $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>(無)</option>
                      <option value="1" <?php //if (!(strcmp(1, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>1</option>
                      <option value="2" <?php //if (!(strcmp(2, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>2</option>
                      <option value="3" <?php //if (!(strcmp(3, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>3</option>
                      <option value="4" <?php //if (!(strcmp(4, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>4</option>
                      <option value="5" <?php //if (!(strcmp(5, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>5</option>
                      <option value="6" <?php //if (!(strcmp(6, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>6</option>
                      <option value="7" <?php //if (!(strcmp(7, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>7</option>
                      <option value="8" <?php //if (!(strcmp(8, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>8</option>
                      <option value="9" <?php //if (!(strcmp(9, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>9</option>
                      <option value="10" <?php //if (!(strcmp(10, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>10</option>
                      <option value="11" <?php //if (!(strcmp(11, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>11</option>
                      <option value="12" <?php //if (!(strcmp(12, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>12</option>
                      <option value="13" <?php //if (!(strcmp(13, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>13</option>
                      <option value="14" <?php //if (!(strcmp(14, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>14</option>
                      <option value="15" <?php //if (!(strcmp(15, $row_Recordset1['rNum']))) {echo "selected=\"selected\"";} ?>>15</option> -->
                    </select>
 					主題 :
 					<select name="Obj" id="select2">
            <option value="老聚落新生命">老聚落新生命</option>
            <option value="小漁人老智慧">小漁人老智慧</option>
            <option value="小農夫老技法">小農夫老技法</option>
            <option value="創意文化市集">創意文化市集</option>
            <option value="科學人玩能源">科學人玩能源</option>
   						<!-- <option value="" <?php //if (!(strcmp("", $row_Recordset1['Obj']))) {echo "selected=\"selected\"";} ?>>(無)</option>
   						<option value="老聚落新生命" <?php //if (!(strcmp("老聚落新生命", $row_Recordset1['Obj']))) {echo "selected=\"selected\"";} ?>>老聚落新生命</option>
   						<option value="小漁人老智慧" <?php //if (!(strcmp("小漁人老智慧", $row_Recordset1['Obj']))) {echo "selected=\"selected\"";} ?>>小漁人老智慧</option>
   						<option value="小農夫老技法" <?php //if (!(strcmp("小農夫老技法", $row_Recordset1['Obj']))) {echo "selected=\"selected\"";} ?>>小農夫老技法</option>
   						<option value="創意文化市集" <?php //if (!(strcmp("創意文化市集", $row_Recordset1['Obj']))) {echo "selected=\"selected\"";} ?>>創意文化市集</option>
   						<option value="科學人玩能源" <?php //if (!(strcmp("科學人玩能源", $row_Recordset1['Obj']))) {echo "selected=\"selected\"";} ?>>科學人玩能源</option> -->
 					</select>
 					適合年級 :
 					<select name="Grade" id="select4">
            <option value="低">低</option>
            <option value="中">中</option>
            <option value="高">高</option>
   						<!-- <option value="" <?php //if (!(strcmp("", $row_Recordset1['Grade']))) {echo "selected=\"selected\"";} ?>>(無)</option>
   						<option value="低" <?php //if (!(strcmp("低", $row_Recordset1['Grade']))) {echo "selected=\"selected\"";} ?>>低</option>
   						<option value="中" <?php //if (!(strcmp("中", $row_Recordset1['Grade']))) {echo "selected=\"selected\"";} ?>>中</option>
   						<option value="高" <?php //if (!(strcmp("高", $row_Recordset1['Grade']))) {echo "selected=\"selected\"";} ?>>高</option> -->
 					</select>
                </p>
                  <p>
                    <a button href="./select.php"input type="submit" name="button" id="button"  >搜尋路線</a>
                  </p>
                  <?php
                    /*if(isset($_POST["button"])){
                      header("Location: ../database/select.php");
                    }//}*/
                  ?>
            </form>
                <div class="col-lg-12">
                  <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
            </div>
          </form>
          </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../database/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../database/js/bootstrap.min.js"></script>

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
