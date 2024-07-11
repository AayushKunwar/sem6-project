<?php
include_once "dao.php";
if (isset($_SESSION['citizenid'])) {
} else {
    // goto index if not logged in
    echo '<script>alert("please login")</script>';
    // header('location: index.php');
    echo "<script>window.location.href ='index.php'</script>";
}