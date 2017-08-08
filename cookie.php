<?php
	// add 1 day to the current time for expiry time
	$expiryTime = time()+60*60*24;
	
	//create a persistent cookie
	$name = "Username";
	$value = "Ricardo";
	setCookie($name, $value, $expiryTime);
	echo "hello </br>";
	echo "<a href = 'assignment08b.php'>clikc</a>";
?>