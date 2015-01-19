<?php
session_start();
$xx=$_SESSION["email"];
$userid = $_SESSION["userid"];
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
								<li><a href="recommendation1.php">Recommendations</a></li>
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
 Your Recommendation : 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
 


<?php
     include "connectdb1.php";
			   $stmt = $mysqli->prepare("SELECT c_name,c_des from concert"); 
			   
				//execute SQL query
				$stmt->execute();
				$stmt->bind_result($c_name,$c_des);
				//$row_cnt = $stmt->num_rows;
				
				    
				    // Printing results in HTML
					 echo '<form action="insert_recommend.php" method="post">';
				     echo '<table border="1" width="65%"><tr><td><th>Recommend Concert</th><th>Concert Description</th></tr>';
					 while ($stmt->fetch()) 
						{   
						    //echo '<form action="" method="post">';
							//echo '<table border="1" width="65%"><tr><td><th>Recommend Concert</th><th>Concert Description</th></tr><tr><td>';
						
							//echo "input type=\'radio\'  name=\'sname[]\'  value=\'$sname:$size\' <td>$sname</td><td>$size</td><td>$price</td>";
				           echo "<tr><td><input type=\"checkbox\" name=\"c_name[]\" value=\"$c_name\" /></td><td>$c_name</td><td>$c_des</td></tr>";
	        
                           }
						  echo '</table><br>'; 
					echo '<input type="Submit" name="Recommend" value="Recommend">';
        
        $stmt->close();
	    $mysqli->close();

?>
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

