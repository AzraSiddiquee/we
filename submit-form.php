<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $name = test_input($_POST["name"]);
    $address = test_input($_POST["address"]);
    $email = test_input($_POST["email"]);
    $contact = test_input($_POST["contact"]);
    // $subject = test_input($_POST["subject"]);
    $message = test_input($_POST["message"]);

    // Validate the data (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($message) || empty($address) || empty($contact) ) {
        echo "All fields are required!";
        exit;
    }

    // Send email (you may need to configure your server for email sending)
    $to = "azrasiddiquee211@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Construct the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    // $email_message .= "Subject: $subject\n";
    $email_message .= "Address: $address\n";
    $email_message .= "Contact: $contact\n";
    $email_message .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {

        echo "Thank you for contacting us!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
}

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>