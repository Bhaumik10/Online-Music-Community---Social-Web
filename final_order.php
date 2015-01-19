 <html>
<body>
<?php
include "connectdb.php";
session_start();

$Sname = $_POST["sname"];
$phone_number1 = $_session["phonenumber"];
echo $phone_number1;
$N = count($Sname);

for($i=0; $i < $N; $i++)
    {
	  $j=0;
	  $k=1;
	  $pieces = explode(":",$Sname[$i]);
      echo "The sandwich is \"$pieces[$j]\" and size is  \"$pieces[$k]\" <br>";
	  
		$stmt = $mysqli->prepare("Select quantity from orders
									where phone = ? and
									sname = ? and 
									size =? ");
		$stmt->bind_param("dss", $phone_number1,$pieces[$j],$pieces[$k]);
		$stmt->execute();
		$stmt->bind_result($quantity);
		
		if($stmt->fetch()) {
		echo "inside updat";
		echo ":$quantity:";
		$update_quantity = $quantity+1;
		echo ":$update_quantity:";
		$stmt = $mysqli->prepare("update orders
								 set quantity = ?
								 where phone = ? and
									sname = ? and 
									size =? and
									ststus = ?");
		$constant_string = "pending";
		$stmt->bind_param("ddsss",$update_quantity,$phone_number1,$pieces[$j],$pieces[$k],$constant_string);
		$stmt = $mysqli->prepare("update orders
								 set quantity = ?
								 where phone = ? and
									sname = ? and 
									size =?"
								);
		$constant_string = "pending";
		$stmt->bind_param("ddss",$update_quantity,$phone_number1,$pieces[$j],$pieces[$k]);
		$stmt->execute();
		}
		else{
		$stmt = $mysqli->prepare("Insert into orders
								values(?,?,?,?,?,?)");
		$datetime = date("Y-m-d H:i:s");
		#$datetime=NOW();
		echo "date : $datetime";
		$constant_value=1;
		$constant_string = "pending";
		$stmt->bind_param("dssdds", $phone_number1,$pieces[$j],$pieces[$k],$datetime,$constant_value,$constant_string);
		$stmt->execute();
		}

	  $j=$j+2;
	  $k=$k+2;
    }
	
  if(empty($Sname)) 
  {
    echo "You didn't select any sandwich.";
  } 
  else
  {
    $N = count($Sname);
 
    echo("You selected $N sandwich: <br>");
    for($i=0; $i < $N; $i++)
    {
      echo "The order you placed are \"$Sname[$i]\" Sandwich <br>";
    }
  }
?>
</body>
</html>


		
		 
		              
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					  
					/*  if($stmt->num_rows>0) {
		
		"update orders
								set quantity = quantity + 1
								 where phone = ? and
									sname = ? and 
									size =? and
									status = ?"
		$stmt = $mysqli->prepare();
		$constant_string = "pending";
		$stmt->bind_param("ddsss",$phone_number1,$n,$s,$constant_string);}
		 
		                      else{
						$stmt = $mysqli->prepare("Insert into orders
								values(?,?,?,?,?,?)");
											if($stmt==false){
											echo "execution failed";}
											else{
											$datetime = date("Y-m-d H:i:s");
												#$datetime=NOW();
											echo "date : $datetime";
											$quant=1;
											$stat = "pending";
											$stmt->bind_param("dssdds", $phone_number1,$n,$s,$datetime,$quant,$stat);
												}
		}
		 
		 
		 
		 
		 }





	/*$stmt = $mysqli->prepare("Select * from orders								where phone = ? and
									sname = ? and 
									size =? and status = 'pending'");
		$stmt->bind_param("dss", $phone_number1,$n,$s);
		$stmt->execute();
		//$stmt->bind_result($quantity);
		
		if($stmt->num_rows>0) {
		
		$stmt = $mysqli->prepare("update orders
								 set quantity = quantity + 1
								 where phone = ? and
									sname = ? and 
									size =? and
									status = ?");
		$constant_string = "pending";
		$stmt->bind_param("ddsss",$phone_number1,$n,$s,$constant_string);}
		
		




// inserting a new tuple
else{
    $stmt = $mysqli->prepare("Insert into orders
								values(?,?,?,?,?,?)");
		if($stmt==false){
			echo "execution failed";}
			else{
		$datetime = date("Y-m-d H:i:s");
		#$datetime=NOW();
		echo "date : $datetime";
		$quant=1;
		$stat = "pending";
		$stmt->bind_param("dssdds", $phone_number1,$n,$s,$datetime,$quant,$stat);
		}
		}
		//if(!$stmt->execute())
			//echo "execution failed";
	//echo "Hello"; */		
?>
