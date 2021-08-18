<?php
include ("dbconnection.php");
include ("functions.php");
//get value from email link
$email = $_GET['email']; 
$hash = $_GET['hash']; 
// init check            
if(isset($_GET['email']) || isset($_GET['hash'])){
    //verify if data from link is = with db
    $sql_select = "SELECT email, hash, email_validation FROM users WHERE email='$email' AND hash='$hash' AND email_validation='0'"; 
    $result = mysqli_query($con, $sql_select);
    if (mysqli_num_rows($result) > 0)
    {   //if yes update status and activate account
        $sql_update = "UPDATE users SET email_validation='1' WHERE email='$email' AND hash='$hash' AND email_validation='0'";
        $result = mysqli_query($con, $sql_update);
        header("Location: ../view/login.php");
        die;
    }else {
        echo "link is unavaible";
    }
}




