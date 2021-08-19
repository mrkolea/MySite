
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
            </form>
        </div>
    </div>
</body>
</html>