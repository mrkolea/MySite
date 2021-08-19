<?php
include "controller/dbconnection.php";
include "controller/functions.php";
session_start();
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/style.css">
    <title>MySite</title>
</head>
<body>
<nav class="navbar navbar-light bg-white border-bottom justify-content-between">
  <a class="nav-logo-custom" href="../index.php"><h3 class="navbar-brand ">MySite</h3></a>
  <form class="form-inline" action="../controller/logout.php">
    <label for=""><?php echo $user_data['first_name'] . " " . $user_data['last_name'];?></label>
    <button class="btn btn-outline-primary my-2 my-sm-0 login-btn-custom" type="submit">Log Out</button>
  </form>
</nav>
<div class="container align-items-center w-25">
    <h1 class="text-center">Congratulations</h1><br><h2 class="text-center"><?php echo "\o/." . $user_data['first_name'] . " " . $user_data['last_name'] . ".\o/";?></h2><br><h3 class="text-center">you have logged in.</h3>
    <img class="rounded mx-auto d-block" src="https://media2.giphy.com/media/g9582DNuQppxC/200.gif" alt="" srcset="">
</div>
</body>
</html>