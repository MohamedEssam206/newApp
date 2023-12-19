<?php 
session_start();
require('includes/users.class.php');
require('includes/functions.php');

if(checklogin())
   exit('You Are Already Logged In To Go To profile , Please <a href="profile.php">Click Here</a> ');


if(isset($_POST['submit'])){

    $usersobject = new users();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email    = $_POST["email"];
    
    //image
    $name= $_FILES['image']['name'];
    $type= $_FILES['image']['type'];
    $error= $_FILES['image']['error'];
    $tmp = $_FILES['image']['tmp_name'];
    $size =$_FILES['image']['size'];
    
    $newname= md5(date('U')).$name;
    $image = '';
    if( $type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg'){ 
        
        if(move_uploaded_file($tmp,'uploads/'.$newname))
            $image = $newname;
    }
   
    if($usersobject->register($username,$password,$email,$image)){
        
        //go to profile link 
        echo "Thanx for registrastion , to go to login please , <a href='login.php'>Click here</a>";     
        exit;
    }
    else{
        echo "please write valid data";
    }
}
?>
<form action="register.php" method="POST" enctype="multipart/form-data">
    username <input type="text" name="username"> <br>
    password <input type="password" name="password"> <br>
    email <input type="text" name="email"> <br>
    image <input type="file" name="image"> <br>
     <input type="submit" name="submit" value="register"> <br>
     

</form>
