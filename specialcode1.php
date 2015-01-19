<?php
session_start();
$xx=$_SESSION["email"];

?>


<?php    //  user vs artist verification
include "connectdb1.php";
$uva="select specialcode from user u where specialcode IS NOT NULL and u.uid in (select uid from user where email=?)";
$stmt = $mysqli->prepare($uva);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($specialcode);
if($stmt->fetch())
{
header("location:artist_dashboard.php");  //dashboard page for artist
}
else 
{
header("location:profile.php"); // dashborad page for user
}




//echo "inside specail code";
//if (empty($specialcode))
//echo "<h1>Welcome....".$special_code."</h1>";
//{
//header("location:profile.php"); // dashborad page for user
//}
//else{
//header("location:artist_dashboard1.php");  //dashboard page for artist
//}
//}
//else
//{
//echo "error in special code";
//}








?>