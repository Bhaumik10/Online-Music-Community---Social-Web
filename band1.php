<?php
session_start();
$xx=$_SESSION["email"];
?>
<html>
<body>


<?php
$bandname=$_POST["variable from user page//band name or varibale from hyperlink click"];
?>

<?php      //   band search
include "connectdb1.php";

if (!empty($bandname))
{
echo $bandname;
	//$_SESSION["bandname"]=$bandname;
$bands="select b_name,b_desc,m_name,ufname,ulname,c.c_name,c.c_time,c.c_date from band b, user u , usermusictaste um, concert c 
where um.m_name=b.m_name and um.uid = u.uid 
and c.b_id = b.b_id and b_name like ? ";
//$bands="select b_name from band b where  b_name like ? ";
$bandname= "%".$bandname."%";
$stmt = $mysqli->prepare($bands);
$stmt->bind_param("s",$bandname);
$stmt->execute();
$stmt->bind_result($b_name,$b_desc,$m_name,$ufname,$ulname,$c_name,$c_time,$c_date);
//$stmt->bind_result($b_name);
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><td>';
echo "<a href=\"/band.php\">$b_name</a></td><td>$b_desc</td><td>$m_name</td><td>$ufname</td><td>$ulname</td>
<td>$c_name</td><td>$c_time</td><td>$c_date</td></tr></table>";
//echo "$b_name</td></tr></table>";
}
}
 ?>
