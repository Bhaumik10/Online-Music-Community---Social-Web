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
<body>
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
								
								
								<li><a href="your_recommendation.php">Your Recommendations</a></li>
								<li><a href="searchby1.php">Search By</a></li>
								<li><a href="insertby1.php">Insert Missing Concert</a></li>
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
echo "<h1>Hey  ".$ufname." ".$ulname."...How are you???"."</h1>";
}
else
{
echo "error";
}
?>
<?php      //   info and url
include "connectdb1.php";
$info="select d_info , url from user u ,dashboard d where u.uid=d.d_uid  and u.uid in (select uid from user where email=?)";
$stmt = $mysqli->prepare($info);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($d_info , $url);
if($stmt->fetch())
{

echo "<br/>".$d_info;

//echo "<br/>"."<a href='localhost/david.php'>".$url."</a>";
}
else
{
echo "error";
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
$concerts="select c.c_name ,c.c_time,c.c_date,c.c_des  from concert c , band b where c.b_id=b.b_id and c.uid in(select uid from user where email='$xx');";
$stmt = $mysqli->prepare($concerts);
//$stmt->bind_param("s",$concertname);
$stmt->execute();
$stmt->bind_result($c_name , $c_time,$c_date,$c_des);
while($stmt->fetch())
{
  echo "<h3> Please view our upcoming concerts </h3>";
//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
 echo '<table border="1" width="45%"><tr><th>Upcoming Concert</th><th>Time</th><th>Date</th><th>Description</th></tr><tr><td>';
echo "<a href=concert1.php?concertname=",urlencode($c_name),"> $c_name</a></td><td>$c_time </td><td>$c_date</td><td>$c_des</td></tr></table>";

}
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