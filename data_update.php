<?php session_start(); ?>
<?php error_reporting(0);?>
<?php if(($_SESSION['username'] != null)&&$_SESSION['au'] != 0){ ?>
  <!DOCTYPE html>
<html lang="en">
<script>
  $counting = false;
function goBack()
{
  if($counting == true){
    window.history.go(-1);
  }
  else $counting = false;
}
function cleanbox(){
  document.getElementaryById("newstitle").value=""
  document.getElementaryById("newsvalues").value=""
  document.getElementaryById("newsclass").value=""
}
</script>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>消息更新</title>

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
      <!--<th>
        <h4 class="text-center" >
          <?php echo"發佈日期";?>
        </h4>
      </th>-->
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
      <!--<th>
        <center><input type="text" name="newstime" id="newstime"></center>-->
        <!--<input type="date" id="bookdate" value="<?php //echo date('Y-m-d'); ?>" min="<?php //echo date('Y-m-d'); ?>" max="2017-05-31">-->
      <!--</th>-->

        <?php include("mysql_connect.inc.php");?>
        <?php $sql = "SELECT * FROM news";?>
        <?php $result = mysql_query($sql);?>
        <?php while($row = mysql_fetch_row($result)){
          if($_GET["B"]==$row[0]){
            $rtitle = $row[2];
            $rvalues = $row[3];
            $rclass = $row[4];
          }continue;}?>
      <th>
        <center><input type="text" name="newstitle" id="newstitle" value="<?php echo $rtitle;?>"></center>
      </th>
      <th>
        <center><textarea cols="50" rows="10" name="newsvalues" id="newsvalues" ><?php echo $rvalues;?></textarea></center>
      </th>
      <th>
        <center><input type="text" name="newsclass" id="newsclass" value="<?php echo $rclass;?>"></center>
      </th>
    </tr>
    <!--<input type="submit" name="button" id="button" value="新增" onclick="window.close()">-->
  </tbody>
</table>
<td colspan="1">
<div class="row col-md-10" align="right">
<table width="90%" border="0">
<tr>
<input button type="submit" class="btn btn-default" name="update" id="update" value="　　　修　　改　　　"onclick=""></input>
&nbsp;&nbsp;&nbsp;

<input button type="submit" class="btn btn-default" name="closebtn" id="closebtn" value="　　回　首　頁　　" onclick=""></input>
</tr>
</table>
</div>
</td>
<?php
//取得當下時間並寫入資料庫(只是為了排序用)
 date("Y-m-d H:i");  //日期格式化
 date_default_timezone_set('Asia/Taipei');
 $tt = date('Y-m-d');
/*$newstime = $_POST['newstime'];
$newstitle = $_POST['newstitle'];
$newsvalues = $_POST['newsvalues'];
$newsclass = $_POST['newsclass'];*/
  if(isset($_POST['closebtn'])){
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
  }
  include("mysql_connect.inc.php");?>
  <?php $sql = "SELECT * FROM news";?>
  <?php $result = mysql_query($sql);?>
  <?php while($row = mysql_fetch_row($result)){
    if($_GET["B"]==$row[0]){?>
    <? //echo "$_GET["B"]"; ?>
  <?php if(isset($_POST['update'])){
    $sql1 = "UPDATE news SET dbnewstitle = '$_POST[newstitle]', dbnewsvalues = '$_POST[newsvalues]', dbnewsclass = '$_POST[newsclass]'
            WHERE dbnewsid = $row[0]";
    $result1 = mysql_query($sql1);
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
  }}}
?>
</form>
</div>


<?php// $link = include("mysql_connect.inc.php");?>
<?php// if (!@mysql_select_db(";news")) die("資料庫選擇失敗！");?>
<?php// $sql = "INSERT INTO news(dbnewsid,dbnewstime,dbnewstitle,dbnewsvalues,dbnewsclass) VALUES (NULL, '$_POST[newstime]','$_POST[newstitle]','$_POST[newsvalues]','$_POST[newsclass]')";?>
<?php// mysqli_query($link,$sql) or die("無法新增".mysql_error());
     // mysqli_close($link)?>

  <!--   <tr>
           <td colspan="2" align="center">
           <input name="action" type="hidden" value="add">
           <input type="submit" name="button" id="button" value="新增資料">
           <input type="reset" name="button2" id="button2" value="重新填寫">
           </td>
         </tr>-->
</body>
</html>
>
<?php }else{
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
      }?>
