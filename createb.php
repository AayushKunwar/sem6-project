<?php
include_once "dao.php";
if (!isset($_SESSION['login_type'])) {
    header("location: adminlogin.php");
}
if ($_SESSION["login_type"] != "admin") {
    header("location: adminlogin.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $certificateID = $_POST['certificateID'];
    $citizenID = $_POST['citizenID'];
    $birthPlace = $_POST['birthPlace'];
    $issueDate = $_POST['issueDate'];

    // SQL statement to insert data into BirthCertificate table
    $sql = "INSERT INTO BirthCertificate (CertificateID, CitizenID, BirthPlace, IssueDate) 
            VALUES (:certificateID, :citizenID, :birthPlace, :issueDate)";

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute query
        $stmt->execute([
            ':certificateID' => $certificateID,
            ':citizenID' => $citizenID,
            ':birthPlace' => $birthPlace,
            ':issueDate' => $issueDate
        ]);

        echo "Birth certificate added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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
    <title>Create birth certificate</title>
</head>

<body>
    <h2>Create Birth Certificate</h2>
    <form action="createb.php" method="post">
        <label for="certificateID">Certificate ID:</label>
        <input type="number" id="certificateID" name="certificateID" required>

        <label for="citizenID">Citizen ID:</label>
        <input type="number" id="citizenID" name="citizenID" required>

        <label for="birthPlace">Birth Place:</label>
        <input type="text" id="birthPlace" name="birthPlace" required>

        <label for="issueDate">Issue Date:</label>
        <input type="date" id="issueDate" name="issueDate" required>
        <br>

        <input type="submit" value="Add Birth Certificate">
    </form>

</body>

</html>