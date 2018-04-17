<?php
session_start(); 
?>
<html> 
<head><title>Result Page</title></head> 
<body> 
<?php    
if(isset($_SESSION["name"]))
    echo "Ten cua ban la <b>".$_SESSION["name"]."</b>"; 
?> 
</body> 
</html> 
