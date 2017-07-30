<?php session_start(); ?>
<?php error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

		<title>登入介面</title>
		<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/tablehref.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="./index.php">龍門國小遊學特色網</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<!--<ul class="nav navbar-nav navbar-right">
								<li>
										<a href="./culture.html">文化遺產</a>
								</li>
								<li>
										<a href="./community.html">社區資源</a>
								</li>
								<li>
										<a href="./route.html">路線</a>
								</li>
								<li>
										<a href="./media.html">數位串流</a>
								</li>
								<li>
										<a href="./download.html">下載區</a>
								</li>
						</ul>-->
				</div>
				<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
</nav><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<form action="logon.php" method="post" name="myFrom" >
		<table align="center">
			<tr>
				<td>帳號： </td>
				<td><input type="text" name="account" size = "15"></td>
			</tr>
			<tr>
				<td>密碼： </td>
				<td><input type="password" name="password" size = "15"></td>
			</tr>
			<tr>
				<td align="center" colspan ="2" ><br>
					<input type="submit" class="btn btn-default" name="submit" value="登入">
					<input type="submit" class="btn btn-primary" name="register" value = "註冊">
				</td>
			</tr>
		</table>
		<?php
include("mysql_connect.inc.php");
		$sql  = "SELECT *
		FROM login";

		if (isset($_POST["submit"])) {
			$result = mysql_query($sql);
			$temp = false;
			while($row = mysql_fetch_row($result)){
				if($_POST['account'] == $row[0] && $_POST['password'] == $row[1]){
					$_SESSION['username'] = $_POST['account'];
          $_SESSION['au'] = $row[6];
					echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
					$temp = true;
				}
			}
			if($temp == true){
				$temp = false;
			}else{
				echo ("帳號或密碼不符合");
			}

		}
		if (isset($_POST["register"])){
			echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';
			//header();
		}
		?>
	</form>
</body>
</html>
