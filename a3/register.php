<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set in $_POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL query with SHA encryption
        $sql = "INSERT INTO users (username, password, reg_date) VALUES (?, SHA(?), NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            // Registration successful, log in the user by setting session
            $_SESSION['username'] = $username;
            $_SESSION['usrmsg'] = "You have successfully registered";

            // Redirect to the home page or any other page
            header("Location: index.php");
            exit();
        } else {
            // Handle errors during execution
            $_SESSION['err'] = "An error has occurred!";
        }

        $stmt->close();
    } else {
        $_SESSION['err'] = "Please fill in all required fields.";
    }
}

$conn->close();
?>