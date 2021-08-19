<?php
include "dbconnection.php";
include "functions.php";
session_start();          
if (!empty($_POST['email']) && !empty($_POST['short_code']) && !empty($_POST['new_password'])) {
    $email = $_POST['email']; 
    $reset_code = $_POST['short_code']; 
    $new_password = $_POST['new_password'];
    $new_hash_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql_select = "SELECT short_code_reset FROM users WHERE email='$email' AND email_validation='1'"; 
    $result = mysqli_query($con, $sql_select);
    if ($result && mysqli_num_rows($result) > 0 ) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['short_code_reset'] === $reset_code) {
            $sql = "UPDATE users SET password='$new_hash_password' WHERE email='$email' ";
            mysqli_query($con, $sql);
            //reset short code when password is changed
            $new_short_code = random_id(6);
            $sql_reset = "UPDATE users SET short_code_reset='".$new_short_code."' WHERE email='".$email."' ";
            mysqli_query($con, $sql_reset);
            header("Location: ../view/login.php");
            die;
        }
    }
}
?>