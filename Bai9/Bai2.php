<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 2</title>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="800" height="37"  align="center" valign="middle" bgcolor="#FFFFCC" style="font-size:18px; color:#FF0000 ">
	
	<?php
	if(isset($_SESSION["row"]))
			{
				echo "Xin chào: ".$_SESSION["row"]["tennv"];
				echo "<br>";
				echo "<a href='Bai4.php'>Đăng xuất</a>";
			}	
	else	{
				echo "Bạn đã đăng xuất";
				echo "<br>";
				echo "<a href='Bai1.php'>Đăng nhập</a>";
			}
	?>
	</td>
  </tr>
  <tr>
    <td height="49" valign="top"><form name="form1" method="post" action="">
	<a href="#"><div id="ht" name="b"></div></a>	
      <div align="center">
        <input type="button" name="Button" value="Xem thông tin cá nhân" onClick="javascript:window.open('Bai3.php','_self')">
        <input type="button" name="Button" value="Đăng xuất" onClick="javascript:window.open('Bai4.php','_self')">
      </div>
    </form></td>
  </tr>
  <tr>
    <td height="346">&nbsp;</td>
  </tr>
</table>
</body>
</html>
