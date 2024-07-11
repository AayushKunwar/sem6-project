<html lang="en" class="holiday-css-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/holiday.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Dev</title>
</head>

<body>
    <?php

    echo "this is for development only, be careful<br>";
    include_once "dao.php";

    if (!$_SESSION['conn']) {
        echo "connection failed";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $command = $_POST["COMMAND"];
        if ($command == "create_citizen_table") {
            $sql = "CREATE TABLE Citizen (
                CitizenID INT PRIMARY KEY AUTO_INCREMENT,
                FirstName VARCHAR(50),
                LastName VARCHAR(50),
                DateOfBirth DATE,
                Gender CHAR(1),
                Address VARCHAR(100),
                City VARCHAR(50),
                State VARCHAR(50),
                PhoneNumber VARCHAR(15),
                Email VARCHAR(50)
            );";
        }
        if ($command == "create_migration_table") {
            $sql = "CREATE TABLE  MigrationStatus (
            MigrationID INT PRIMARY KEY AUTO_INCREMENT,
            CitizenID INT,
            MigrationDate DATE NOT NULL,
            Status VARCHAR(100) NOT NULL,
            FOREIGN KEY (CitizenID) REFERENCES Citizen(CitizenID)
);";
        }
        if ($command == "create_birth_table") {
            $sql = "CREATE TABLE BirthCertificate (
                CertificateID INT PRIMARY KEY,
                CitizenID INT,
                BirthPlace VARCHAR(100),
                IssueDate DATE,
                FOREIGN KEY (CitizenID) REFERENCES Citizen(CitizenID)
            );";
        }
        if ($command == "create_death_table") {
            $sql = "CREATE TABLE DeathCertificate (
            CertificateID INT PRIMARY KEY,
            CitizenID INT,
            DeathDate DATE,
            DeathPlace VARCHAR(100),
            IssueDate DATE,
            CauseOfDeath VARCHAR(255),
            FOREIGN KEY (CitizenID) REFERENCES Citizen(CitizenID)
            );";
        }
        if ($command == "drop_everything") {
            $sql = "DROP TABLE IF EXISTS deathcertificate, birthcertificate, migrationstatus, citizen";
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        echo "operation completed";

        foreach ($data as $row) {
            echo $row . '<br>';
        }
    }
    ?>
    <br><br>
    <form action="dev.php" method="post">
        <input type="submit" name="COMMAND" value="create_citizen_table">
        <br><br><br>
        <input type="submit" name="COMMAND" value="create_migration_table">
        <br><br><br>
        <input type="submit" name="COMMAND" value="create_birth_table">
        <br><br><br>
        <input type="submit" name="COMMAND" value="create_death_table">
        <br><br><br>
        <input type="submit" name="COMMAND" value="drop_everything"><br><span>careful with this!!</span>
    </form>
</body>

</html>