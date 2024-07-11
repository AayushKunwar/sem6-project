<!DOCTYPE html>
<html lang="en" class="holiday-css-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin login</title>
</head>

<body>
    <h1>Admin login</h1>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
        </ul>
    </nav>
    <form action="verifyadmin.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username">
        <label for="password">Password</label>
        <input type="password" name="password"><br>
        <input type="submit" value="login">
    </form>
</body>

</html>