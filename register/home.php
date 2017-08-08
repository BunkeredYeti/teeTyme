<?php
//All this does is show who is logged in and allows user to logout.
session_start();
 
//connect to database
//$db=mysqli_connect("localhost","root","","authentication");
 require 'database.php';
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="header">
    <h1>Welcome</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<h1>Home</h1>
<div>
    <h4>Welcome <?php echo $_SESSION['username']; ?></h4></div>
</div>
<a href="../TeeTyme/index.html">Connect With Friends</a></br>
<a href="../TeeTymeCourses/index.html">View Courses</a></br>
<a href="../TeeTymeRounds/index.html">Start new round</a></br>
<a href="../fileUpload.php">Upload your picture</a></br>
<a href="../teeTymeDiagram.html">View Diagrams</a></br>
<a href="logout.php">Log Out</a>
</body>
</html>