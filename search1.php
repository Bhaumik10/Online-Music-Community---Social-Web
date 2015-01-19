<?php
session_start();
$xx=$_SESSION["email"];

?>
<html>
<body background="music2.jpg">


<?php
$bandname=$_POST["bname"];

$concertname=$_POST["cname"];
$musictype=$_POST["mtype"];
$fdate=$_POST["fromdate"];
$tdate=$_POST["todate"];
$locationname=$_POST["lname"];





?>
<?php      //   band search
include "connectdb1.php";

if (!empty($bandname))
{

//$_SESSION["bandname"]=$bandname;
$bands="select b_name,b_desc,m_name,c_name from band b, concert c where b.b_id=c.b_id and  b_name like ? ";
//$bands="select b_name from band b where  b_name like ? ";
$bandname= "%".$bandname."%";
$stmt = $mysqli->prepare($bands);
$stmt->bind_param("s",$bandname);
$stmt->execute();
$stmt->bind_result($b_name,$b_desc,$m_name,$c_name);
//$stmt->bind_result($b_name);
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>band name</th><th>band description</th><th>music name</th><th>concert name</th></tr><tr><td>';
echo "<a href=/band.php?bandname=",urlencode($b_name),">$b_name</a></td><td>$b_desc</td><td>$m_name</td><td>$c_name</td></tr></table>";
//echo "$b_name</td></tr></table>";
}
}
 ?>
 <?php      //   concert search
include "connectdb1.php";
if(!empty($concertname))
{
$concerts="select c_name , c_time,c_date,c_des,c_ticket_price,c.v_venue,c_avail,v_address,v_city from concert c, venue v where v.v_zip=c.v_zip and  c_name like ? ";
$concertname= "%".$concertname."%";
$stmt = $mysqli->prepare($concerts);
$stmt->bind_param("s",$concertname);
$stmt->execute();
$stmt->bind_result($c_name , $c_time,$c_date,$c_des,$c_ticket_price,$v_venue,$c_avail,$v_address,$v_city);
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>concert name</th><th>concert time</th><th>concert date</th><th>concert Description</th><th>Ticket Price</th><th>venue</th><th>Availability</th><th>Address</th><th>city</th></tr><tr><td>';
echo "<a href=/concertname1.php?concertname=",urlencode($c_name),">$c_name</td><td>$c_time</td><td>$c_date</td><td>$c_des</td><td>$c_ticket_price</td><td>$v_venue</td><td>$c_avail</td><td>$v_address</td><td>$v_city</td></tr></table>";

}
}

?>
 <?php      //   music type
include "connectdb1.php";
if(!empty($musictype))
{

$musict="select us.m_name , c.c_name ,c_date,v_venue,c_time,b_name from user u , usermusictaste us , concert c, band b where u.uid=us.uid and u.uid=c.uid and b.b_id = c.b_id and us.m_name like ? ";
$musictype= "%".$musictype."%";
$stmt = $mysqli->prepare($musict);
$stmt->bind_param("s",$musictype);
$stmt->execute();
$stmt->bind_result($m_name , $c_name ,$b_name,$c_date,$v_venue,$c_time);
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>music name</th><th>concert name</th><th>band name</th><th>Date</th><th>venue</th><th>Time</th></tr><tr><td>';
echo "$m_name</td><td>$c_name</td><td>$b_name</td><td>$c_date</td><td>$v_venue</td><td>$c_time</td></tr></table>";

}
}

?>

<?php      //   date
include "connectdb1.php";



if(!empty($fdate))
{
$date="select c_date,v.v_city,c.c_name , v.v_name,c_time,b_name,m.m_name from venue v , concert c , band b, music m where m.m_name=b.m_name and c.v_zip=v.v_zip and b.b_id=c.b_id and c.c_date between ? and ? ";

$stmt = $mysqli->prepare($date);

$stmt->bind_param("ss",$fdate,$tdate);
#print $date;
$stmt->execute();
$stmt->bind_result($c_date,$v_city , $c_name ,$v_venue,$c_time,$b_name,$m_name );
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>Date</th><th>City</th><th>Concert name</th><th>venue</th><th>Time</th><th>Band Name</th><th>music name</th></tr><tr><td>';
echo "$c_date</td><td>$v_city</td><td>$c_name</td><td>$v_venue</td><td>$c_time</td><td>$b_name</td><td>$m_name</td></tr></table>";
}
}
?>




<?php      //   location
include "connectdb1.php";

if(!empty($locationname))
{
$locname="select v.v_city , c.c_name ,c_date, v.v_name,c_time,b_name,m.m_name from venue v , concert c , band b, music m where m.m_name=b.m_name and c.v_zip=v.v_zip and b.b_id=c.b_id and v.v_city like ? ";
$locationname = "%".$locationname."%";
$stmt = $mysqli->prepare($locname);
$stmt->bind_param("s",$locationname);
$stmt->execute();
$stmt->bind_result($v_city , $c_name ,$c_date,$v_venue,$c_time,$b_name,$m_name );
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>City</th><th>concert name</th><th>Date</th><th>Venue</th><th>Time</th><th>Band Name</th><th>Music Name</th></tr><tr><td>';
echo "$v_city</td><td>$c_name</td><td>$c_date</td><td>$v_venue</td><td>$c_time</td><td>$b_name</td><td>$m_name</td></tr></table>";

//echo $mapapi;
}
}
?>
<div><img src="map1capture.png"></div>


					
			
			
</html>
</body>