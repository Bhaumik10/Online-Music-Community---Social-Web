<html>

<?php
include "connectdb.php";
session_start();
if ($_POST['button']){
    if ($_POST['phone'] != ''){
    $_SESSION['phone_session'] = $_POST['phone'];
    }
	}


//perform SQL query
if(($_POST["cake"]) != "") {

    $input_cake = $_POST["cake"];
	
     if($stmt = $mysqli->prepare("SELECT s.sname,s.description,m.size,m.price FROM sandwich s,menu m WHERE s.sname= m.sname and s.description LIKE ?")){
        $input_cake="%".$input_cake."%";
		$stmt->bind_param("s", $input_cake);
        $stmt->execute();
        $stmt->bind_result($sname,$description,$size, $price);

        // Printing results in HTML
        echo "<table border = '1'>\n";
        while ($stmt->fetch()) {
		
	        echo "<tr>";
            echo "<td>$sname</td><td>$description</td><td>$size</td><td>$price</td>";
	        echo "</tr>\n";
        }
        echo "</table>\n";
		
    }
	}
else {
    $stmt = $mysqli->prepare("SELECT * FROM menu");
        //$stmt->bind_param("s");
		
        $stmt->execute();
        $stmt->bind_result($sname,$size, $price);

        // Printing results in HTML
        echo "<table border = '1'>\n";
        while ($stmt->fetch()) {
		
	        echo "<tr>";
            echo "<td>$sname</td><td>$size</td><td>$price</td>";
	        echo "</tr>\n";
        }
        echo "</table>\n";
        $stmt->close();
	$mysqli->close();
	
    }

?>
</html>