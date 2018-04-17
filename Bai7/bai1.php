<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Phạm Duy Anh - 20155076</h1>

    <?php 
        $host = "localhost";
        $username = "root";
        $pass = "";
        $db = "qlbanhang";
        $link = mysqli_connect($host, $username, $pass, $db);
        mysqli_set_charset($link, "utf8");
        $totalRows = 0;
        $stSQL ="SELECT * FROM sanpham";
        // Thực thi truy vấn dữ liệu từ bảng tblShips, 
        // kết quả truy vấn được lưu vào mảng
        $result = mysqli_query($link, $stSQL);
        $totalRows = mysqli_num_rows($result);
    ?>
    <h3>Tổng số mẫu tin tìm thấy: <?=$totalRows?></h3>
        <table>
            <tr>
                <th><b>Mã sản phẩm</b></th>
                <th><b>Tên sản phẩm</b></th>
                <th><b>Đơn giá</b></th>

            </tr>
        <?php
            if($totalRows>0){
                $i=0;
                    // Sử dụng vòng lặp để duyệt kết quả truy vấn
                while ($row = mysqli_fetch_array($result))
                {
                    $i+=1;
            ?>
            <tr valign="top">
            <td><?=$row["id_sp"]?> </td>
            <td ><?=$row["tensanpham"]?></td>
            <td ><?=$row["dongia"]?></td>

            </tr>
            <?php
            }
            }else{
        ?>
        <tr valign="top">
        <td >&nbsp;</td>
        <td > <b><font face="Arial" color="#FF0000">
        Không tìm thấy sản phẩm!</font></b></td>
        </tr>
        <?php
            }
        ?>
        </table>
</body>
</html>