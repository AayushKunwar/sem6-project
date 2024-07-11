<?php
// Include database connection
include 'dao.php';
if (!isset($_SESSION['login_type'])) {
    header("location: adminlogin.php");
}
if ($_SESSION["login_type"] != "admin") {
    header("location: adminlogin.php");
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $certificateID = $_POST['certificateID'];
    $citizenID = $_POST['citizenID'];
    $deathDate = $_POST['deathDate'];
    $deathPlace = $_POST['deathPlace'];
    $issueDate = $_POST['issueDate'];
    $causeOfDeath = $_POST['causeOfDeath'];

    // SQL statement to insert data into DeathCertificate table
    $sql = "INSERT INTO DeathCertificate (CertificateID, CitizenID, DeathDate, DeathPlace, IssueDate, CauseOfDeath) 
            VALUES (:certificateID, :citizenID, :deathDate, :deathPlace, :issueDate, :causeOfDeath)";

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute query
        $stmt->execute([
            ':certificateID' => $certificateID,
            ':citizenID' => $citizenID,
            ':deathDate' => $deathDate,
            ':deathPlace' => $deathPlace,
            ':issueDate' => $issueDate,
            ':causeOfDeath' => $causeOfDeath
        ]);

        echo "Death certificate added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html class="holiday-css-light">

<head>
    <title>Add Death Certificate</title>
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h2>Add Death Certificate</h2>
    <nav>
        <ul>
            <li>
                <a href="admindashboard.php">Admin Dashboard</a>
            </li>
        </ul>
    </nav>
    <form action="created.php" method="post">
        <label for="certificateID">Certificate ID:</label>
        <input type="number" id="certificateID" name="certificateID" required>

        <label for="citizenID">Citizen ID:</label>
        <input type="number" id="citizenID" name="citizenID" required>
        <label for="deathDate">Date of Death:</label>
        <input type="date" id="deathDate" name="deathDate" required>

        <label for="deathPlace">Place of Death:</label>
        <input type="text" id="deathPlace" name="deathPlace" required>

        <label for="issueDate">Issue Date:</label>
        <input type="date" id="issueDate" name="issueDate" required>

        <label for="causeOfDeath">Cause of Death:</label><br>
        <textarea id="causeOfDeath" name="causeOfDeath" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Add Death Certificate">
    </form>
</body>

</html>