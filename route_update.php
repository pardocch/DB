<?php session_start(); ?>
<?php error_reporting(0);
      if(($_SESSION['username'] != null)&&$_SESSION['au'] != 0){ ?>
<!DOCTYPE html>
<html lang="en">
</script>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>路線</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="row"; width= "90%">
  <form action="" method="post"><!--./insert.php-->
  <table class="table table-striped table-hover">
    <thread>
    <tr class="success">
      <th>
        <h4 class="text-center" >
          <?php echo"主題名稱";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"適合年級";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"活動時間";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"人數限制";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"路線負責人";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"支援器材";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"活動內容";?>
        </h4>
      </th>
    </tr>
  </thread>
  <tbody>
    <tr class="info">
      <!--<th>
        <center><input type="text" name="newstime" id="newstime"></center>-->
        <!--<input type="date" id="bookdate" value="<?php //echo date('Y-m-d'); ?>" min="<?php //echo date('Y-m-d'); ?>" max="2017-05-31">-->
      <!--</th>-->

      <?php
        include("mysql_connect.inc.php");?>
        <?php $sql = "SELECT * FROM route";?>
        <?php $result = mysql_query($sql);?>
        <?php while($row = mysql_fetch_row($result)){
          if($_GET["B"]==$row[7]){
              $rrname = $row[0];
              $rrgrade = $row[1];
              $rrtime =$row[2];
              $rrpeople =$row[3];
              $rrsupervisor =$row[4];
              $rrtool =$row[5];
              $rrvalue =$row[6];
          }break;}?>
      <th>
        <center><input type="text" name="rname" id="rname" size="8" value="<?php echo $rrname;?>"></center>
      </th>
      <th>
        <center><input type="text" name="rgrade" id="rgrade" size="8" value="<?php echo $rrgrade;?>"></center>
      </th>
      <th>
        <center><input type="text" name="rtime" id="rtime" size="8" value="<?php echo $rrtime;?>"></center>
      </th>
      <th>
        <center><input type="text" name="rpeople" id="rpeople" size="8" value="<?php echo $rrpeople;?>"></center>
      </th>
      <th>
        <center><input type="text" name="rsupervisor" id="rsupervisor" size="8" value="<?php echo $rrsupervisor;?>"></center>
      </th>
      <th>
        <center><input type="text" name="rtool" id="rtool" size="8" value="<?php echo $rrtool;?>"></center>
      </th>
      <th>
        <center><textarea cols="15" rows="5" name="rvalue" id="rvalue" value=""><?php echo $rrvalue;?></textarea></center>
      </th>
    </tr>
    <!--<input type="submit" name="button" id="button" value="新增" onclick="window.close()">-->
  </tbody>
</table>
<td colspan="1">
<div class="row col-md-10" align="right">
<table width="90%" border="0">
<tr>
<input button type="submit" class="btn btn-default" name="update" id="update" value="　　　修　　改　　　" onclick=""></input>
&nbsp;&nbsp;&nbsp;

<input button type="submit" class="btn btn-default" name="closebtn" id="closebtn" value="　　回　上　一　頁　　" onclick=""></input>
</tr>
</table>
</div>
</td>
<?php
  include("mysql_connect.inc.php");?>
  <?php $sql = "SELECT * FROM route";?>
  <?php $result = mysql_query($sql);?>
  <?php while($row = mysql_fetch_row($result)){
    if($_GET["B"]==$row[7]){?>
    <? //echo "$_GET["B"]"; ?>
  <?php if(isset($_POST['update'])){
    $sql1 = "UPDATE route SET rname = '$_POST[rname]', rgrade = '$_POST[rgrade]', rtime = '$_POST[rtime]', rpeople = '$_POST[rpeople]', rsupervisor = '$_POST[rsupervisor]', rtool = '$_POST[rtool]', rvalue = '$_POST[rvalue]'
            WHERE rid = $row[7]";
    $result1 = mysql_query($sql1);
    echo '<meta http-equiv=REFRESH CONTENT=2;url=route.php>';

  }}}
?>
<?php if(isset($_POST['closebtn'])){
  echo '<meta http-equiv=REFRESH CONTENT=2;url=route.php>';
}?>
</form>
</div>

</body>
</html>

<?php }
else{
  echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
