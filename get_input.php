<?php
session_start();
$_SESSION["phonenumber"] = $_POST["phone"]; 
?>
<html>
<body>
<?php
include "connectdb.php";
$phone_number = $_SESSION["phonenumber"];
echo "HI!!!: $phone_number <br>";



/*if ($_POST['button']){
    if ($_POST['phone'] != ''){
    $_SESSION['phone_session'] = $_POST['phone'];
    }
	}

echo " $_SESSION['phone_session'] ";*/



//perform SQL query
$input_cake = $_POST["cake"];
	
	
	if($input_cake!="")
{$stmt = $mysqli->prepare("SELECT s.sname,m.size,m.price,s.description FROM sandwich s,menu m WHERE s.sname= m.sname and s.description LIKE ?");
$input_cake= "%".$input_cake."%";
$stmt->bind_param("s", $input_cake);
}    

else {
    $stmt = $mysqli->prepare("SELECT s.sname,m.size,m.price,s.description FROM sandwich s,menu m WHERE s.sname= m.sname");  //"SELECT * FROM menu"
	
	}
        $stmt->execute();
        $stmt->bind_result($sname,$size, $price,$description);

        // Printing results in HTML
        
        while ($stmt->fetch()) {
		
	        echo '<form action="final_l.php" method="post">';
            echo '<table border="1" width="10%"><tr><td>';
			echo "<input type=\"radio\" name=\"sname\" value=\"$sname:$size\" </td><td>$sname</td><td>$size</td><td>$price</td><td>$description</td></tr></table>";
	        
        }
        echo '<input type="submit" name="formSubmit" value="Submit"/>';
        $stmt->close();
	$mysqli->close();
	
    

?>
</body>
</html>