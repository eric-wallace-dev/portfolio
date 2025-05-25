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

// Fetch data from database
$sql = "SELECT title, description, address, date, time, duration, difficulty, firstname, lastname, phonenumber, email FROM walks ORDER BY date ASC";
$result = $conn->query($sql);

// Display data
echo "<h2>Submitted Walks</h2>";
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Title</th><th>Description</th><th>Address</th><th>Date</th><th>Time</th><th>Duration</th><th>Difficulty</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>{$row['address']}</td>
                <td>{$row['date']}</td>
                <td>{$row['time']}</td>
                <td>{$row['duration']} hours</td>
                <td>{$row['difficulty']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['phonenumber']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No walks have been submitted yet.";
}

// Close connection
$conn->close();
?>
