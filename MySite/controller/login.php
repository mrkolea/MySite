<?php
error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');
    session_start();
    $error = null;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "SELECT * FROM users WHERE email='$email' AND email_validation='1' LIMIT 1";
            $result = mysqli_query($con, $query);
            if ($result)
            {
                if ($result && mysqli_num_rows($result) > 0 )
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if (password_verify($password, $user_data['password']))
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: ../index.php");
                        die;
                    }else{
                        $error['pwdErr'] = "Wrong password.";
                    } 
                }else{
                    $error['emailErr'] = "This e-mail is not registred in our base.";
                } 
                
            }
        }else{
            $error['data_error'] = "Input some values...";
            
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
    <form class="form-inline" method="post" action="../view.login.php">
        <button class="btn btn-outline-primary my-2 my-sm-0 login-btn-custom" type="submit">Log In</button>
    </form>
    </nav>
    <div class="container align-items-center w-25 ">
        <div class="">
            <h3 class="d-flex justify-content-center login-name">Log In</h3>
                <form action="" method="post">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="E-mail" aria-label="email" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
                    </div>
                    <div class="col text-center">
                    <button class="btn btn-outline-primary" type="submit" name="go-in" value="go In">Go In</button>
                <h6 class="d-flex justify-content-center login-link"><a href="../view/register.php">Register</a></h6>
                <h6 class="d-flex justify-content-center login-link"><a href="../view/restore_pasword.php">Forgot password...</a></h6>
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























