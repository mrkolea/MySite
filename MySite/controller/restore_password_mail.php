<?php
include "dbconnection.php";
include "functions.php";
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (!empty($email) && !is_numeric($email)) {
        $query = "SELECT * FROM users WHERE email='".$email."' AND email_validation='1' LIMIT 1";
        $result = mysqli_query($con, $query);
        $query_active = "SELECT * FROM users WHERE email='".$email."' AND email_validation='0' LIMIT 1";
        $result_active = mysqli_query($con, $query_active);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0 ) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['email'] === $email) {   
                    $short_code = random_id(6);
                    $sql = "UPDATE users SET short_code_reset='".$short_code."' WHERE email='".$email."' ";
                    mysqli_query($con, $sql);
            
                    //Mail template for send verification email
                    $to      = $email; 
                    $subject = 'Reset Password MySite account'; 
                    $message = '
                    Welcome to MySite by Murza Nicolae
                    
                    ------------------------
                    Username: '.$email.'
                    Reset Code: ' . $short_code . '
                    ------------------------
                    
                    Copy Reset Code and click on this link to reset your password:
                    http://93.113.64.122:33331/view/reset_password.php?
                    
                    '; 
                                        
                    $headers = 'FROM: MySite - Murza  <testmurzanicolae@gmail.com>'; 
                    mail($to, $subject, $message, $headers); 
                    header("Location: ../view/reset_password.php");
                    die;
                }
            }
            if ($result_active && mysqli_num_rows($result_active) > 0 ) {
                $error['emailErr1'] = "Account need to be activated,";
                $error['emailErr2'] = "Access ".$email." and folow link";
            } else {
                $error['emailErr'] = "E-mail doe's not registred";
            }  
        }  
    } else {
        $error['emailErr'] = "Enter E-mail please";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../view/css/style.css">
    <title>MySite</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-light bg-white border-bottom justify-content-between">
        <a class="nav-logo-custom" href="../index.php"><h3 class="navbar-brand ">MySite</h3></a>
        <form class="form-inline" action="../view/login.php">
            <button class="btn btn-outline-primary my-2 my-sm-0 login-btn-custom" type="submit">Log In</button>
        </form>
    </nav>
    <div class="container align-items-center w-25 ">
        <div class="">
            <form action="../controller/restore_password_mail.php" method="POST">
                <h3 class="d-flex justify-content-center login-name">Forgot password</h3>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="E-mail" aria-label="E-mail" aria-describedby="basic-addon1">
                </div>
                <div class="col text-center">
                    <button class="btn btn-outline-primary" type="submit" name="reset_pwd" value="reset_pwd">Send Instruction</button>
                </div>
                <h6 class="d-flex justify-content-center login-link"><a href="../view/register.php">Register</a></h6>
            </form>
            <?php if ($error !== null): ?>
            <div class="alert alert-warning alert-warning-custom">
            <strong>Warning!</strong><br>
            <div class="alert alert-danger">
                <?php foreach ($error as $value): ?>
                <li>
                <?php echo $value; ?>
                </li>
                <?php endforeach;?>
            </div>
            <?php endif;?>
            </div>
        </div>
    </div>
</body>
</html>