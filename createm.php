<?php
// Include database connection
include 'dao.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $citizenID = $_POST['citizenID'];
    $migrationDate = $_POST['migrationDate'];
    $status = $_POST['status'];

    // SQL statement to insert data into MigrationStatus table
    $sql = "INSERT INTO MigrationStatus (CitizenID, MigrationDate, Status) 
            VALUES (:citizenID, :migrationDate, :status)";

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute query
        $stmt->execute([
            ':citizenID'     => $citizenID,
            ':migrationDate' => $migrationDate,
            ':status'        => $status
        ]);

        echo "Migration status added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html class="holiday-css-light">

<head>
    <h2>Add Migration Status</h2>
    <nav>
        <ul>
            <li>
                <a href="admindashboard.php">Admin Dashboard</a>
            </li>
        </ul>
    </nav>
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h2>Add Migration Status</h2>
    <form action="createm.php" method="post">
        <label for="citizenID">Citizen ID:</label>
        <input type="number" id="citizenID" name="citizenID" required>

        <label for="migrationDate">Migration Date:</label>
        <input type="date" id="migrationDate" name="migrationDate" required>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br>

        <input type="submit" value="Add Migration Status">
    </form>
</body>

</html>