<?php
// "Winry, is it a POST request?" - Edward Elric
// "Yes, Al! We're good to go." - Winry Rockbell
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // "Winry, let's get the form data." - Edward Elric
    // "Got it, Al! Here you go." - Winry Rockbell
    $formData = $_POST;

    // "Al, time to send this data to Postman Echo." - Winry Rockbell
    // "Right, Winry! Let's do it." - Edward Elric
    $url = "https://postman-echo.com/post";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formData));
    $response = curl_exec($ch);
    curl_close($ch);

    // "Winry, let's decode the JSON response." - Edward Elric
    // "Sure, Al! Decoding it now." - Winry Rockbell
    $responseData = json_decode($response, true);

    // "Winry, we need to store this data in the database, right?" - Edward Elric
    // "Of course, Al! But first, let's make sure it doesn't explode." - Winry Rockbell

    // "Winry, let's prepare the response to be displayed on index.html." - Edward Elric
    // "Got it, Al! Here's the response." - Winry Rockbell
    $responseToDisplay = "Postman Echo Response:\n";
    $responseToDisplay .= "Raw Response:\n";
    $responseToDisplay .= htmlspecialchars($response) . "\n";
    $responseToDisplay .= "Parsed Response:\n";
    $responseToDisplay .= print_r($responseData, true);

    // "Winry, let's redirect back to index.html with the response." - Edward Elric
    // "Alright, Al! Redirecting now." - Winry Rockbell
    header("Location: index.html?response=" . urlencode($responseToDisplay));
    exit;

} else {
    // "Winry, did you forget to submit the form again?" - Edward Elric
    // "No, Al! I was just testing the fail-safes." - Winry Rockbell
    header("Location: index.html");
    exit;
}
?>
