
<html>
<head>

<link href="profile1.css" rel="stylesheet"  type="text/css"  />

</head>
<body>
<?php
session_start();
$xx=$_SESSION["email"];


?>

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
							<li><a href="profile.php">View Profile</a></li>
							<li class="active"><a href="Edit_profile.php">Edit Your Info</a></li>
							<li><a href="logout.php">Log Out</a></li>
                            </ul>
                 </div>
<div class="margin-small"></div>
<div class="cutout">
								<h3 style="position:relative; padding-left:15px;"> User's Activity </h3>
								<ul class="nav nav-pills nav-stacked">
								<li><a href="Rate_concert.php">Rate Concert</a></li>
								<li><a href="sys_recmd.php">System Recommendations</a></li>
								<li><a href="your_recommendation.php">Your Recommendations</a></li>
								<li><a href="searchby1.php">Search By</a></li>
								<li><a href="insertby1.php">Insert Missing Concert</a></li>
								</ul>
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
echo "<h3>You can edit your info....".$ufname." ".$ulname."</h3><br>";
}
else
{
echo "";
}
?>
<div id="Sign-Up"> 
 <fieldset style="width:30%"><legend>Edit Info</legend> 
 <table border="0"> <tr> <form method="POST" action="Update_changes.php"> 
 <td>First Name</td><td> <input type="text" name="Fname"></td> </tr> <tr>
 <td>Last Name</td><td> <input type="text" name="Lname"></td> </tr> <tr>
 <td>City</td><td> <input type="text" name="city"></td> </tr> <tr>
 
 
 <tr> <td><input id="button" type="submit" name="submit" value="Save Changes"></td> </tr>
 </form> </table>
 </fieldset> 
 </div>
</div>

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