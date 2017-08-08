<?php
Customers::create_display();
class Customers 
{
	private static $id; 
	private static $name;
	private static $email;
	private static $mobile;
	
	// display create table, possibly also error messages
	public static function create_display()
	{
		echo '<!DOCTYPE html><html lang=en><head><meta charset=utf-8><link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css rel=stylesheet><script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js></script></head>';
		
		echo '<body>';
		echo '<div class=container><div class="offset1 span10"><div class=row><h3>Create a Customer</h3></div>';
		
		echo '<form action=create.php class=form-horizontal method=post>';
		
		echo '<div class=control-group';
		echo !empty($nameError)?'error':'';
		echo '"><label class="control-label">Name</label><div class="controls">	<input name="name" type="text"  placeholder="Name" value="';
		echo !empty($name)?$name:'';
		echo '">';
		if (!empty($nameError)) {
			echo '<span class="help-inline">'. $nameError;
		}
		echo '</div></div>';
		
		echo '</form>'; 
		echo '</body>';
		echo '</html>';
		
	}
	
	
	public static function create_insert($pdo,$name,$email,$mobile)
	{
		// validate user-entered data
		
		// insert new record into customers table
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$email,$mobile));
		Database::disconnect();
		header("Location: index.php");
	}
	
}
?>