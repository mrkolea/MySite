<?php
session_start();
include ("dbconnection.php");
include ("functions.php");
$error = null;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_id = random_id(10);
$hash = md5( rand(0,1000) );
if (isset($fname) && isset($lname) && isset($email) && isset($password)) {

    if (empty($fname) || is_numeric($fname)) {
        $error['fnameErr'] = "Insert first name only leters";
    }
    if (empty($lname) ||  is_numeric($lname)) {
        $error['lnameErr'] = "Insert last name only leters";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['emailiErr'] = "E-mail address '$email' is invalid.";
    }
    if (empty($email)) {
        $error['emailErr'] = "Insert E-mail";
    }
    if (empty($password)) {
        $error['passwordErr'] = "Insert password";
    }
    if (preg_match('/[^A-Za-z0-9А-Яа-яЁё]/u', $fname)) {
        $error['fnameErr'] = "first-name Use only leters or numbers";
    }
    if (preg_match('/[^A-Za-z0-9А-Яа-яЁё]/u', $lname)) {
        $error['lnameErr'] = "last-name Use only leters or numbers";
    }
    if (strlen($password) < 8) {
        $error['passwordErr'] = "Use minimum 8 characters for password";
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $error['emailErr'] = 'This E-mail is registred.';
            
        }
        if (mysqli_num_rows($result) == 0) {   
            $pwdhash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user_id, first_name, last_name, email, password, hash) VALUES ('$user_id', '$fname', '$lname', '$email', '$pwdhash', '$hash')";
            mysqli_query($con, $sql);

            //Mail template//

            $to      = $email; 
            $subject = 'Activate MySite account'; 
            $message = '
            Welcome to MySite by Murza Nicolae
            
            ------------------------
            Username: '.$email.'
            
            ------------------------
            
            Please click to this link and activate your account:
            http://93.113.64.122:33331/controller/verify-mail.php?email='.$email.'&hash='.$hash.'
            
            '; 
            $headers = 'FROM: MySite - Murza  <testmurzanicolae@gmail.com>';                    
            mail($to, $subject, $message, $headers); 
            header("Location: ../view/check_email_message.php");
            die;
        }
    }    
}
?>

<!---->
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
            <h3 class="d-flex justify-content-center login-name">Registration</h3>
            <form action="../controller/register.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $fname;?>" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?php echo $email;?>" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col text-center">
                    <button class="btn btn-outline-primary" type="submit" name="sign-in" value="Sign In">Sign In</button>
                </div>
                <h6 class="d-flex justify-content-center login-link"><a href="../view/login.php">Log In</a></h6>
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
