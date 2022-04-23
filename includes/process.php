<?php

require_once '../connection.php';
session_start();

// REGISTER
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['alert'] = "fill all fields";
        header("Location: ../register.php");
    } else {
        $check = mysqli_query($conn, "SELECT * FROM tblaccount WHERE Email = '$email'");

        if (mysqli_num_rows($check) > 0) {
            $_SESSION['alert'] = "email already exist";
            header("Location: ../register.php");
        } else {
            $insert = mysqli_query($conn, "INSERT INTO tblaccount (Username, Email, Pass) VALUES ('$username', '$email', '$password')");

            if ($insert) {
                $_SESSION['alert'] = "account successfully created";
                header("Location: ../register.php");
            }
        }
    }
}

// LOGIN
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['alert'] = "fill all fields";
        header("Location: ../login.php");
    } else {
        $check = mysqli_query($conn, "SELECT * FROM tblaccount WHERE Email = '$email'");

        if (mysqli_num_rows($check) == 0) {
            $_SESSION['alert'] = "no email exist";
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['userEmail'] = '';
            header("Location: ../login.php");
        } else {
            $row = mysqli_fetch_array($check);

            if($password == $row['Pass']) {
                if (isset($_POST['rem']) == 'checked') {
                    setcookie('email', $row['Email'], time() + (86400 * 30), '/');
                    setcookie('password', $row['Pass'], time() + (86400 * 30), '/');
                } else {
                    setcookie('email', '');
                    setcookie('password', '');
                }
                $_SESSION['loggedin'] = true;
                $_SESSION['userEmail'] = $email;
                header("Location: ../index.php");
            } else {
                $_SESSION['alert'] = "wrong password";
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['userEmail'] = '';
                header("Location: ../login.php");
            }
        }
    }
}
