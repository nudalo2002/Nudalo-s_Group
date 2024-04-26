<?php
include("config.php");
session_start(); // Start the session

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['search']) || isset($_GET['search1'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $search1 = mysqli_real_escape_string($conn, $_GET['search1']);

    $sql = "SELECT * FROM buyers WHERE id LIKE '%$search%' OR name_of_buyer LIKE '%$search%' OR address LIKE '%$search%' OR contact_number LIKE '%$search%' OR mode_of_transaction LIKE '%$search1%' OR mode_of_payment LIKE '%$search1%' OR quantity LIKE '%$search1%' OR type_of_fish LIKE '%$search1%' OR price LIKE '%$search1%' OR total_price LIKE '%$search1%'";
} else {
    $sql = "SELECT * FROM buyers";
}

// Perform the query
$result = mysqli_query($conn, $sql);

if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to the login page
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Display Buyer Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 6px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px; 
            transition: background-color 0.3s;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }
        .btn:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Buyer Information</h2>
    <form method="post" class="float-right">
            <input type="submit" name="logout" value="Logout" class="btn btn-danger">
        </form>
     <form action="display.php" method="GET">
        <label for="search">Search by ID or Name of Buyers:</label>
        <input type="text" id="search" name="search">
        <input type="text" id="search1" name="search1"> <!-- Changed the id to search1 to avoid duplicate ids -->
        <input type="submit" value="Search">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name of Buyers</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Mode of Transaction</th>
            <th>Mode of payment</th>
            <th>Quantity</th>
            <th>Type of Fish</th>
            <th>PRICE</th>
            <th>Total Price</th>
            <th>Actions</th> <!-- New column for actions -->
        </tr>
        
        <?php
            if ($result) {
                // Fetch each row and display the data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name_of_buyer'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['contact_number'] . "</td>";
                    echo "<td>" . $row['mode_of_transaction'] . "</td>";
                    echo "<td>" . $row['mode_of_payment'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['type_of_fish'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['total_price'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>"; // Edit button with a link to an edit page (replace 'edit.php' with your edit page)
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this buyer?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        ?>
    </table>
     <a href="create.php" class="btn btn-primary">Create New Buyer</a>

</body>
</html>
