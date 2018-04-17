<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>Chỉnh sửa cho bảng hóa đơn</title>
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
	<a href="Bai5.php" title=""><input type="submit" name="" value="Return Bai5.php"></a>
	<?php
$host     = "localhost";
$username = "root";
$pass     = "";
$dbname   = "qlbanhang";
$chucnang = $_SESSION['chucnang'];
echo "
	<h3 class='title'>Bạn đã chọn bảng: hoadon, chức năng: $chucnang</h3>
    ";
// Tạo kết nối đến MySQL cần cung cấp 3 thông tin
$conn = mysqli_connect($host, $username, $pass, $dbname) or die(mysqli_error());
mysqli_set_charset($conn, "utf8");
if ($chucnang == 'SELECT') {
    $sql    = "SELECT * FROM hoadon";
    $result = mysqli_query($conn, $sql) or die(mysqli_error());
    echo "<table border='1'>
					<tr>
						<th>id_hd</th>
						<th>ngaylaphd</th>
						<th>id_kh</th>
                        <th>id_nv</th>
                        <th>ngaygiaohang</th>
                        <th>tongtien</th>
					</tr>
				";
    while ($row = mysqli_fetch_array($result)) {
        echo "
			<tr>
				<td>{$row['id_hd']}</td>
				<td>{$row['ngaylaphd']}</td>
				<td>{$row['id_kh']}</td>
                <td>{$row['id_nv']}</td>
                <td>{$row['ngaygiaohang']}</td>
                <td>{$row['tongtien']}</td>
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
				MaHD (*): <input type=\"text\" name=\"txtID\"><br><br>
				<input style=\"margin-left: 30px\" type=\"submit\" name=\"submit\" value=\"Submit\">
				<input style=\"margin-left: 30px\" type=\"submit\" value=\"Reset\">
			</form><br><br>
			-------------------------------------------------------------------------
			<br><br><h3>Result:</h3>
			";
	}  else {
                 echo "
                    <form method=\"post\" accept-charset=\"utf-8\">
                    MaHD (*):
                            <select name = 'txtID' size='1'>
                    ";
                    for($k = 1; $k < 1001; $k++) {
                        $id = convert($k);
                        echo "
                            <option value='HD$id'>HD$id</option>
                        ";
                    }
                echo "         
                    </select></br>
                    Ngày lập hóa đơn: (*):<br>
                    ";
                echo "Ngày: <select name='ngaylaphd' style='margin-left: 10px; margin-right: 50px;'>";
                for($i = 1; $i < 32; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>";
                echo "Tháng: <select name='thanglaphd' style='margin-left: 10px; margin-right: 50px;'>";
                for($i = 1; $i < 13; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>";
                echo "Năm: <select name='namlaphd' style='margin-left: 10px; margin-right: 50px;'>";
                for($i = 1960; $i < 2101; $i++) {
                    if($i == 2018)
                        echo "<option value='$i' selected='true'>$i</option>";
                    else echo "<option value='$i'>$i</option>";
                }
                echo "</select></br>";
                echo "
                MaKH (*):
                <select name = 'makh' size='1'>
                ";
                for($k = 1; $k < 1001; $k++) {
                    $id = convert($k);
                    echo "
                        <option value='KH$id'>KH$id</option>
                    ";
                }
                echo "         
                    </select></br>
                    MaNV (*):
                    <select name = 'manv' size='1'>
                ";
                for($k = 1; $k < 50; $k++) {
                    $id = convert($k);
                    echo "
                        <option value='NV$id'>NV$id</option>
                    ";
                }
                echo "         
                    </select></br>
                    Ngày giao hàng: (*):<br>
                    ";
                echo "Ngày: <select name='ngaygiaohang' style='margin-left: 10px; margin-right: 50px;'>";
                    for($i = 1; $i < 32; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                echo "</select>";
                echo "Tháng: <select name='thanggiaohang' style='margin-left: 10px; margin-right: 50px;'>";
                    for($i = 1; $i < 13; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                echo "</select>";
                echo "Năm: <select name='namgiaohang' style='margin-left: 10px; margin-right: 50px;'>";
                    for($i = 1960; $i < 2101; $i++) {
                        if($i == 2018)
                            echo "<option value='$i' selected='true'>$i</option>";
                        else echo "<option value='$i'>$i</option>";
                    }
                echo "</select></br>";
                echo "
                    Tổng tiền (*):<br> <input type='text' name='tongtien'><br>
					<input style=\"margin-left: 30px\" type=\"submit\" name=\"submit\" value=\"Submit\">
					<input style=\"margin-left: 30px\" type=\"submit\" value=\"Reset\">
				</form><br><br>
				-------------------------------------------------------------------------
				<br><br><h3>Result:</h3>
                ";
            }
	if(isset($_POST['submit'])) {
        if(isset($_POST['tongtien']))
            $tongtien = doubleval($_POST['tongtien']);
		switch ($chucnang) {
            case 'INSERT': {
				$sql = "INSERT INTO hoadon (id_hd, ngaylaphd, id_kh, id_nv, ngaygiaohang, tongtien  ) 
				VALUES ('{$_POST['txtID']}', '{$_POST['namlaphd']}-{$_POST['thanglaphd']}-{$_POST['ngaylaphd']}',
                 '{$_POST['makh']}', '{$_POST['manv']}', 
                 '{$_POST['namgiaohang']}-{$_POST['thanggiaohang']}-{$_POST['ngaygiaohang']}',
                 '$tongtien')
				";
				if(mysqli_query($conn, $sql)) {
					echo "INSERT thành công.";
				} else 
					echo "Error: " . mysqli_error($conn);
                break;
            }
			case 'UPDATE': {
				$sql = "UPDATE hoadon 
				SET ngaylaphd='{$_POST['namlaphd']}-{$_POST['thanglaphd']}-{$_POST['ngaylaphd']}',
                    id_kh='{$_POST['makh']}', id_nv='{$_POST['id_nv']}',
                    ngaygiaohang='{$_POST['namgiaohang']}-{$_POST['thanggiaohang']}-{$_POST['ngaygiaohang']}'
                    tongtien='$tongtien'
				WHERE id_hd = '{$_POST['txtID']}'
				";
				if(mysqli_query($conn, $sql)) {
					echo "UPDATE thành công.";
				} else 
					echo "Error: " . mysqli_error($conn);
                break;
            }
			case 'DELETE':{
				
					$sql = "
						DELETE FROM hoadon
						WHERE id_hd = '{$_POST['txtID']}'
					";
				if(mysqli_query($conn, $sql)) {
					echo "DELETE thành công.";
				} else 
					echo "Error: " . mysqli_error($conn);
                break;
            }
			default:
				echo "Nothing to display.";
				break;
		}
	}
}
?>
</body>
</html>