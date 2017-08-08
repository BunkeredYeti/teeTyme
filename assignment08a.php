<?php
	// add 1 day to the current time for expiry time
	$expiryTime = time()+60*60*24;
	
	
	//create a persistent cookie
	$name = "Username";
	$value = "Ricardo";
	static $counter = 0;
	setCookie($name, $value, $expiryTime, $counter);
	echo "hello </br>";
	echo "<a href = 'assignment08b.php'>click</a>";
?>