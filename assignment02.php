<?php-
$a = file_get_contents("assignment02.txt");
$b = file("assignment02.txt");
print_r($a."\n");
print_r($b);



#assign array elements to variables
$c = array("fred","989-999-9999","fred@flintstone.dino");
list($name, $phone, $email) = $c;
foreach ($c as $row){
	echo $row." ";
}


#exercise
$abbrevs = file("stateabb.txt");
$names = file("states.txt");
$i = 0;

foreach($abbrevs as $row){
	$++i;
	${$row} = $names[$i];
}

echo get_defined_vars();


?>