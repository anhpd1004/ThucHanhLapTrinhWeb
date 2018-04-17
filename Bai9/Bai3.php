<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 align="center">CẬP NHẬT THÔNG TIN SINH VIÊN</h1>
    <?php 
        $row = null;
        if(isset($_SESSION["row"]))
            $row = $_SESSION["row"];
        else {
            $row["id_nv"] = "";
            $row["tennv"] = "";
            $row["dienthoai"] = "";
            $row["diachi"] = "";
        }
    ?>
    <?php 
    
    if(isset($_POST['submit'])) {
        $hoten = $_POST['hoten'];
        $conn = mysqli_connect("localhost", "root", "", "qlbanhang") or die("Không thể kết nối đến SERVER");
        mysqli_set_charset($conn, "utf8");
        $sql = "
            UPDATE nhanvien
            SET tennv='{$_POST['hoten']}', dienthoai='{$_POST['dienthoai']}', diachi='{$_POST['diachi']}'
            WHERE id_nv='{$row['id_nv']}'
        ";
        mysqli_query($conn, $sql) or die ("Error: " . mysqli_error($conn));
        $row['tennv'] = $hoten;
        $row['dienthoai'] = $_POST['dienthoai'];
        $row['diachi'] = $_POST['diachi'];
    }
?> 
    <table border="1">
    <form method='post'>
        <TR>
            <th>IDNV</th>
            <th>HỌ TÊN</th>
            <th>Điện thoại</th>
            <TH>ĐỊA CHỈ</TH>
        </TR>
        <tr>
        
            <?php 
                echo "
                    <td>{$row['id_nv']}</td>
                    <td><input type='text' name='hoten' value='{$row["tennv"]}'></td>
                    <td><input type='text' name='ngaysinh' value='{$row["ngaysinh"]}'></td>
                    <td><input type='text' name='diachi' value='{$row["diachi"]}'></td>
                ";

            ?>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Cập nhật" name="submit">
            </td>
            <td>
            <input type="button" name="Button" value="Đăng xuất" onClick="javascript:window.open('Bai4.php','_self')">
            </td>
        </tr>
        </form>
    </table>
    
</body>
</html>