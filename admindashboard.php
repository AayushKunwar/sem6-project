<!DOCTYPE html>
<html lang="en" class="holiday-css-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['login_type'])) {
        header("location: adminlogin.php");
    }
    if ($_SESSION["login_type"] == "admin") {
    }
    ?>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li>
                <a href="logout.php">Logout</a>
            </li>
            <li>
                <a href="createb.php">Create birth certificate</a>
            </li>
            <li>
                <a href="created.php">Create death certificate</a>
            </li>
            <li>
                <a href="createm.php">Create migration certificate</a>
            </li>
        </ul>
    </nav>
    <br><br>
    <form action="admincitizensearch.php" method="post">
        <label for="searchid">citizen id</label>
        <input type="number" name="searchid"><br>
        <input type="submit" value="Search">
    </form>
</body>

</html>