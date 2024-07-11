<?php

$host = 'localhost';
$dbname = 'egov_db';
$username = 'root';
$password = '';

session_start();
$_SESSION['conn'] = false;
$_SESSION['pdo'] = null;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // echo "connected successfully";
    $_SESSION['conn'] = true;
} catch (PDOException $e) {
    die("connection failed " . $e->getMessage());
}

// useless function
function add_citizen($id, $fname, $lname, $dob, $gender, $addr, $city, $state, $phone, $email)
{
    global $pdo;
    $sql = "INSERT INTO Citizen (CitizenID, FirstName, LastName, DateOfBirth, Gender, Address, City, State, Country, PhoneNumber, Email) 
            VALUES (:id, :firstName, :lastName, :dateOfBirth, :gender, :address, :city, :state, :country, :phoneNumber, :email)";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            ':firstName' => $fname,
            ':lastName' => $lname,
            ':dateOfBirth' => $dob,
            ':gender' => $gender,
            ':address' => $addr,
            ':city' => $city,
            ':state' => $state,
            ':phoneNumber' => $phone,
            ':email' => $email
        ]);
        return "New record created successfully";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}