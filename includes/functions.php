<?php 
function checklogin(){
    if(isset($_SESSION['user']))
    return true;

    return false;
}
?>