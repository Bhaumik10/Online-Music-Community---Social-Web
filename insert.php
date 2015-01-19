<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$fn=$_POST['Fname'];
$ln=$_POST['Lname'];
$brth=$_POST['birthdate'];
$Email=$_POST['email'];
$pwd=$_POST['pass'];
$city=$_POST['city'];
$zip=$_POST['zip'];
$spcl_code=$_POST['scode'];
if ($_POST['submit'])
{
 
    $conn = mysql_connect("localhost", "root", "");
 mysql_select_db('music_community');
$sql = "SELECT MAX(uid) AS `max` FROM user";
$result = mysql_query($sql,$conn);
if (!$result) {
    die("Error: ".mysql_error()); // Note: raw database errors are useless for users
                                  // better log the error an create a "nice" error page
}
while ($row = mysql_fetch_assoc($result)) {
    //echo $row["max"];

//echo $row["max"];
$next_id=$row["max"]+1;
//echo $next_id;
if (empty($spcl_code))
  $spcl_code=NULL;

include "connectdb1.php";
$stmt = $mysqli->prepare("Insert into user values(?,?,?,?,?,?,?,?,?,now())");
$stmt->bind_param("issssssss", $next_id,$fn,$ln,$brth,$Email,$city,$zip,$spcl_code,$pwd); 
$stmt->execute();
echo" Inserted <br>";

if  (empty($spcl_code))
		{
		include "connectdb1.php";
		$stmt2=$mysqli->prepare("Insert into truescore  values(?,0)");
		$stmt2->bind_param("i", $next_id);
		$stmt2->execute();
		echo" Inserted into truescore <br>";
		}
}
}
?> 