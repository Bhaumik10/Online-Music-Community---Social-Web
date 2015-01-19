<?php
$mysqli = new mysqli("localhost", "root", "", "music_community");

if ($mysqli)
{
	//printf("connected");
}





/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
