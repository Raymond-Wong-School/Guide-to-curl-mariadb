<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $formData = $_POST;

    // Send the data to Postman Echo
    $url = "https://postman-echo.com/post";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formData));
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response
    $responseData = json_decode($response, true);

    // Store the user-agent and trace-id in the database
    // (You will need to implement this part)
    // ...

    // Display the response
    echo "<h2>Postman Echo Response:</h2>";
    echo "<h3>Raw Response:</h3>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>"; // Display the raw response

    echo "<h3>Parsed Response:</h3>";
    echo "<pre>";
    print_r($responseData); // Display the parsed response
    echo "</pre>";

} else {
    // If the form was not submitted/empty, return to index.html instead of response.
    header("Location: index.html");
    exit;
}
?>
