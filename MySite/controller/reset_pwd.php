<?php
include "dbconnection.php";
include "functions.php";
session_start(); 
//validate reset inputs         
if (isset($_POST['email']) && isset($_POST['short_code']) && isset($_POST['new_password'])){
    $email = $_POST['email']; 
    $reset_code = $_POST['short_code']; 
    $new_password = $_POST['new_password'];
    //validate query if short code and mail is true
    $sql_select = "SELECT short_code_reset FROM users WHERE email='$email' AND email_validation='1'"; 
    $result = mysqli_query($con, $sql_select);
    if ($result && mysqli_num_rows($result) > 0 )
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['short_code_reset'] === $reset_code)
                    {   //change password
                        $sql = "UPDATE users SET password='$new_password' WHERE email='$email' ";
                        mysqli_query($con, $sql);
                        header("Location: ../view/login.php");
                        die;
                    }
                }
}
?>