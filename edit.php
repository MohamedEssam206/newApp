<?php 
session_start();
require('includes/users.class.php');
require('includes/functions.php');

if(!checklogin())
   exit('you must login to view this page , please  <a href="login.php">Click Here</a> to login ');


$user =$_SESSION['user'];
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
    if($error == 0 && ($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg')){ 
        
        if(move_uploaded_file($tmp,'uploads/'.$newname))
            $image = $newname;
    }
    
    if($usersobject->edit($user['id'],$username,$password,$email,$image)){
        
        //go to profile link 
        echo "Data updated Successfuly , to go to profile please , <a href='profile.php' > Click here </a>";    
        $_SESSION['user'] = $usersobject->getuser($user['id']); 

        
        exit;
    }
    else{
        echo "please write valid data";
    }
}
?>
<form action="edit.php" method="POST" enctype="multipart/form-data">
    username <input type="text" name="username" value="<?php echo $user['username']; ?>" > <br>
    password <input type="password" name="password"  > <br>
    email <input type="text" name="email" value="<?php echo $user['email']; ?>" > <br>
    image <input type="file" name="image" v > <br>
     <input type="submit" name="submit" value="register"> <br>
     

</form>
