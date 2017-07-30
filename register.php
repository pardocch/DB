
<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<form method="post" action=""><br><br>
姓：<input type="text" name="lastname" ></input><br><br>
名：<input type="text" name="firstname" ></input><br><br>
帳號：<input type="text" name="account" ></input><br><br>
密碼：<input type="password" name="password" ></input><br><br>
再一次輸入密碼：<input type="password" name="password2" ></input><br><br>
電話：<input type="text" name="telephone" ></input><br><br>
地址：<input type="text" name="address" ></input><br><br>
<input button class="btn btn-default" type="submit" name="submit" value="確定"></input>
<?php
include("mysql_connect.inc.php");
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if(isset($_POST['submit'])){
if($_POST['account'] != null && $_POST['password'] != null && $_POST['password2'] != null && $_POST['password'] == $_POST['password2'])
{
        //新增資料進資料庫語法
        $sql = "INSERT INTO `login` (account, password, lastname, firstname, phone, address)
                VALUES ('$_POST[account]', '$_POST[password]', '$_POST[lastname]', '$_POST[firstname]', '$_POST[telephone]', '$_POST[address]')";

        if((mysql_query($sql)))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=logon.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=logon.php>';
        }
}}
?>

</form>
</html>
