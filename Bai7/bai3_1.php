<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Quản lý bán hàng::</title>
</head>
<body>
    <h3>Thêm mẩu tin</h3>
    <?php
        $txtid_sp = $_POST['txtid_sp'];
        $txttensanpham = $_POST['txttensanpham'];
        $txtdongia=$_POST['txtdongia'];
        $affectrow=0;
        $link = mysqli_connect ("localhost", "root", "", "qlbanhang") or die("Không thể kết nối được MySQL Database");
        mysqli_set_charset($link, "utf8");
        $sql="UPDATE sanpham SET tensanpham='$txttensanpham', dongia='$txtdongia' WHERE id_sp='$txtid_sp'";
        $result = mysqli_query($link,$sql);
        if($result)
        $affectrow = mysqli_affected_rows($link);
        mysqli_close($link);
    ?>
    Số mẩu tin thêm vào: <?= $affectrow?>

</body>
</html>