<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Xây dựng trang tổng hợp</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Phạm Duy Anh - 20155076</h1>
	<form method="post" accept-charset="utf-8">
		Chọn bảng:
		<select name="table">
			<option value="khachhang">Bảng khách hàng</option>
			<option value="nhanvien">Bảng nhân viên</option>
			<option value="hoadon">Bảng hóa đơn</option>
		</select>
		<br><br>
		Chọn chức năng: 
		<select name="chucnang">
			<option value="INSERT">Insert</option>
			<option value="SELECT">Select</option>
			<option value="UPDATE">Update</option>
			<option value="DELETE">Delete</option>
		</select>
		<br><br>
		<input type="submit" name="submit1" value="Submit">
	</form>
<?php 

if(isset($_POST['submit1'])) {
	$table = $_POST['table'];
	$chucnang = $_POST['chucnang'];
	$_SESSION['table'] = $table;
	$_SESSION['chucnang'] = $chucnang;

	switch ($table) {
		case 'khachhang':
			header('Location: khachhang.php');
			break;
		case 'nhanvien':
			header('Location: nhanvien.php');
			break;
		case 'hoadon':
			header('Location: hoadon.php');
			break;
		default:
			echo "Nothing being selected.";
			break;
	}
}
 ?>
</body>
</html>
