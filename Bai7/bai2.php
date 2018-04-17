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
        <form name="frmPHP" method="post" action="bai2_1.php" onsubmit="return checkInput();">
        <tr>
            <td align="left" class="content-sm"><b>
                Hãy thêm mã sản phẩm, tên sản phẩm, đơn giá</b>
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
            <td align="left" >Tên sản phẩm:</td>
        </tr>
        <tr>
            <td align="left" >
                <input type="text" name="txttensanpham" size="50" maxlength="50" class="textbox">
            </td>
        </tr>
        <tr>
            <td align="left" >Đơn giá:</td>
        </tr>
        <tr>
            <td align="left" >
                <input type="text" name="txtdongia" size="12" maxlength="8" class="textbox">
            </td>
        </tr>

        <tr>
            <td align="left" valign="top"> <br>
                <input type="submit" value="Submit" class="button">
                <input type="reset" value="Reset" class="button">
            </td>
        </tr>
        </form>
    </table>

</body>
</html>