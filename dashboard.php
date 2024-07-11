<!DOCTYPE html>
<html lang="en" class="holiday-css-light">

<head>
    <?php
    include_once "validLogin.php";
    include_once "dao.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>
    <span><?php
    echo "citizen id: " . $_SESSION['citizenid']
        ?></span>
    <nav>
        <ul>
            <li>

                <button onclick="location.href='logout.php'">Logout</button>
            </li>
            <li>
                <button onclick="location.href='createmcitizen.php'">create migration</button>

            </li>
        </ul>
    </nav>
    <h3>Birth certificate</h3>
    <table>
        <tr>
            <th>Certificate ID</th>
            <th>CitizenID</th>
            <th>BirthPlace</th>
            <th>Issue Date</th>
        </tr>
        <tr>
            <?php
            $sql = "select * from BirthCertificate where citizenid = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id' => $_SESSION['citizenid']]);
            $row_count = $statement->rowCount();
            if ($row_count != 0){
            $result = $statement->fetchAll()[0];
            for ($i = 0; $i < 4; $i++) {
                echo "<td>" . $result[$i] . "</td>";
            }
            }
            ?>
        </tr>
    </table>
    <hr>
    <h3>Migration certificate</h3>
    <table>
        <tr>
            <th>MigrationID</th>
            <th>CitizenID</th>
            <th>Migration Date</th>
            <th>Status</th>
        </tr>
        <?php
        $sql = "select * from MigrationStatus where citizenid = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $_SESSION['citizenid']]);
        $row_count = $statement->rowCount();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            echo "<tr>";
            for ($i = 0; $i < 4; $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>