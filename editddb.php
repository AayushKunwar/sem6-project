<?php 
include_once "dao.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $certificateID = $_POST['certificateID'];
    $citizenID = $_POST['citizenID'];
    $birthPlace = $_POST['deathplace'];
    $issueDate = $_POST['issueDate'];
    $causeOfDeath = $_POST['CauseOfDeath'];

    $sql = "UPDATE DeathCertificate SET CitizenID = :citizenID, DeathPlace = :deathPlace, IssueDate = :issueDate, CauseOfDeath = :CauseOfDeath WHERE CertificateID = :certificateID";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':citizenID', $citizenID, PDO::PARAM_INT);
    $stmt->bindParam(':deathPlace', $birthPlace, PDO::PARAM_STR);
    $stmt->bindParam(':issueDate', $issueDate, PDO::PARAM_STR);
    $stmt->bindParam(':CauseOfDeath', $causeOfDeath, PDO::PARAM_STR);
    $stmt->bindParam(':certificateID', $certificateID, PDO::PARAM_INT);

    $stmt->execute();
    echo "Record updated successfully";
}
?>