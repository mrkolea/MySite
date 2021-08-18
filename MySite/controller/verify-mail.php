<?php
include ("dbconnection.php");
include ("functions.php");
// $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$email = $_GET['email']; 
$hash = $_GET['hash']; 
              
if(isset($_GET['email']) || isset($_GET['hash'])){
    // $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $sql_select = "SELECT email, hash, email_validation FROM users WHERE email='$email' AND hash='$hash' AND email_validation='0'"; 
    $result = mysqli_query($con, $sql_select);
    if (mysqli_num_rows($result) > 0)
    {
        $sql_update = "UPDATE users SET email_validation='1' WHERE email='$email' AND hash='$hash' AND email_validation='0'";
        $result = mysqli_query($con, $sql_update);
        header("Location: ../view/login.php");
        die;
    }else {
        echo "link is unavaible";
    }
}




