<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$xx=$_SESSION["email"];
$uid = $_SESSION['userid'];
//$concertname=$_SESSION["concertname"];
?>

<?php 
include "connectdb1.php";

$concertname=$_GET["concertname"];
$type=$_GET["type"];
$use="select c.c_time,c.c_date,c.b_id from concert c where c.c_name = ?";
//$bands="select b_name from band b where  b_name like ? ";
$stmt = $mysqli->prepare($use);
$stmt->bind_param("s",$concertname);
$stmt->execute();
$stmt->bind_result($c_time,$c_date,$b_id);
$stmt->fetch();

/*$user="select uid from user where email = ? ";
$stmt = $mysqli->prepare($user);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($uid);
$stmt->fetch();*/


if($type == 'RSVP')
{
echo "inside RSVP";
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
echo $uid;
echo $b_id;
echo $concertname;
echo $c_time;
echo $c_date;

$sql = "Insert into attended values ('$concertname','$c_time','$c_date',$uid,$b_id,null,null)";
$retval = mysql_query( $sql, $conn );
}
else
{
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
echo $uid;
echo $b_id;
$sql = "delete from attended where uid = $uid and b_id = $b_id";
$retval = mysql_query( $sql, $conn );
}

			?>	




