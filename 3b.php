<?php
session_start();
$phone_number1 = $_SESSION["phonenumber"];
?>
<?php
include "connectdb.php";
$Sname = $_POST["sname"];
print_r($Sname);
$Size = explode(':',$Sname);
print_r($Size);
$s = $Size[1];
$n = $Size[0];
echo $phone_number1;
		$stmt = $mysqli->prepare("Insert into orders
								values(?,?,?,?,?,?)");
		if($stmt==false)
			echo "heelo";
		$datetime = date("Y-m-d H:i:s");
		#$datetime=NOW();
		echo "date : $datetime";
		$quant=1;
		$stat = "pending";
		$stmt->bind_param("dssdds", $phone_number1,$n,$s,$datetime,$quant,$stat);
		if(!$stmt->execute())
			echo "eelje";
	echo "Hello"; 		
?>