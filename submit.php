<?php
$servername = "localhost";
$username = "janes378_admin";
$password = "Cassie2022!!";
$dbname = "janes378_walk_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data safely
$title = trim($_POST['title']);
$description = trim($_POST['description']);
$address = trim($_POST['address']);
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
$difficulty = $_POST['difficulty'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['phonenumber'];
$email = trim($_POST['email']);

// Validate duration
if ($duration <= 0) {
    die("Error: Duration must be greater than 0.");
}

// Prepare SQL query to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO walks (title, description, address, date, time, duration, difficulty, firstname, lastname, phonenumber, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $title, $description, $address, $date, $time, $duration, $difficulty, $firstname, $lastname, $phonenumber, $email);

if ($stmt->execute()) {
    echo "Walk information submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
