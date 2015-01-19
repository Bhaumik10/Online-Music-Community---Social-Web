<?php
session_start();
$xx=$_SESSION["email"];
$bandname=$_GET["bandname"];
?>
<html>
<script src="jquery-1.11.1.min.js"></script>
<head>

</head>
<body>

<?php
include "connectdb1.php";
//echo $bandname;
//$bands="select b.b_id,b.b_name,b.b_desc,b.m_name,c.c_name from band b, concert c where b.b_id=c.b_id and  b_name like ? ";
$bands="select b.b_id,b.b_name,b.b_desc,b.m_name from band b where b_name like ? ";
//$bands="select b_name from band b where  b_name like ? ";
$bandname= "%".$bandname."%";
$stmt = $mysqli->prepare($bands);
$stmt->bind_param("s",$bandname);
$stmt->execute();
$stmt->bind_result($b_id,$b_name,$b_desc,$m_name);
//$stmt->bind_result($b_name);


//echo "<br/>".$b_name,$b_desc,$m_name,$c_name;?>
<table border="1" width="45%">
<?php while($stmt->fetch()){ ?>
<tr>
	<td><?php echo $b_name ?></td>
	<td><?php echo $m_name ?></td>
	<td><?php echo $b_desc ?></td>
	<td><input type="button" value='like' class="like" bandid="<?php echo $b_id?>"></td>
</tr>
<?php } ?>
</table>
</body>
<script src="like.js"></script>
</html>



