<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devi_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data from the POST request
$signupname = $_POST["signup-name"];
$signupUsername = $_POST["signup-username"];
$signupPassword = $_POST["signup-password"];
$signupRole = $_POST["signup-role"];

// Generate a unique verification code
$verifyCode = generateRandomString(7);

// Set the verify status to false
$verifyStatus = "false";

// Insert the form data and verification code into the database
$sql = "INSERT INTO user_profile (name, email, password, role, verify_code, verify_status) VALUES ('$signupname', '$signupUsername', '$signupPassword', '$signupRole', '$verifyCode', '$verifyStatus')";
if ($conn->query($sql) === TRUE) {
    // Data inserted successfully, send verification email
    $to = $signupUsername;
    $subject = "Verify Your Account";
    $message = "Hi $signupname,\n\nThank you for signing up! To verify your account, please click on the following link and enter the verification code:\n\nhttps://example.com/verify.php?code=$verifyCode\n\nVerification code: $verifyCode\n\nIf you did not sign up for this account, please ignore this email.\n\nBest regards,\nYour Company Name";
    $headers = "From: Your Company Name <noreply@example.com>";
    header("Location: login.html");
   /* if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully, redirect to login.html
        echo "A verification email has been sent to your email account to verify!";
       
        exit();
    } else {
        //echo "Error: Unable to send verification email.";
    }*/
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Function to generate a random string
function generateRandomString($length) {
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-{}[]|\\:;"<>,.?/';
 $charLength = strlen($characters);
 $randomString = '';
 for ($i = 0; $i < $length; $i++) {
     $randomString .= $characters[rand(0, $charLength - 1)];
    }
    return $randomString;
}
?>
