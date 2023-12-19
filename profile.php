<?php 
session_start();
require('includes/functions.php');

if(!checklogin())
   exit('you must login to view this page , please  <a href="login.php">Click Here</a> to login ');

$user =$_SESSION['user'];

echo "<img width='400' height='500' src='uploads/".$user['image']."'/>" . "<br>";

echo 'name :'  .$user['username']. "<br>" ;
echo 'email :' .$user['email']. "<br>";

echo '<a href="logout.php">Logout</a>  <br>  <a href="edit.php">Edit</a> ' ;

?>