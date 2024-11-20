<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
</head>
<body>

<h1>Response from Postman Echo Goes Below :</h1>

<div>
    <?php
    // Check if the response is set in the URL
    if (isset($_GET['response'])) {
        // Decode the URL-encoded response
        $response = urldecode($_GET['response']);
        // Display the response safely
        echo nl2br(htmlspecialchars($response)); // Display the decoded response
    } else {
        echo "No response received."; // This is correct for when the response is not set
    }
    ?>
</div>

</body>
</html>
