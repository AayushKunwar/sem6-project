<!DOCTYPE html>
<html lang="en" class="holiday-css-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Death Certificate</title>
</head>

<body>
    <h2>Edit the death certificate</h2>
    <?php
if ($_SERVER["REQUEST_METHOD"]=="GET" ) { 
    if (isset($_GET['did'])) {
        $did=$_GET['did'];
    } else { 
        echo "cannot find the did";
    } 
    include_once "dao.php"; 
    $sql = "select * from DeathCertificate where CertificateID = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $did]);
    $row_count = $statement->rowCount();
    $result = $statement->fetchAll()[0];
    // for ($i = 0; $i < 4; $i++) {
        //     echo "<td>" . $result[$i] . "</td>";
        // }
        // print_r($result);
    } 
    ?>
    <form action="editddb.php" method="post">
        <span>Citizen id : <?php echo $result['CitizenID']; ?></span>
        <br>
        <br>
        <span>Certificate id : <?php echo $result['CertificateID']; ?></span>
        <br>
        <br>
        <label for="deathplace">Death Place:</label>
        <input type="text" name="deathplace" value="<?php echo $result['DeathPlace']; ?>" required></input><br><br>

        <label for="issueDate">Issue Date:</label>
        <input type="date" id="issueDate" name="issueDate" value="<?php echo $result['IssueDate'];?>" required><br><br>
        <label for="issueDate">Cause of Death:</label>
        <input type="text" name="CauseOfDeath" value="<?php echo $result['CauseOfDeath'];?>" required><br><br>
        <input type="hidden" name="citizenID" value="<?php echo $result['CitizenID']; ?>">
        <input type="hidden" name="certificateID" value="<?php echo $result['CertificateID']; ?>">

        <input type="submit" value="Edit Death Certificate">
    </form>

</body>

</html>