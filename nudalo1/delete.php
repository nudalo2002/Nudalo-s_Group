<?php
include("config.php");
session_start(); // Start the session

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
// Check if ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Construct the DELETE query
    $sql = "DELETE FROM buyers WHERE id = $id";

    // Execute the DELETE query
    if (mysqli_query($conn, $sql)) {
        header("Location: display.php"); // Redirect back to the display page after deletion
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter is missing.";
}

// Close the connection
mysqli_close($conn);
?>
