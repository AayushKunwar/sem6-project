<?php
include_once "dao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $citizenID = $_POST['citizenID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Citizen (CitizenID, FirstName, LastName, DateOfBirth, Gender, Address, City, State, PhoneNumber, Email) 
            VALUES (:id, :firstName, :lastName, :dateOfBirth, :gender, :address, :city, :state, :phoneNumber, :email)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $citizenID,
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':dateOfBirth' => $dateOfBirth,
            ':gender' => $gender,
            ':address' => $address,
            ':city' => $city,
            ':state' => $state,
            ':phoneNumber' => $phoneNumber,
            ':email' => $email
        ]);
        echo "New record created successfully";
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
    <title>Register</title>
</head>

<body>
    <h1>Register new citizen</h1>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
        </ul>
    </nav>
    <form action="register.php" method="post">
        <label for="citizenID">Citizen ID:</label>
        <input type="number" id="citizenID" name="citizenID" required>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" required>

        <label for="gender">Gender (M/F):</label>
        <input type="text" id="gender" name="gender" maxlength="1" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Register">
    </form>
    <footer></footer>
</body>

</html>