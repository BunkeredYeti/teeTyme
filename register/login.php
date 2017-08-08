<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","artaylo2","381714","artaylo2");
//require 'database.php';
//$db = Database::connectMysqli();

 
if(isset($_POST['login_btn']))
{
	
	
    //$username=mysqli_real_escape_string($db, $_POST['username']); by adding $db to the parameters these two lines should work the same as the next two lines
    //$password=mysqli_real_escape_string($db, $_POST['password']);
	$username=$_POST['username'];
    $password=$_POST['password'];
    $password=$password;
    $sql="SELECT * FROM tt_persons WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:home.php");
    }
   else
   {
                $_SESSION['message']="Username and Password combiation incorrect";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login/Register</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="header">
    <h1>Login/Register</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="login.php">
  <table>
     <tr>
           <td>Username : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" class="Log In"><a href="register.php">Register</a></td>
     </tr>
  
</table>
</form>
</body>
</html>
 
 
<!--
In 2 minutes 8 second you don a mistake then last time only you found
In 2 minutes 49 second you done a mistake then last time only you found
Please Change this Your Video Length is Decrease
Your Suscribers will increase
I Like and Thanks for  Who are all Helping to Create this Video
 
About Me: www.visualcv.com/karthickraja
-->