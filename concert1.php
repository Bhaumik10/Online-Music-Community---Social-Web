<?php
session_start();
$xx=$_SESSION["email"];
?>

<?php
$Cname=$_GET["concertname"];
?>

<?php      //   band search
include "connectdb1.php";

if (!empty($Cname))
{
echo $Cname;
//$_SESSION["bandname"]=$bandname;
$Cnameq="select c_name,c_time,c_date,c_des,c_ticket_price,v_venue,c_avail,b_id,v_zip from concert c where c_name = ? ";
//$bands="select b_name from band b where  b_name like ? ";
//$Cname= "%".$Cname."%";
$stmt = $mysqli->prepare($Cnameq);
$stmt->bind_param("s",$Cname);
$stmt->execute();
$stmt->bind_result($c_name,$c_time,$c_date,$c_des,$c_ticket_price,$v_venue,$c_avail,$b_id,$v_zip);
//$stmt->bind_result($b_name);
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>Upcoming Concert</th><th>Time</th><th>Date</th><th>Concert description</th><th>Ticket Price</th><th>Date</th><th>Availability</th><th>Band Id</th><th>zip</th><th></th></tr><tr><td>';
echo "$c_name</td><td>$c_time</td><td>$c_date</td><td>$c_des</td><td>$c_ticket_price</td><td>$v_venue</td><td>$c_avail</td>
<td>$b_id</td><td>$v_zip</td></tr></table>";
//echo "$b_name</td></tr></table>";
}
}
 ?>
