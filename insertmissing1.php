<?php
session_start();
$xx=$_SESSION["email"];
error_reporting(E_ALL ^ E_DEPRECATED);
$ui=$_SESSION["userid"];
?>
<html>
<body background="standard.jpg">

<?php
$cna=$_POST["cnam"];     // missing concert details
$cti=$_POST["ctim"];
$cdat=$_POST["cdat"];
$cdes=$_POST["cdes"];
$ctckp=$_POST["ctckp"];
$cven=$_POST["cven"];
$bi=$_POST["bid"];
$vz=$_POST["vzi"];
//$ui=$_POST["uid"];
$cavai=$_POST["cavail"];

  // insertin missing concert
include "connectdb1.php";

/*$convert="select b_id from band b where b_name = ? ";
$stmt = $mysqli->prepare($convert);
$stmt->bind_param("s",$bi);
$stmt->execute();
$stmt->bind_result($bid);
if($stmt->fetch())
{
echo $bid;
}

$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');
echo $bi;
$sql = "select b_id as 'bid' from band where b_name = '$bi'";
$retval = mysql_query($sql,$conn);

while ($row = mysql_fetch_assoc($retval)) {
$bi= $row['bid'];*/
$truescore="select score,DATE_SUB(u.user_creation, INTERVAL 2 YEAR) as udate from user u,truescore tr where u.uid=tr.uid and u.uid = ?";
$stmt1 = $mysqli->prepare($truescore);
$stmt1->bind_param("i",$ui);
$stmt1->execute();
$stmt1->bind_result($score,$udate);
if($stmt1->fetch())
{
//echo $score;
//echo $udate;
}
else{
echo "error";
}
if($score>7 || date($udate)<getdate())
{

$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');



$sql = "Insert into concert values ('$cna','$cti','$cdat','$cdes',$ctckp,'$cven','$cavai',$bi,$vz,$ui,now(),now())";
$retval = mysql_query($sql,$conn);
echo "missing concerted successfully inserted ";
}
else{
echo "error";
}



/*$updateInsertQuery = "Insert into concert values (?,?,?,?,?,?,?,?,?,?,now(),now())";
$stmt = $mysqli->prepare($updateInsertQuery);
$stmt->bind_param("ssssissiii",$cna,$cti,$cdat,$cdes,$ctckp,$cven,$cavai,$bi,$vz,$ui);

$stmt->execute();
if(!$stmt->execute())
			{	
				echo "missing concerted successfully inserted ";
			}
			else
			{
			echo "missing concerted insertion failed ";
			}
			
			}
			
			else
			{
			echo "you cannot insert missing concert";
			
			
			}
			*/
			?>
</html>
</body>
