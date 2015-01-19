<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$xx=$_SESSION["email"];
$uid=$_SESSION["userid"];
$mymusictaste=$_POST["musiclike"];
//echo $uid;
//echo $mymusictaste;
?>





<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
$sql = "Insert into usermusictaste values ($uid,'$mymusictaste')";
$retval = mysql_query( $sql, $conn );
echo "you have liked your music taste"


			?>	