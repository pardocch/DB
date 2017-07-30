<?php
//$sCharset = 'utf-8';
header("charset=utf-8");
error_reporting(0);
require 'PHPMailerAutoload.php';

$C_name=$_POST['C_name'];
$C_email=$_POST['email'];
$C_tel=$_POST['C_tel'];
$C_message=$_POST['routeList'];
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'punglongmen@gmail.com';                 // SMTP username
$mail->Password = '2017longmen';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('punglongmen@gmail.com', 'Route');
$mail->addAddress('punglongmen@gmail.com', '');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
//$C_name = iconv('big5',$sCharset, $C_name);
$sSubject = iconv('big5', $sCharset, $sSubject);
$sSubject = "預約路線";
$mail->Body    = "預約路線:".$C_message."<br/>姓名:".$C_name."<br />電話:".$C_tel."<br />信箱:".$C_email;
                  
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

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