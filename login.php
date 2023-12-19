<?php 
session_start();
require('includes/users.class.php');
require('includes/functions.php');

if(checklogin())
   exit('You Are Already Logged In To Go To profile , Please <a href="profile.php"> Click Here</a> ');

if(isset($_POST['submit'])){

    $userobject = new users();
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($userobject->login($username ,$password)){
        //get data 
        $user =$userobject->getuserdata();
        //session
        $_SESSION['user'] =$user;
        //go to profile link 
        echo "to go to profile please , <a href='profile.php'>Click here</a>";     
        exit; 
    }
    else{
        echo "please write valid data";
    }
    
}
    
?>
<form action="login.php" method="POST">
    username <input type="text" name="username"> <br>
    password <input type="password" name="password"> <br>
     <input type="submit" name="submit" value="login"> <br>

</form>


