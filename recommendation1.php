
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$xx=$_SESSION["email"];
$userid=$_SESSION["userid"];

?>

<?php
$Cid=$userid;
//$cid1 = $_POST["musictaste"]
?>

<?php
      //   by attended
include "connectdb1.php";

$Cidq="select m_name from usermusictaste where uid = ?";
//$bands="select b_name from band b where  b_name like ? ";
//$Cid= "%".$Cid."%";
$stmt = $mysqli->prepare($Cidq);
$stmt->bind_param("i",$Cid);
$stmt->execute();
$stmt->bind_result($cid1);
//$stmt->bind_result($b_name);
while($stmt->fetch())
{

echo $cid1;
#echo $Cid;
//if (!empty($Cid)){
echo $Cid;
//$_SESSION["bandname"]=$bandname;
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
$Cidq="select distinct a.c_name,c.c_time,c.c_date,c_des,c_ticket_price,v_venue,c_avail,v_zip,b_name from user u,concert c,band b,follower f,attended a where c.b_id = b.b_id and a.uid= u.uid and u.uid = c.uid and u.uid in(select d_id from follower where uid = $Cid)";
//$bands="select b_name from band b where  b_name like ? ";
//$Cid= "%".$Cid."%";
$retval = mysql_query( $Cidq, $conn);
//$stmt1 = $mysqli->prepare($Cidq);
//$stmt1->bind_param("i",$Cid);
//$stmt1->execute();
//$stmt1->bind_result($c_name,$c_time,$c_date,$c_des,$c_ticket_price,$v_venue,$c_avail,$v_zip,$bname);
//$stmt->bind_result($b_name);
//while($stmt1->fetch())
//{
while ($row = mysql_fetch_assoc($retval)) {
 $c_name= $row["c_name"];
 $c_time= $row["c_time"];
 $c_date= $row["c_date"];
 $c_des= $row["c_des"];
 $c_ticket_price= $row["c_ticket_price"];
 $v_venue= $row["v_venue"];
 $c_avail= $row["c_avail"];
 $v_zip= $row["v_zip"];
 $b_name= $row["b_name"];
 
 
 
 
//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><td>';
echo "<a href=/concertname1.php?concertname=",urlencode($c_name),">$c_name</a></td><td>$c_time</td><td>$c_date</td><td>$c_des</td><td>$c_ticket_price</td><td>$v_venue</td><td>$c_avail</td>
<td>$v_zip</td><td>$b_name</td></tr><tr></tr></table>";

//echo "$b_name</td></tr></table>";
}
//}
 
 ?>

 
 <?php      //   user music taste
include "connectdb1.php";
echo $Cid;

$Cidq="select m_name from usermusictaste where uid = ?";
//$bands="select b_name from band b where  b_name like ? ";
//$Cid= "%".$Cid."%";
$stmt = $mysqli->prepare($Cidq);
$stmt->bind_param("i",$Cid);
$stmt->execute();
$stmt->bind_result($cid);
//$stmt->bind_result($b_name);
while($stmt->fetch())
{
echo $cid;
$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
//$_SESSION["bandname"]=$bandname;
$Cidq1="select c_name,c_time,c_date,c_des,c_ticket_price,v_venue,c_avail,v_zip,b_name from user u,concert c, band b where u.uid = c.uid and c.b_id = b.b_id and b.m_name in (select b.m_name from band b,usermusictaste um where b.m_name = um.m_name and um.uid = 0)";
$retval = mysql_query( $Cidq1, $conn);
//$bands="select b_name from band b where  b_name like ? ";
//$Cid= "%".$Cid."%";
//$stmt = $mysqli->prepare($Cidq1);
//$stmt->bind_param("i",$cid);
//$stmt->execute();
//$stmt->bind_result($c_name,$c_time,$c_date,$c_des,$c_ticket_price,$v_venue,$c_avail,$v_zip,$bname);
//$stmt->bind_result($b_name);
while ($row = mysql_fetch_assoc($retval)) {
 $c_name= $row["c_name"];
 $c_time= $row["c_time"];
 $c_date= $row["c_date"];
 $c_des= $row["c_des"];
 $c_ticket_price= $row["c_ticket_price"];
 $v_venue= $row["v_venue"];
 $c_avail= $row["c_avail"];
 $v_zip= $row["v_zip"];
 $b_name= $row["b_name"];

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><td>';
echo "<a href=/concertname1.php?concertname=",urlencode($c_name),">$c_name</a></td><td>$c_time</td><td>$c_date</td><td>$c_des</td><td>$c_ticket_price</td><td>$v_venue</td><td>$c_avail</td>
<td>$v_zip</td><td>$b_name</td></tr><tr></tr></table>";
//echo "$b_name</td></tr></table>";
}




}
}

 ?>
