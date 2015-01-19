<?php
session_start();
$xx=$_SESSION["email"];

?>
<html>
<body background="standard.jpg">


<?php
$username=$_POST["uname"];






?>
<?php      //   band search
include "connectdb1.php";

if (!empty($username))
{

//$_SESSION["bandname"]=$bandname;
$users="select ufname,ulname,email,city from user where ufname like ? or ulname like ?";
//$bands="select b_name from band b where  b_name like ? ";
$username= "%".$username."%";
$stmt = $mysqli->prepare($users);
$stmt->bind_param("ss",$username,$username);
$stmt->execute();
$stmt->bind_result($ufname,$ulname,$email,$city);
//$stmt->bind_result($b_name);
while($stmt->fetch())
{

//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;
echo '<table border="1" width="45%"><tr><th>user first name</th><th>user last name</th><th>email</th><th>city</th></tr><tr><td>';
echo "<a href=/user.php?ufname=",urlencode($ufname),">$ufname</a></td><td>$ulname</td><td>$email</td><td>$city</td></tr></table>";
//echo "$b_name</td></tr></table>";
}
}