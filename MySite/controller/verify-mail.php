<?php
include ("dbconnection.php");
include ("functions.php");
$email = $_GET['email']; 
$hash = $_GET['hash']; 
              
if(!empty($_GET['email']) || !empty($_GET['hash'])) {
    $sql_select = "SELECT email, hash, email_validation FROM users WHERE email='$email' AND hash='$hash' AND email_validation='0'"; 
    $result = mysqli_query($con, $sql_select);
    if (mysqli_num_rows($result) > 0) {
        $sql_update = "UPDATE users SET email_validation='1' WHERE email='$email' AND hash='$hash' AND email_validation='0'";
        $result = mysqli_query($con, $sql_update);
        header("Location: ../view/login.php");
        die;
    } else {
        echo "link is unavaible";
    }
}




