<?php
session_start();
$xx=$_SESSION["email"];
$concertname=$_GET["concertname"];
?>
<html>
<head>
<script src="jquery-1.11.1.min.js"></script>
</head>
<body>
<?php
include "connectdb1.php";

$concerts="select c_name , c_time,c_date,c_des,c_ticket_price,c.v_venue,c_avail,v_address,v_city from concert c, venue v where v.v_zip=c.v_zip and  c_name = ? ";
//$concertname= "%".$concertname."%";
$stmt = $mysqli->prepare($concerts);
$stmt->bind_param("s",$concertname);
$stmt->execute();
$stmt->bind_result($c_name , $c_time,$c_date,$c_des,$c_ticket_price,$v_venue,$c_avail,$v_address,$v_city);

//$stmt->bind_result($b_name);


//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;?>


<table border="1" width="45%">
<?php while($stmt->fetch()){ ?>
<tr>
	<td><?php echo $c_name ?></td>
	<td><?php echo $c_des ?></td>
	<td><?php echo $v_venue ?></td>
	<td><?php echo $c_ticket_price ?></td>
	<td><input type="button" value='RSVP' class="like" concertname="<?php echo $c_name?>"></td>
	
	
</tr>
<?php } ?>
</table>
</body>
<script src="rsvp.js"></script>
</html>
