<?php
// Start the session
session_start();

// Define valid credentials (you should replace these with your own)
$valid_username = "admin";
$valid_password = "password";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    if ($username === $valid_username && $password === $valid_password) {
        // Authentication successful, set session variables
        $_SESSION['username'] = $username;
        // Redirect to a logged-in page
        header("Location: welcome.php");
        exit;
    } else {
        // Authentication failed, redirect back to login page with error message
        header("Location: login.html?error=invalid_credentials");
        exit;
    }
}
?>


<?php
// Start the session
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

// Welcome message
echo "Welcome, " . $_SESSION['username'] . "! You are logged in.";
?>
