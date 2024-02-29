
<?php
session_start();
session_unset();
session_destroy();
//echo "<br>Logout Successfully";
echo"<br><script>location='index.php'</script>";

?>
