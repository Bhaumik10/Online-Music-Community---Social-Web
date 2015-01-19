<?php
session_start();
$xx=$_SESSION["email"];

//print $xx;



?>
<?php    //  last name and first name display
include "connectdb1.php";
$hello="select uid,ufname,ulname from user where email=?";
$stmt = $mysqli->prepare($hello);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($uid,$ufname,$ulname);
if($stmt->fetch())
{
//echo "<h1>Welcome....".$ufname." ".$ulname."</h1>";
//echo "your UID :".$uid;

}
else
{
echo "error";
}

?>

<html>
<body>
<form name="my_form2" action="insertmissing1.php" method="POST">
insert missing concert :    <input type="text" placeholder="enter concert name" name="cnam"/>
                            <input type="text" placeholder="enter concert time"name="ctim"/>
							<input type="text"  placeholder="enter concert date" name="cdat"/>
							<input type="text"  placeholder="enter concert description" name="cdes"/>
							<input type="text"   placeholder="enter concert ticket price"name="ctckp"/><br/><br/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  placeholder="enter concert venue" name="cven"/>
							
							<input type="text"   placeholder="enter band id" name="bid"/>
							
		                     <input type="text"   placeholder="enter concert venue zip " name="vzi"/>
							<input type="hidden"  placeholder="enter user uid " value='<? echo $_POST["uid"]; ?>' name="uid"/>
							<input type="text"   placeholder="enter concert availability " name="cavail"/>
							


<input type="submit" value="submit">
</body>
</html>