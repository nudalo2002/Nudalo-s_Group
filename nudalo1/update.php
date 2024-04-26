<?php
include("config.php");
session_start(); // Start the session

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name_of_buyer = $_POST['name_of_buyer'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $mode_of_transaction = $_POST['mode_of_transaction'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $quantity = $_POST['quantity'];
    $type_of_fish = $_POST['type_of_fish'];

    // Update SQL query
    $sql = "UPDATE buyers SET name_of_buyer = '$name_of_buyer', address = '$address', contact_number = '$contact_number', mode_of_transaction = '$mode_of_transaction',mode_of_payment = '$mode_of_payment', quantity = '$quantity', type_of_fish = '$type_of_fish' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        // On successful update, redirect to display page
        header("Location: display.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>