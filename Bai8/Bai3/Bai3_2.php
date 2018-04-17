<?php 
    ob_start();
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
        if(isset($_SESSION["row"]))
            $row = $_SESSION["row"];
    ?>
    <table border="1">
    <form method='post'>
        <TR>
            <th>MSSV</th>
            <th>HỌ TÊN</th>
            <TH>NGÀY SINH</TH>
            <TH>ĐỊA CHỈ</TH>
            <TH>SĐT</TH>
            <TH>MÃ KHOA</TH>
        </TR>
        <tr>
        
            <?php 
                $hoten = $row['hosv']." ".$row['tensv'];
                echo "
                    
                    <td>{$row['masv']}</td>
                    <td><input type='text' name='hoten' value='{$hoten}'></td>
                    <td><input type='text' name='ngaysinh' value='{$row["ngaysinh"]}'></td>
                    <td><input type='text' name='diachi' value='{$row["diachi"]}'></td>
                    <td>01238100497</td>
                    <td><input type='text' name='makh' value='{$row["makh"]}'></td>
                ";

            ?>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Cập nhật" name="submit">
            </td>
            <td>
            <input type="button" name="Button" value="Đăng xuất" onClick="javascript:window.open('Bai3_3.php','_self')">
            </td>
        </tr>
        </form>
    </table>
    <?php 
    
        if(isset($_POST['submit'])) {
            $hoten = $_POST['hoten'];
            $tach = explode(" ", $hoten);
            $len = count($tach);
            $ten = $tach[$len - 1];
            $ho = "";
            for($i = 0; $i <  $len - 1; $i++) {
                $ho .= $tach[$i] . " ";
            }
            $conn = mysqli_connect("localhost", "root", "", "qlsinhvien") or die("Không thể kết nối đến SERVER");
            mysqli_set_charset($conn, "utf8");
            $sql = "
                UPDATE sinhvien
                SET hosv='$ho', tensv='$ten', ngaysinh='{$_POST['ngaysinh']}', diachi='{$_POST['diachi']}', makh='{$_POST['makh']}'
                WHERE masv='{$row['masv']}'
            ";
            mysqli_query($conn, $sql) or die ("Error: " . mysqli_error($conn));
        }
    ?> 
</body>
</html>