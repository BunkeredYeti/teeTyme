<?php
# display entry form for enrollments3 table
# use dropdown listbox (select/option)

require 'crud2/database.php';

?>

<form action='assignment03.php' method='post'>

	Person: <br />
	<select name='person'>
	<?php
	    $pdo = Database::connect();
	    $sql = 'SELECT * FROM persons ORDER BY id DESC';
		foreach ($pdo->query($sql) as $row) {
			echo "<option value='".$row["id"]."'>".$row["id"].". ".$row["fname"]." ".$row["lname"]."</option>";
		}
		Database::disconnect();
	?>
	</select><br />

	Course: <br />
	<select name='course'>
	<?php
	    $pdo = Database::connect();
	    $sql = 'SELECT * FROM courses ORDER BY id DESC';
		foreach ($pdo->query($sql) as $row) {
			echo "<option value='".$row["id"]."'>".$row["title"].". ".$row["section"]."</option>";
		}
		Database::disconnect();
	?>
	</select><br />

	<button type="submit">Create</button>
</form>