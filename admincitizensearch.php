<?php
include_once "dao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['searchid'])) {
        $id = $_POST['searchid'];
    } else {
        header("location: admindashboard.php");
    }
}
$bid;
?>
<!DOCTYPE html>
<html lang="en" class="holiday-css-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Search citizen</title>
</head>

<body>
    <h1>Citizen Search</h1>
    <nav>
        <ul>
            <li>
                <a href="admindashboard.php">Admin Dashboard</a>
            </li>
        </ul>
    </nav>
    <h2>citizen id <?php 
    echo $id;
        $sql = "select * from Citizen where citizenid = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id' => $id]);
            $row_count = $statement->rowCount();
            if($row_count == 0){
                echo "<p>Citizen ID not found</p>";
                exit();
            }
    ?></h2>

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
            $statement->execute(['id' => $id]);
            $row_count = $statement->rowCount();
            if($row_count >0){
            $result = $statement->fetchAll()[0];
            for ($i = 0; $i < 4; $i++) {
                echo "<td>" . $result[$i] . "</td>";
            }
            $bid = $result[0];
            }
            $bid = 0;
            ?>
        </tr>
    </table>
    <a href="#" onclick="editBfunc()">Edit birth certificate</a>
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
        $statement->execute(['id' => $id]);
        $row_count = $statement->rowCount();
        if ($row_count > 0){
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            echo "<tr>";
            for ($i = 0; $i < 4; $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }
        }
        ?>
    </table>
    <hr>
    <h3>Death certificate</h3>
    <table>
        <tr>
            <th>Certificate ID</th>
            <th>CitizenID</th>
            <th>Death Date</th>
            <th>Death Place</th>
        </tr>
        <tr>
            <?php
            $sql = "select * from DeathCertificate where citizenid = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute(['id' => $id]);
            $row_count = $statement->rowCount();
            if($row_count >0) {
                $result = $statement->fetchAll()[0];
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>" . $result[$i] . "</td>";
                }
                $did = $result[0];
            }
            ?>
        </tr>
    </table>
    <a href="#" onclick="editDfunc()">Edit death certificate</a>
    <script>
    function editBfunc() {
        let bid = "<?php echo $bid; ?>";
        window.location.assign("editb.php?bid=" + bid);
    }

    function editDfunc() {
        let did = "<?php echo $did; ?>";
        window.location.assign("editd.php?did=" + did);
    }
    </script>
    <footer>

    </footer>
</body>

</html>