<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Quản lý bán hàng ::</title>
    <script language=JavaScript>
        function checkInput() {
            if (document.frmPHP.txtid_sp.value=="") {
                alert("Invalid ID, Please enter ID");
                document.frmPHP.txtid_sp.focus();
                return false;
            }
            if (document.frmPHP.txttensanpham.value=="") {
                alert("Please enter Name");
                document.frmPHP.txttensanpham.focus();
                return false;
            }
            if (document.frmPHP.txtdongia.value=="") {
                alert("Please enter Name");
                document.frmPHP.txtdongia.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<h1>Phạm Duy Anh - 20155076</h1>

    <table>
        <form name="frmPHP" method="post" action="bai4.php" onsubmit="return checkInput();">
        <tr>
            <td align="left" class="content-sm"><b>
                Hãy nhập mã sản phẩm muốn xóa</b>
            </td>
        </tr>
        <tr>
            <td align="left" >Mã sản phẩm:</td>
        </tr>
        <tr>
            <td align="left">
                <input type="text" name="txtid_sp" size="25" maxlength="6" class="textbox">
            </td>
        </tr>

        <tr>
            <td align="left" valign="top"> <br>
                <input type="submit" value="Delete" class="button" name="submit">
            </td>
        </tr>
        </form>
    </table>
    <?php 
        if(isset($_POST['submit'])) {
            $id = $_POST['txtid_sp'];
            $sql = "DELETE FROM sanpham WHERE id_sp='$id'";
            $link = mysqli_connect ("localhost", "root", "", "qlbanhang") or die("Không thể kết nối được MySQL Database");
            mysqli_set_charset($link, "utf8");
            if(mysqli_query($link, $sql)) {
                echo "Deleted successfully.";
            } else {
                echo "Delete error: " . mysqli_error($link);
            }
        }
    ?>
</body>
</html>