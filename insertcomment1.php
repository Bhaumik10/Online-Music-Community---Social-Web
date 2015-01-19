<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$xx=$_SESSION["email"];
$userid = $_SESSION["userid"];
?>
<html>
<body>
<?php
$cnai=$_POST["cname"];     
//$ctii=$_POST["ctime1"];
//$cdati=$_POST["cdate1"];
//$uidi=$_POST["uid1"];
//$bidi=$_POST["bid1"];
$rati=$_POST["rating1"];
$comi=$_POST["comment1"];

?>

<?php  

include "connectdb1.php";
//echo $cnai;
/*$hello="select b_id from concert where c_name=?";
$stmt = $mysqli->prepare($hello);
$stmt->bind_param("s",$cnai);
$stmt->execute();
$stmt->bind_result($bandid);
if($stmt->fetch())
{
//echo $bandid;

}
*/

echo $cnai;
echo $userid;
//echo $bandid;
echo $rati;
echo $comi;

//$updateInsertQuery1 = "Insert into attended values (?, current_time, current_date,?,?,?,?)";
//$updateInsertQuery1 = "Insert into attended values ('American Purity', current_time, current_date,0,1022222222,3,'greta')";
//$stmt1 = $mysqli->prepare($updateInsertQuery1);


$conn = mysql_connect("localhost", "root", "");
mysql_select_db('music_community');

$sql = "update attended set rating =$rati, coment='$comi' where uid=$userid and c_name='$cnai'";
$retval = mysql_query( $sql, $conn );


$true="select score from truescore where uid = ? ";
$stmt = $mysqli->prepare($true);
$stmt->bind_param("s",$userid);
$stmt->execute();
$stmt->bind_result($score);
while($stmt->fetch())
{
$score = $score+1;
$sql = "update truescore set score=$score where uid=$userid";
$retval = mysql_query( $sql, $conn );
//echo $score;


}




//$stmt1->bind_param("siiis",$cnai,$userid,$bandid,$rati,$comi);

//$stmt1->execute();

			?>			
					
			
			
</html>
</body>

