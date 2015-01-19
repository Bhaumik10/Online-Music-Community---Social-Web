<?php
session_start();
$xx=$_SESSION["email"];
$userid = $_SESSION["userid"];
$concrt_name=$_POST["c_name"];
//print_r ($concrt_name);
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
							<li><a href="profile.php">View Profile</a></li>
							<li><a href="Edit_profile.php">Edit Your Info</a></li>
							<li><a href="logout.php">Log Out</a></li>
                            </ul>
                 </div>
<div class="margin-small"></div>
<div class="cutout">
								<h3 style="position:relative; padding-left:15px;"> User's Activity </h3>
								<ul class="nav nav-pills nav-stacked">
								<li><a href="Rate_concert.php">Rate Concert</a></li>
								<li><a href="recommendation.php">Recommendations</a></li>
								<li class="active"><a href="your_recommendation.php">Your Recommendations</a></li>
								<li><a href="searchby1.php">Search By</a></li>
								<li><a href="insertby1.php">Insert Missing Concert</a></li>
								</ul>
</div>			
</div>
</div>
</div>
<div class="col-xs-8 col-lg-9">
<div>




<br/><br/>
 

							
 


<?php
              include "connectdb1.php";
			  $N = count($concrt_name);
			 // print $N;
			  
			   for($i=0; $i < $N; $i++)
			  {
			    $Insert_recmnd="insert into user_recoomend_concert values (?,?)";
				$Stmt = $mysqli->prepare($Insert_recmnd);
			    $Stmt->bind_param("is", $userid,$concrt_name[$i]);
                $Stmt->execute();
			  
			  }

?>
<h3>Your Recommendations are inserted  </h3>
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