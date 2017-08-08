<?php
#https://csis.svsu.edu/~gpcorser/cis355/


#exercise
$abbrevs = file("stateabb.txt");
$names = file("states.txt");
$i = 0;

foreach($abbrevs as $row){
	++$i;
	${$row} = $names[$i];
}

echo get_defined_vars();


?>



