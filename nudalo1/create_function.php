<?php
include("config.php");
session_start(); // Start the session

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_of_buyers = $_SESSION['username'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $mode_of_transaction = $_POST['mode_of_transaction'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $quantity = $_POST['quantity'];
    $type_of_fish = $_POST['type_of_fish'];

    $total_price = 0;
    $price = 0;
    if ($type_of_fish === "mollies") {
        $price = 1.1;
        $total_price = $quantity * $price; 
    } elseif ($type_of_fish === "guppies") {
        $price = 3;
        $total_price = $quantity * $price; 
    } elseif ($type_of_fish === "fighting_fish") {
        $price = 69;
        $total_price = $quantity * $price; 
    }elseif ($type_of_fish === "tilapia_fingerlings") {
        $price = 1.9;
        $total_price = $quantity * $price;
    }elseif ($type_of_fish === "halowan") {
        $price = 25;
        $total_price = $quantity * $price;
    }

    $sql = "INSERT INTO buyers (name_of_buyer, address, contact_number, mode_of_transaction,mode_of_payment, quantity, type_of_fish, price , total_price) VALUES ('$name_of_buyers', '$address', '$contact_number', '$mode_of_transaction','$mode_of_payment', '$quantity', '$type_of_fish', '$price' ,'$total_price')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: display.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
