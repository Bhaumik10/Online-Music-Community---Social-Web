<?php
session_start();
$xx=$_SESSION["email"];
$userid = $_SESSION["userid"];
?>
<html>
<head>

<link href="profile1.css" rel="stylesheet"  type="text/css"  />

</head>
<body background="standard.jpg">
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
							<li><a href="/edit">Edit Your Info</a></li>
							<li><a href="/change-password">Change Password</a></li>
						
							<li><a href="/logout">Log Out</a></li>
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


<form action="insertcomment1.php" method="POST" >


<br/><br/>
 comment about concert:    
 
 <?php include 'connectdb1.php';?>

<?php
    $stmt = $mysqli->prepare("SELECT  a.c_name from attended a, concert c where c.c_name = a.c_name and c.c_date < current_date and c.uid = ?  ");
	$stmt->bind_param("i",$userid);
    $stmt->execute();
    $stmt->bind_result($cname);
    $stmt->store_result();
    echo "<select name='cname'>";
    while($stmt->fetch()){?>
        <p><?php echo  '<option value="'.$cname.'">'.$cname.'</option>'; ?></p>
    <?php }
    echo "</select>";
?>
 
 
							
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
                            
							
							
							
						
							
							
							<input type="hidden"  value='<? echo $_GET["uid"]; ?>'   placeholder="enter user uid "  name="uid1"/>
							<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<!--<input type="text"   placeholder="enter band id" name="bid1"/>-->
							<input type="text"   placeholder="rating " name="rating1"/>
							
							<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <textarea name='comment1' id='comment' placeholder="comment " ></textarea>

  


<input type="submit" value="submit">
</form>
