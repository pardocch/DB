<?php session_start(); ?>
<?php error_reporting(0);?>
<?php if(($_SESSION['username'] != null)&&$_SESSION['au'] != 0){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="row"; width= "90%">
  <form action="" method="post">
  <table class="table table-striped table-hover">
    <thread>
    <tr class="success">
          <?php //echo"發佈日期";?>
      <th>
        <h4 class="text-center">
          <?php echo"文章標題";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"文章內容";?>
        </h4>
      </th>
      <th>
        <h4 class="text-center">
          <?php echo"文章分類";?>
        </h4>
      </th>
    </tr>
  </thread>
  <tbody>
    <tr class="info">
      <th>
        <center><input type="text" name="newstitle" id="newstitle" ></center>
      </th>
      <th>
        <center><textarea cols="50" rows="10" name="newsvalues" id="newsvalues" ></textarea></center>
      </th>
      <th>
        <center><input type="text" name="newsclass" id="newsclass" ></center>
      </th>
    </tr>
  </tbody>
</table>
<td colspan="1">
<div class="row col-md-10" align="right">
<table width="90%" border="0">
<tr>
<input button type="submit" class="btn btn-default" name="submit" id="submit" value="　　　新　　增　　　"></input>
&nbsp;&nbsp;&nbsp;
<input button type="submit" class="btn btn-default" name="closebtn" id="closebtn" value="　　　關　　閉　　　" onclick="window.close();"></input>
</tr>
</table>
</div>
</td>
<?php
//取得當下時間並寫入資料庫(只是為了排序用)
 date("Y-m-d H:i");  //日期格式化
 date_default_timezone_set('Asia/Taipei');
 $tt = date('Y-m-d');
  include("mysql_connect.inc.php");
  if(isset($_POST['submit'])){
    $sql1 = "INSERT INTO `news` (dbnewsid,dbnewstime,dbnewstitle,dbnewsvalues,dbnewsclass)
             VALUES (NULL,'$tt','$_POST[newstitle]','$_POST[newsvalues]','$_POST[newsclass]')";//'$_POST[newstime]'
    $result = mysql_query($sql1);

  }
?>
</form>
</div>
</body>
</html>
<?php }else{
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
      }?>
