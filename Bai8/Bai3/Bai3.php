<?php ob_start(); session_start(); ?>
<!DOCTYPE >
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        div{font-size:18px; color:#FF0000}
    </style>
</head>
<body>
<h1>Phạm Duy Anh - 20155076</h1>
<form name="form1" method="POST" action="Bai3.php">
  <table width="800" border="1" align="center">
    <tr>
      <td colspan="2"><div align="center">ĐĂNG NHẬP</div></td>
    </tr>
    <tr>
      <td width="394"><div align="right">Tên đăng nhập:</div></td>
      <td width="390"><input type="text" name="username"></td>
    </tr>
	<tr>
      <td width="394"><div align="right">Mật khẩu:</div></td>
      <td width="390"><input type="password" name="password"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="Submit" value="Đăng nhập">
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center" id="tbao">
	  </div></td>
    </tr>
  </table>
</form>
<hr  size="2" align="center" color="#000066" width="600">
    	<?php
	if(isset($_POST['Submit']))
	{	
		$username = $_POST["username"];	
		//Ket noi den MySQL
        $con = mysqli_connect("localhost","root","", "qlsinhvien") or die("Không thể kết nối đến Server");
        mysqli_set_charset($con, "utf8");
        //Thuc hien cau truy van
        $query="SELECT * from sinhvien where username='{$_POST["username"]}' AND password='{$_POST["password"]}'";
		    $result=mysqli_query($con, $query);
	
		if(mysqli_num_rows($result) > 0)
		{
			//Dang nhap thanh cong luu ten sinh vien vao session
			$row = mysqli_fetch_array($result); 
      $_SESSION["row"] = $row;
			header("Location:Bai3_1.php");
		}
		else
		{
		echo "<div align=center >Đăng nhập không thành công!<div>";
		}
		mysqli_close($con);
	}
?>
</body>
</html>
<?php ob_flush(); ?>
