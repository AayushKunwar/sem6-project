<?php
include_once "dao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['citizenid'])) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM Citizen WHERE citizenid = :id");
            $stmt->execute(['id' => $_POST['citizenid']]);
            $row_count = $stmt->rowCount();
            if ($row_count == 1) {
                echo "success";
            } else {
                echo " login fail";
                exit();
            }
            $citizenID = $_POST['citizenid'];
            $_SESSION['citizenid'] = $citizenID;
            header("Location: dashboard.php");
            exit();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
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
    <h1>Login page</h1>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
        </ul>
    </nav>
    <form action="login.php" method="post">
        <label for="citizenid">Citizen ID</label>
        <input type="number" name="citizenid">
        <br>
        <input type="submit" value="submit">
    </form>

</body>

</html>