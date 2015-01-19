<?php
session_start();
$xx=$_SESSION["email"];
//$userid=$_SESSION["userid"];
//print $xx;

?>
<html>
<head>

<link href="profile1.css" rel="stylesheet"  type="text/css"  />

</head>
<body background="1.png">
<div class="margin-medium"></div>
<div class="container">
<h1>Music Maniacs</h1>
<div class="margin-medium"></div>
<div class="row">
<div class="col-xs-4 col-lg-3">
<div class="row">
<div class="col-xs-10">
                 <div class="cutout">
				            <h3 style="position:relative; padding-left:15px;"> My Profile </h3>
							<ul class="nav nav-pills nav-stacked">
							<li class="active"><a href="profile.php">View Profile</a></li>
							<li><a href="Edit_profile.php">Edit Your Info</a></li>
							<li><a href="logout.php">Log Out</a></li>
                            </ul>
                 </div>
<div class="margin-small"></div>
<div class="cutout">
								<h3 style="position:relative; padding-left:15px;"> User's Activity </h3>
								<ul class="nav nav-pills nav-stacked">
								<li><a href="Rate_concert.php">Rate Concert</a></li>
								<li><a href="recommendation1.php">System Recommendations</a></li>
								<li><a href="your_recommendation.php">Your Recommendations</a></li>
								<li><a href="searchby1.php">Search By</a></li>
								<li><a href="insertby1.php">Insert Missing Concert</a></li>
								<li><a href="searchuser.php">Search By User</a></li>
								<li><a href="musiclike.php">like your music</a></li>
</div>
</div>
</div>
</div>
<div class="col-xs-8 col-lg-9">
<div class="h2">
<?php 
include "connectdb1.php";
$hello="select uid,ufname,ulname from user where email=?";
$stmt = $mysqli->prepare($hello);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($uid,$ufname,$ulname);

if($stmt->fetch())
{
echo "<h3>Welcome....".$ufname." ".$ulname."</h3><br>";
}
else
{
echo "";
}
?>
<?php      //   concert search
include "connectdb1.php";
error_reporting(E_ALL ^ E_DEPRECATED);



$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
//echo $uid;
//echo $bandid;
$sql = "select uid as 'userid' from user where email = '$xx'";
$retval = mysql_query( $sql, $conn);



while ($row = mysql_fetch_assoc($retval)) {
 $userid= $row["userid"];
 $_SESSION["userid"]=$userid;
$concerts="select c_name , c_time,c_date from attended where c_date > current_date and uid = '$userid'";
$stmt = $mysqli->prepare($concerts);
//$stmt->bind_param("s",$concertname);
$stmt->execute();
$stmt->bind_result($c_name , $c_time,$c_date);
echo '<table border="1" width="45%"><tr><th>Upcoming Concert</th><th>Time</th><th>Date</th></tr>';
while($stmt->fetch())
{
echo "<h3> Please view your upcoming concerts </h3>";
//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;

echo "<tr><td><a href=concert1.php?concertname=",urlencode($c_name),"> $c_name</a></td><td>$c_time</td><td>$c_date</td></tr>";

}
echo "</table>";
}

?>


<?php 
     //   gener list
	 include "connectdb1.php";
$concerts="select um.m_name  from user u, usermusictaste um where  u.uid = um.uid and u.email= ?";
//$concertname= "%".$concertname."%";
$stmt = $mysqli->prepare($concerts);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($m_name);

while($stmt->fetch())
{
//echo "<h2> My Genre List<br/>".$m_name."</h2>";
echo '<br/><br/><table border="1" width="45%"><tr><th>My Genre List</th><tr><td>';
echo "$m_name</td></tr></table>";


}

?>


<?php 
     //   follower list
	 include "connectdb1.php";
$concert="select u.ufname,u.ulname from user u where u.uid in (select f.fid from user uu, follower1 f where f.uid = uu.uid  and uu.email= ?)";
//$concertname= "%".$concertname."%";
$stmt = $mysqli->prepare($concert);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($ufname,$ulname);

while($stmt->fetch())
{
//echo "<h2> My Genre List<br/>".$m_name."</h2>";
echo '<br/><br/><table border="1" width="45%"><tr><h4>Follower List</h4></tr><tr><th>Fname</th><th>Lname</th><tr><td>';
echo "$ufname</td><td>$ulname</td></tr></table>";


}

?>


















<div class="margin-medium"></div>
<div class="pull-right">
<div class="margin-huge"></div>

</div>
</div>
</div>
</div>
<footer class="footer-center-no-line">
<div class="container">
<div class="row">
<div class="col-xs-12">

</div>
</div>
</div>
</footer>


</body>
</html>
