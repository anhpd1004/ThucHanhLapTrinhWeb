<?php ob_start(); 
session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Bài 4</title>
</head>
<body>
<h1>Phạm Duy Anh - 20155076</h1>
<?php 
//huy cac bien session
unset($_SESSION["row"]);
?>
<script language="javascript">
	window.open("Bai3.php","_self");
</script>
</body>
</html>
<?php ob_flush(); ?>
