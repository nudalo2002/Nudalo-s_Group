<?php
	include("config.php");
    session_start(); // Start the session

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buyer Information Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Buyer Information</h2>
        <form action="create_function.php" method="post">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="number" class="form-control" id="contact_number" name="contact_number" required>
            </div>
            <div class="form-group">
                <label for="mode_of_transaction">Mode of Transaction</label>
                <select class="form-control" id="mode_of_transaction" name="mode_of_transaction" required>
                    <option selected disabled hidden>Choose Mode of Transaction</option>
                    <option value="LBC">LBC</option>
                    <option value="JNT">JNT</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mode_of_payment">Mode of PAYMENT</label>
                <select class="form-control" id="mode_of_payment" name="mode_of_payment" required>
                    <option selected disabled hidden>Choose Mode of PAYMENT</option>
                    <option value="gcash">GCASH</option>
                    <option value="palawan">PALAWAN</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
            </div>
            <div class="form-group">
                <label for="type_of_fish">Type of Fish</label>
                <select class="form-control" id="type_of_fish" name="type_of_fish" required>
                    <option selected disabled hidden>Choose Your Type of Fish</option>
                    <option value="mollies">Mollies</option>
                    <option value="guppies">Guppies</option>
                    <option value="fighting_fish">Fighting Fish</option>
                    <option value="tilapia_fingerlings">Tilapia Fingerlings</option>
                    <option value="halowan">Halowan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (required for some Bootstrap features) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
