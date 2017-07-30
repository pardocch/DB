<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
        $sql = "SELECT * FROM news";
        $result = mysql_query($sql);
        while($row = mysql_fetch_row($result))
        {

                     echo"<tr><td> 發佈日期 </td>";
                     echo"<td> 文章標題 </td>";
                     echo"<td> 文章內容 </td>";
                     echo"<td> 文章分類 <br></td></tr>";
		               echo"<tr><td> $row[0] </td>";
		               echo"<td> $row[1] </td>";
		               echo"<td> $row[2] </td>";
		               echo"<td> $row[3] <br></td></tr>";
	      }


?>
