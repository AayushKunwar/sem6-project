<!DOCTYPE html>
<html lang="en" class="holiday-css-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Status</title>
</head>

<body>
    <br>
    <br>
    <?php 
include_once "dao.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $certificateID = $_POST['certificateID'];
    $citizenID = $_POST['citizenID'];
    $birthPlace = $_POST['birthPlace'];
    $issueDate = $_POST['issueDate'];

    $sql = "UPDATE BirthCertificate SET CitizenID = :citizenID, BirthPlace = :birthPlace, IssueDate = :issueDate WHERE CertificateID = :certificateID";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':citizenID', $citizenID, PDO::PARAM_INT);
    $stmt->bindParam(':birthPlace', $birthPlace, PDO::PARAM_STR);
    $stmt->bindParam(':issueDate', $issueDate, PDO::PARAM_STR);
    $stmt->bindParam(':certificateID', $certificateID, PDO::PARAM_INT);

    $stmt->execute();
    echo "<h1>Record updated successfully</h1>";
}
?>
    <footer>
        <a href="admindashboard.php"><button>go to admin dashboard</button></a>
        <a href="index.php"><button>go to index page</button></a>
    </footer>
</body>

</html>