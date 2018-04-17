<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa cho bảng khách hàng</title>
	<meta charset="utf-8">
	<style type="text/css" media="screen">
		input, select{
			margin: 2px 0px 2px 100px;
			padding:3px;

		}
        table {
            margin-left: 100px;
        }
        table, th, tr, td {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 5px;
        }
		a {
			text-decoration: none;
		}
		h1 {
			text-align: center;
		}
		form, .title, .enter-properties{
			margin-left: 10%;
		}
		body {
			margin-left: 20%;
			margin-right: 20%;
			border: 1px solid black;
			width: 60%;
		}
		form {
			border: 1px solid black;
			padding: 50px;
			width: 60%;
		}
	</style>
</head>
<?php 
    function convert($i) {
        if($i < 10)
            return "000$i";
        if($i < 100) 
            return "00$i";
        if($i < 1000) 
            return "0$i";
        return "$i";
    }
?>
<body>
	<h1>Phạm Duy Anh - 20155076</h1>
	<a href="Ex5.php" title=""><input type="submit" name="" value="Return Ex5.php"></a>
	<?php
$host     = "localhost";
$username = "root";
$pass     = "";
$dbname   = "qlbanhang";
$chucnang = $_SESSION['chucnang'];
echo "
	<h3 class='title'>Bạn đã chọn bảng: khachhang, chức năng: $chucnang</h3>
    ";
// Tạo kết nối đến MySQL cần cung cấp 3 thông tin
$conn = mysqli_connect($host, $username, $pass, $dbname) or die(mysqli_error());
mysqli_set_charset($conn, "utf8");
if ($chucnang == 'SELECT') {
    $sql    = "SELECT * FROM khachhang";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    echo "<table border='1'>
					<tr>
						<th>id_kh</th>
						<th>tenkh</th>
						<th>dienthoai</th>
						<th>diachi</th>
					</tr>
				";
    while ($row = mysqli_fetch_array($result)) {
        echo "
			<tr>
				<td>{$row['id_kh']}</td>
				<td>{$row['tenkh']}</td>
				<td>{$row['dienthoai']}</td>
				<td>{$row['diachi']}</td>
			</tr>
        ";
    }
    echo "</table>";
}
else {
	echo "<p class='enter-properties'>";
	switch ($chucnang) {
		case 'INSERT':
			echo "Please enter properties to insert.</p>";
			break;
		case 'UPDATE':
			echo "Please enter properties to update.</p>";
			break;
			case 'DELETE':
				echo "Please enter ID wanting to delete.</p>";
				break;
		default:
			echo "Nothing was selected.</p>";
			break;
	}
	if($chucnang == 'DELETE') {
		echo "
			<form method=\"post\" accept-charset=\"utf-8\">
				MaKH (*): <input type=\"text\" name=\"txtID\"><br><br>
				<input style=\"margin-left: 30px\" type=\"submit\" name=\"submit\" value=\"Submit\">
				<input style=\"margin-left: 30px\" type=\"submit\" value=\"Reset\">
			</form><br><br>
			-------------------------------------------------------------------------
			<br><br><h3>Result:</h3>
			";
	}  else
                 echo "
                    <form method=\"post\" accept-charset=\"utf-8\">
                        MaKH (*):
                            <select name = 'txtID' size='1'>
                    ";
                    for($k = 1; $k < 1001; $k++) {
                        $id = convert($k);
                        echo "
                            <option value='SP$id'>SP$id</option>
                        ";
                    }
                echo "         
                    </select></br>
					TenKH (*):<br><input type=\"text\" name='username'><br>
					DiaChi (*):<br> <input type='text' name='diachi'><br>
					SoDienThoai (*):<br> <input type='text' name='sodienthoai' maxlength='12'><br>
					<input style=\"margin-left: 30px\" type=\"submit\" name=\"submit\" value=\"Submit\">
					<input style=\"margin-left: 30px\" type=\"submit\" value=\"Reset\">
				</form><br><br>
				-------------------------------------------------------------------------
				<br><br><h3>Result:</h3>
				";

	if(isset($_POST['submit'])) {
		switch ($chucnang) {
			case 'INSERT':
				$sql = "INSERT INTO khachhang (id_kh, tenkh, dienthoai, diachi) 
				VALUES ('{$_POST['txtID']}', '{$_POST['username']}', '{$_POST['sodienthoai']}', '{$_POST['diachi']}')
				";
				if(mysqli_query($conn, $sql)) {
					echo "INSERT thành công.";
				} else 
					echo "Error: " . mysqli_error($conn);
				break;
			case 'UPDATE':
				$sql = "UPDATE khachhang 
				SET tenkh = '{$_POST['username']}', dienthoai = '{$_POST['sodienthoai']}', diachi = '{$_POST['diachi']}'
				 	WHERE id_kh = '{$_POST['txtID']}'
				";
				if(mysqli_query($conn, $sql)) {
					echo "UPDATE thành công.";
				} else 
					echo "Error: " . mysqli_error($conn);
				break;
			case 'DELETE':
				
					$sql = "
						DELETE FROM khachhang
						WHERE id_kh = '{$_POST['txtID']}'
					";
				if(mysqli_query($conn, $sql)) {
					echo "DELETE thành công.";
				} else 
					echo "Error: " . mysqli_error($conn);
				break;
			default:
				echo "Nothing to display.";
				break;
		}
	}
}
?>
</body>
</html>