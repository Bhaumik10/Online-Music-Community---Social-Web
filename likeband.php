<?php
session_start();
$xx=$_SESSION["email"];
$bandname=$_SESSION["bandname"];
?>

<?php 
include "connectdb1.php";

$bandid=$_GET["bandid"];
$type=$_GET["type"];

$user="select uid from user where email = ? ";
//$bands="select b_name from band b where  b_name like ? ";

$stmt = $mysqli->prepare($user);
$stmt->bind_param("s",$xx);
$stmt->execute();

$stmt->bind_result($uid);
$stmt->fetch();


if($type == 'like')
{
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
echo $uid;
echo $bandid;
$sql = "Insert into fan values ($uid,$bandid, now())";
$retval = mysql_query( $sql, $conn );
}
else
{
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
echo $uid;
echo $bandid;
$sql = "delete from fan where uid = $uid and b_id = $bandid";
$retval = mysql_query( $sql, $conn );
}

			?>	




