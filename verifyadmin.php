<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
        $_SESSION['login_type'] = "admin";
        header("location: admindashboard.php");
    } else {
        echo "login failed";
    }
}