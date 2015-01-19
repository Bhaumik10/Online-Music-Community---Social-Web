<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$xx=$_SESSION["email"];
$userid=$_SESSION["userid"];

?>
<form  action=" musiclike1.php" method="post" >
Insert your Music Type :<input type="text" name="musiclike" >
<input type="submit" value="like your music">
</form>

