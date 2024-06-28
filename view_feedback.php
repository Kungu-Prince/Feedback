<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="feedbackform.css"> 
<body>
    <h2>Feedback Received</h2>

    <?php
    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "campaign_feedback"; 


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve feedback data
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row in a table
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['feedback'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "<td>" . $row['submission_date'] . "</td>"; 
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No feedback yet.";
    }

    // Close connection
    $conn->close();
    ?>

</body>
</html>
