
<html>
<head>

<link href="profile1.css" rel="stylesheet"  type="text/css"  />

</head>
<body>
<?php
session_start();
$sesn_email=$_SESSION["email"];


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
							<li class="active"><a href="Edit_profile.php">Edit Your Info</a></li>
							
						
							<li><a href="logout.php">Log Out</a></li>
                            </ul>
                 </div>
<div class="margin-small"></div>
<div class="cutout">
								<h3 style="position:relative; padding-left:15px;"> User's Activity </h3>
								<ul class="nav nav-pills nav-stacked">
								<li><a href="Rate_concert.php">Rate Concert</a></li>
								<li><a href="">Recommendations</a></li>
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
echo "<h3>Hello....".$ufname." ".$ulname." your info has been updated</h3><br>";
}
else
{
echo "";
}
?>
<div id="Sign-Up"> 
 <?php
   $fn=$_POST['Fname'];
   $ln=$_POST['Lname'];
  

   
   $city=$_POST['city'];

   if ($_POST['submit'])
   {
     include "connectdb1.php";
	 if (!empty ($fn))
	  {
	    $Updt_qry="update user set ufname=? where email=?";
        $stmt1= $mysqli->prepare($Updt_qry);
		$stmt1->bind_param("ss",$fn,$sesn_email); 
		$stmt1->execute(); 
		echo" <h3>FNChanges saved </h3><br> ";
	  }
     
      
     
	 if (!empty($ln))
	  {
	    $Updt_qry="update user set ulname=? where email=?";
        $stmt1= $mysqli->prepare($Updt_qry);
		$stmt1->bind_param("ss",$ln,$sesn_email); 
		$stmt1->execute(); 
		echo" <h3>LN Changes saved</h3><br> ";
	  }
    
	 
	 	  
	   if (!empty($city))
	  {
	    $Updt_qry="update user set city=? where email=?";
        $stmt1= $mysqli->prepare($Updt_qry);
		$stmt1->bind_param("ss",$city,$sesn_email); 
		$stmt1->execute(); 
		echo" <h3>City Changes saved</h3><br> ";
	  }
	
   }
 
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

$concerts="select c_name , c_time,c_date from attended where c_date > current_date and uid = '$userid'";
$stmt = $mysqli->prepare($concerts);
//$stmt->bind_param("s",$concertname);
$stmt->execute();
$stmt->bind_result($c_name , $c_time,$c_date);
while($stmt->fetch())
{
echo "inside";
//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>Upcoming Concert</th><th>Time</th><th>Date</th></tr><tr><td>';
echo "<a href=/concert1.php?concertname=",urlencode($c_name),"> $c_name</a></td><td>$c_time</td><td>$c_date</td></tr></table>";

}
}

?>
</body>
</html>