<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

 // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "campaign_feedback"; 
    $submission_date = date('Y-m-d H:i:s');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to insert data into feedback table
    $sql = "INSERT INTO feedback (name, email, feedback, rating, submission_date)
        VALUES ('$name', '$email', '$feedback', '$rating', '$submission_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your feedback!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
