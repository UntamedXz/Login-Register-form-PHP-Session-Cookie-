<?php

session_start();
require_once 'connection.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 mx-auto mt-5">
                <div class="card mt-5" style="padding: 20px; border-radius: 10px;">
                    <form action="includes/process.php" method="POST">
                        <h1 style="text-align: center; font-weight: 700; font-size: 32px;">SIGN UP</h1>
                        <?php 
                        
                        if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'fill all fields') {
                            echo '<div class="alert alert-danger" id="required-alert" role="alert">
                                All fields are required.
                            </div>';
                                unset($_SESSION['alert']);
                        }
                        if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'email already exist') {
                            echo '<div class="alert alert-danger" id="required-alert" role="alert">
                                Email already used!
                            </div>';
                                unset($_SESSION['alert']);
                        }
                        if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'account successfully created') {
                            echo '<div class="alert alert-success" id="required-alert" role="alert">
                                Account successfully created!
                            </div>';
                                unset($_SESSION['alert']);
                        }
                        
                        ?>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary" style="width: 100%;">Sign
                            up</button>
                        <p
                            style="color: gray; font-size: 13px; padding-top: 5px; margin-bottom: 0; text-transform: capitalize;">
                            have an account? <a href="login.php" style="color: teal;">Login now</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>