<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include "connectdb1.php";


// username and password sent from form 
$myuser=$_POST['myusername']; 
$mypass=$_POST['mypassword']; 

$sql ="SELECT email , pasword FROM user WHERE email= ? and Pasword=?";
$stmt = $mysqli->prepare($sql);

//$stmt= $mysqli-> prepare("SELECT email , pasword FROM user WHERE email= ? and Pasword=?");

$stmt->bind_param("ss",$myuser,$mypass);
$stmt->execute();
$stmt->bind_result($email,$pasword);
if($stmt->fetch())
{
//echo "".$email."logged in";
session_start();
$_SESSION["email"] = $myuser;

//echo $myuser;

$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
//echo $uid;
//echo $bandid;
$sql = "select uid as 'userid' from user where email = '$myuser'";
$retval = mysql_query( $sql, $conn);

while ($row = mysql_fetch_assoc($retval)) {
 $userid= $row["userid"];
	

$sql = "Insert into user_log values('$userid',now())";
$retval1 = mysql_query( $sql, $conn);
}












//print $_SESSION["email"];

header("location:specialcode1.php");

//header("location:login_success1.php");
}
else {

		echo "Wrong Username or Password";
		echo"<h2><a href='http://localhost/login1.html'>Click here to return to login page</a></h2>";

}
?>


































