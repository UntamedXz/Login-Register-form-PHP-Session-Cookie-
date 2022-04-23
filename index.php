<?php 
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location: login.php");
}

require_once 'connection.php';
$query = mysqli_query($conn, "SELECT * FROM tblaccount WHERE Email = '". $_SESSION['userEmail'] ."'");
$row = mysqli_fetch_array($query);
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
    <title>Home</title>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <div class="row text-center">
            <h1>WELCOME <?php echo $row['Username'];?>!</h1>
        </div>
    </div>
</body>

</html>