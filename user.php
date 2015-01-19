<?php
session_start();
$xx=$_SESSION["email"];
$ufname=$_GET["ufname"];
?>
<html>
<script src="jquery-1.11.1.min.js"></script>
<head>

</head>
<body background="standard.jpg">

<?php
include "connectdb1.php";
$users="select ufname,ulname,email,city from user where ufname like ?";
//$bands="select b_name from band b where  b_name like ? ";
$ufname= "%".$ufname."%";
$stmt = $mysqli->prepare($users);
$stmt->bind_param("s",$ufname);
$stmt->execute();
$stmt->bind_result($ufname,$ulname,$email,$city);
//$stmt->bind_result($b_name);


//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;?>
<table border="1" width="45%">
<?php while($stmt->fetch()){ ?>
<tr>
	<td><?php echo $ufname ?></td>
	<td><?php echo $ulname ?></td>
	<td><?php echo $email ?></td>
	<td><?php echo $city ?></td>
	<td><input type="button" value='follow' class="like" ufname="<?php echo $ufname?>"></td>
</tr>
<?php } ?>
</table>
</body>
<script src="follow.js"></script>
</html>



