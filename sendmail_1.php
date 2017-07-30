<?php session_start(); ?>
<?php error_reporting(0);
      if($_SESSION['username'] != null){ ?>
<?php
header("charset=utf-8");
error_reporting(0);
require 'PHPMailerAutoload.php';

$C_name=$_POST['C_name'];
$C_email=$_POST['email'];
$C_tel=$_POST['C_tel'];
$C_message=$_POST['routeList'];
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'punglongmen@gmail.com';                 // SMTP username
$mail->Password = '2017longmen';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
$mail->setFrom('punglongmen@gmail.com', 'Route');
$mail->addAddress('punglongmen@gmail.com', '');     // Add a recipient
$sSubject = iconv('big5', $sCharset, $sSubject);
$sSubject = "預約路線";
$mail->Body    = '預約路線:'.$C_message.'%0d%0a姓名:'.$C_name.'<br/>電話:'.$C_tel.'<br/>信箱:'.$C_email;
if(!$mail->send()) {
    echo '郵件未被寄出!';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '已成功寄出預約路線郵件!';
	$url = "http://localhost/database_1/route.php";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
?>
<?php }
      else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=logon.php>';
      }
?>