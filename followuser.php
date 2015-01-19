<?php
session_start();
$xx=$_SESSION["email"];
$uid=$_SESSION["userid"];
?>

<?php 
include "connectdb1.php";

$ufname=$_GET["ufname"];
$type=$_GET["type"];

$user="select uid from user where ufname = ? ";
//$bands="select b_name from band b where  b_name like ? ";

$stmt = $mysqli->prepare($user);
$stmt->bind_param("s",$ufname);
$stmt->execute();

$stmt->bind_result($fid);
$stmt->fetch();
//echo $ufname;
//echo $uid;
//echo $type;
?>

<?php
/*$conn = mysql_connect("localhost", "root", "root");
mysql_select_db('pro');

$sql = "select uid as 'userid' from user where ufname = '$ufname'";
$retval = mysql_query( $sql, $conn);

while ($row = mysql_fetch_assoc($retval)) {
 $fid= $row["userid"];*/

if($type == 'follow')
{
echo $uid;
echo $fid;
//if ($uid == $fid)
//{
//echo "you cannot follow urself";
//}
//else{
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
$sql = "Insert into follower1 values ($uid,$fid, now())";
$retval = mysql_query( $sql, $conn );
//}
}
else
{
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
$sql = "delete from follower1 where uid = $uid and fid = $fid";
$retval = mysql_query( $sql, $conn );
}
//}
			?>	




