 <?php 
 class users 
 {
    private $connection;
    private $userdata; //rows of users 

    public function __construct(){
        $this->connection = new mysqli('localhost' ,'root' ,'' ,'usersapp');
    }

    public function login($username ,$password){
        $result = $this->connection->query("SELECT * FROM `users` WHERE `username`='$username' AND `password` = '$password' ");
        if($result->num_rows>0)
        {
            $this->userdata = $result->fetch_assoc();
            return true;
        }
        return false;
    }


        //get user data 
    public function getuserdata()
        {
        return $this->userdata;
        }


    public function register($username ,$password ,$email ,$image=''){
        $this->connection->query("INSERT INTO `users`(`username`, `password`, `email`, `image`) VALUES ('$username' ,'$password' ,'$email', '$image')"); 
        if($this->connection->affected_rows>0)
        return true;

        return false;
    
    }

    public function logout(){

    }

    public function profile(){

    }

    public function edit ($id ,$username ,$password ,$email ,$image='')
    {
        $id = (int)$id;
        $sql = "UPDATE `users` SET `username` ='$username' , `email` ='$email'";

        if(strlen($password > 0 ))
        $sql .= ", `password`='$password'";

        if (strlen($image > 0 ))
        $sql .=", `image`='$image' ";

        $sql .= "where `id` =$id";





        $this->connection->query("$sql"); 
        if($this->connection->affected_rows>0)
       
        return true;

        return false;
    }
    
    public function getuser($id)
    {
        $id =(int)$id;
        $result = $this->connection->query("SELECT * FROM `users` WHERE `id` = '$id' ");
        if($result->num_rows>0)
        {
            $this->userdata = $result->fetch_assoc();
            return $this->userdata;
        }
        return null;
    }
}
 ?>