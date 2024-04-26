<?php
include("config.php");
session_start(); // Start the session

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM buyers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Buyer Information</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <!-- Other styles or scripts -->
        </head>
        <body>
            <div class="container mt-4">
                <h2>Edit Buyer Information</h2>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="name_of_buyer">Name of Buyer</label>
                        <input type="text" class="form-control" id="name_of_buyer" name="name_of_buyer" value="<?php echo $row['name_of_buyer']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number" value="<?php echo $row['contact_number']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mode_of_transaction">Mode of Transaction</label>
                        <select class="form-control" id="mode_of_transaction" name="mode_of_transaction" required>
                            <option disabled hidden>Choose Mode of Transaction</option>
                            <option value="LBC" <?php if($row['mode_of_transaction'] === 'LBC') echo 'selected'; ?>>LBC</option>
                            <option value="JNT" <?php if($row['mode_of_transaction'] === 'JNT') echo 'selected'; ?>>JNT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mode_of_payment">Mode of payment</label>
                        <select class="form-control" id="mode_of_payment" name="mode_of_payment" required>
                            <option disabled hidden>Choose Mode of Transaction</option>
                            <option value="palawan" <?php if($row['mode_of_payment'] === 'palawan') echo 'selected'; ?>>palawan</option>
                            <option value="gcash" <?php if($row['mode_of_payment'] === 'gcash') echo 'selected'; ?>>gcash</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="<?php echo $row['quantity']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="type_of_fish">Type of Fish</label>
                        <select class="form-control" id="type_of_fish" name="type_of_fish" required>
                            <option disabled hidden>Choose Your Type of Fish</option>
                            <option value="mollies" <?php if($row['type_of_fish'] === 'mollies') echo 'selected'; ?>>Mollies</option>
                            <option value="guppies" <?php if($row['type_of_fish'] === 'guppies') echo 'selected'; ?>>Guppies</option>
                            <option value="fighting_fish" <?php if($row['type_of_fish'] === 'fighting_fish') echo 'selected'; ?>>Fighting Fish</option>
                            <option value="tilapia_fingerlings" <?php if($row['type_of_fish'] === 'tilapia_fingerlings') echo 'selected'; ?>>Tilapia Fingerlings</option>
                            <option value="halowan" <?php if($row['type_of_fish'] === 'halowan') echo 'selected'; ?>>Halowan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

            <!-- Bootstrap JS and other dependencies -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
            <!-- Other scripts -->
        </body>
        </html>
        <?php
    } else {
        echo "Buyer not found.";
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
