<?php
session_start();
$xx=$_SESSION["email"];
//print $xx;

?>


<html>
<body>
<!--Login Successful
Hello-->
<?php    //  last name and first name display
include "connectdb1.php";
$hello="select ufname,ulname from user where email=?";
$stmt = $mysqli->prepare($hello);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($ufname,$ulname);
if($stmt->fetch())
{
echo "<h1>Welcome....".$ufname." ".$ulname."</h1>";
}
else
{
echo "error";
}

?>
<?php      //   info and url
include "connectdb1.php";
$info="select d_info , url from user u ,dashboard d where u.uid=d.d_uid  and u.uid in (select uid from user where email=?)";
$stmt = $mysqli->prepare($info);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($d_info , $url);
if($stmt->fetch())
{

echo "<br/>".$d_info;

echo "<br/>"."<a href='localhost/david.php'>".$url."</a>";
}
else
{
echo "error";
}

?>
<?php      //   music taste
include "connectdb1.php";
$taste="select m_name from user u , usermusictaste um where u.uid= um.uid  and u.uid in (select uid from user where email=?)";
$stmt = $mysqli->prepare($taste);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($m_name);
if($stmt->fetch())
{

echo "<br/>".$m_name;


}
else
{
echo "error";
}

?>
<?php      //   user's true score
include "connectdb1.php";
$score="select score from user u , truescore t where u.uid= t.uid  and u.uid in (select uid from user where email=?)";
$stmt = $mysqli->prepare($score);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($score);
if($stmt->fetch())
{

echo "<br/>".$score;


}
else
{
echo "error";
}

?>
</body>
</html>