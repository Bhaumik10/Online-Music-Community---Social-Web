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
$hello="select uid,ufname,ulname from user where email=?";
$stmt = $mysqli->prepare($hello);
$stmt->bind_param("s",$xx);
$stmt->execute();
$stmt->bind_result($uid,$ufname,$ulname);
if($stmt->fetch())
{
echo "<h1>Welcome....".$ufname." ".$ulname."</h1>";
echo "your UID :".$uid;

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

<form name="my_form1" action="search1.php" method="POST">
search by band name    :   <input type="text"  name="bname"/> <br/><br/>
search by concert name :    <input type="text"  name="cname"/> <br/><br/>
search by music type   :	<input type="text"  name="mtype"/><br/><br/>
search from date    :	<input type="date(yyyy-mm-dd)"  name="fromdate" /> to date <input type="date(yyyy-mm-dd)" name="todate" /><br/><br/>
  
search by location     :	<input type="text"  name="lname"/> <input type="submit" value="submit"><br/><br/>
</form>
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
							<input type="hidden"  placeholder="enter user uid " value='<? echo $_GET["uid"]; ?>' name="uid"/>
							<input type="text"   placeholder="enter concert availability " name="cavail"/>
							


<input type="submit" value="submit">

</form>
<form action="insertcomment1.php" method="POST" >


<br/><br/>
 comment about concert:    <input type="text" placeholder="enter concert name" name="cname1"/>
                            <input type="text" placeholder="enter concert time"name="ctime1"/>
							<input type="text"  placeholder="enter concert date" name="cdate1"/>
							
							
						
							
							
							<input type="hidden"  value='<? echo $_GET["uid"]; ?>'   placeholder="enter user uid "  name="uid1"/>
							<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<!--<input type="text"   placeholder="enter band id" name="bid1"/>-->
							<input type="text"   placeholder="rating " name="rating1"/>
							
							<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <textarea name='comment1' id='comment' placeholder="comment " ></textarea>

  


<input type="submit" value="submit">
</form>









</body>
</html>