<?php 
session_start();
require_once 'connection.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: index.php");
}
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
    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 mx-auto mt-5">
                <div class="card mt-5" style="padding: 20px; border-radius: 10px;">
                    <form action="includes/process.php" method="POST">
                        <h1 style="text-align: center; font-weight: 700; font-size: 32px;">SIGN IN</h1>
                        <?php 
                        
                        if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'fill all fields') {
                            echo '<div class="alert alert-danger" id="required-alert" role="alert">
                                All fields are required.
                            </div>';
                                unset($_SESSION['alert']);
                        }
                        if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'no email exist') {
                            echo '<div class="alert alert-danger" id="required-alert" role="alert">
                            Sorry, we could not find your account.
                            </div>';
                                unset($_SESSION['alert']);
                        }
                        if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'wrong password') {
                            echo '<div class="alert alert-danger" id="required-alert" role="alert">
                            Wrong password!
                            </div>';
                                unset($_SESSION['alert']);
                        }
                    ?>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address"
                                value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email']; unset($_SESSION['email']);} if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="rem" <?php if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) {echo "checked";} ?>>
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary" style="width: 100%;">Sign in</button>
                        <p
                            style="color: gray; font-size: 13px; padding-top: 5px; margin-bottom: 0; text-transform: capitalize;">
                            don't have an account? <a href="register.php" style="color: teal;">create one</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>