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
$s = $Size[1]; //size
$n = $Size[0];  //sname
echo $phone_number1;


$submitQuery = "Select * from orders where phone = ? and sname = ? and size = ? and status = 'pending'";
		$submitStmt = $mysqli->prepare($submitQuery);
		if($submitStmt == false) 
		{
		echo "failed";
			
		}
         $submitStmt->bind_param("iss",$phone_number1,$n,$s);
		if(!$submitStmt->execute())
		{	
			echo "Execute failed: " ;
		}
		if (!($submitResult = $submitStmt->get_result()))
		{
			echo "Getting result set failed: " ;
		}
		
		
		
		
		//$stmt->bind_param("dss", $phone_number1,$n,$s);
		//$stmt->execute();
		
		
		
		if($submitResult->num_rows > 0)
		{
			$updateInsertQuery  = "Update orders set quantity = quantity + 1, o_time = now() where phone = ? and sname = ? and size = ? and status = 'pending'";
		}
		else
		{
			$updateInsertQuery = "Insert into orders values (?, ?, ?, now(), 1, 'pending')"; 
		}
		
		
		$updateInsertStmt = $mysqli->prepare($updateInsertQuery);
		if($updateInsertStmt == false) 
		{
			echo "failed";
			
		}
		$updateInsertStmt->bind_param("iss",$phone_number1,$n,$s);
			if(!$updateInsertStmt->execute())
			{	
				echo "Execute failed: ";
			}
		/* if (!($updateInsertResult = $updateInsertStmt->get_result()))
		{
			echo "Getting result set failed: (" . $updateInsertStmt->errno . ") " . $updateInsertStmt->error;
		} */
		echo "Order placed!!!";
		$updateInsertStmt->close();
	
	
?>
