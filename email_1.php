<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null){ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Email預約路線</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<script>
function checkName(control) {
	if (control.value == "") {
		validatePrompt(control, "請輸入大名！");
		return (false);
	}
	return (true);
}	

function checkTel(control) {
	if (control.value.length != 10) {
		validatePrompt(control, "請輸入長度為10的號碼！");
		return (false);
	}
	return (true);
}	
function validateForm(form) {
	if (!checkName(form.C_name)) return;
	if (!checkTel(form.C_tel)) return;
	if (!checkEmail(form.email.value)) return;
	alert ("全部資料通過驗證！\n表單即將送出！！！");
	form.submit();	// Submit form
}	
function validatePrompt(control, promptStr) {
	alert(promptStr);
	control.focus();
	return;
}	
function checkEmail(email){
	index = email.indexOf ('@', 0);		// 找出 @ 的位置
	if (email.length==0) {
		alert("請輸入電子郵件地址！");
		return (false);
	} else if (index==-1) {
		alert("錯誤：必須包含「@」。");
		return (false);
	} else if (index==0) {
		alert("錯誤：「@」之前不可為空字串。");
		return (false);
	} else if (index==email.length-1) {
		alert("錯誤：「@」之後不可為空字串。");
		return (false);
	} else
		return (true);
}		
</script>
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
      <h2>Email預約路線</h2>
    </div>
  </div>
<table width="500" border="0" align="center">
  <tbody>
    <tr>
      <td><form id="form" name="form" method="post" action="sendmail.php">
    <fieldset>
    
    <label>&nbsp;請選擇預約路線：</label>
    <select class="form-control" id="routeList" name="routeList">
    	<option></option>
    	</select>
    <br />
    <label>&nbsp;姓名：&nbsp;&nbsp;</label>
    <input class="form-control" id="C_name" name="C_name" type="text" />
    <br />
	<label>&nbsp;電話：&nbsp;&nbsp;</label>
    <input class="form-control" id="C_tel" name="C_tel" type="text" />
    <br />
    <label>&nbsp;Email：</label>
    <input class="form-control" id="email" name="email" type="text" />
    <br />
    <input class="btn btn-danger" id="button" name="button" type="button" onClick="validateForm(this.form)" value="寄送"  />
    </fieldset>
    </form></td>
    </tr>
  </tbody>
</table>
     
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
<?php
error_reporting(0);
$mysqlhost="localhost";
$mysqluser="bernie";
$mysqlpasswd="1111";
// 建立資料庫連線
$link =
	@mysql_connect($mysqlhost, $mysqluser, $mysqlpasswd);
if ($link == FALSE) {
	echo "現在無法連上資料庫。請查詢資料庫連結是否有誤。\n".mysql_error();
	exit();
}
mysql_query("set names utf8");
$mysqldbname="db";
mysql_select_db($mysqldbname);

$routes = mysql_query("select * from route;");
if(!$routes){
   	echo "Execute SQL failed : ". mysql_error();
	exit;
}
$routeCodeArr=array();     //用來存哪些選項的陣列
$routeCount=0;
while($rows=mysql_fetch_array($routes))
{
	$routeCodeArr[$routeCount]=$rows[rname];
	$routeCount++;
}
for($i=0;$i<count($routeCodeArr);$i++)
{
	echo "<script type=\"text/javascript\">";
	echo "document.getElementById(\"routeList\").options[$i]=new Option(\"$routeCodeArr[$i]\",\"$routeCodeArr[$i]\");";
	echo "</script>";
}
?>
</html>
<?php }
      else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=logon.php>';
      }
?>
