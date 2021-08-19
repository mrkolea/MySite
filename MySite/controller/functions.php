<?php
include ("dbconnection.php");
//check if user is loged in
//if yes then retun data
function check_login($con)

{   
    if (isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = '$id' ";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0 )
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }else
    {
        header("Location: ../view/login.php");
        die;
    }
    //if not redirect him on login page
    
}

//create a random user id
function random_id($lenght)
{
    $text = "";
    if ($lenght < 5)
    {
        $lenght = 5;
    }
    $len = rand(4, $lenght);
    for ($i=0; $i < $len; $i++) { 
        $text .= rand(0,9);
    }
    return $text;
}