<?php
// Database configuration
$servername = "localhost";
$username = "postman"; // Replace with your new username
$password = "postman"; // Replace with your new password
$dbname = "postmanlogs";
$port = 8036; // Specify the port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $formData = $_POST;
    $name = $formData['name'];
    $email = $formData['email'];
    $curl_agent = $_SERVER['HTTP_USER_AGENT'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO my_table (name, email, curl_agent) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $curl_agent);

    // Execute the statement
    if ($stmt->execute()) {
        // "Winry, the data was inserted successfully!" - Edward Elric
        // "Great job, Al! Let's send the response back." - Winry Rockbell
        $responseToDisplay = "Data inserted successfully!";
    } else {
        // "Winry, something went wrong with the database insertion." - Edward Elric
        // "Oh no, Al! Let's check the error." - Winry Rockbell
        $responseToDisplay = "Error inserting data: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to index.html with the response
    header("Location: index.html?response=" . urlencode($responseToDisplay));
    exit;

} else {
    // "Winry, did you forget to submit the form again?" - Edward Elric
    // "No, Al! I was just testing the fail-safes." - Winry Rockbell
    header("Location: index.html");
    exit;
}
?>
