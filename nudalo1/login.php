<?php
	include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    h2 {
      color: #444;
      text-align: center;
      margin-bottom: 30px;
      text-transform: uppercase;
    }
    form {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      max-width: 350px;
      width: 100%;
    }
    label {
      display: block;
      margin-bottom: 10px;
      color: #555;
      font-weight: bold;
    }
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: calc(100% - 20px);
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 6px;
      transition: border-color 0.3s ease;
      font-size: 16px;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #3498db;
    }
    input[type="submit"] {
      background-color: #3498db;
      color: white;
      cursor: pointer;
      font-size: 18px;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  
  <form action="login.php" method="post">
    <h2>Login</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Login">
  </form>
</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: display.php");
        exit();
    } else {
        echo "Invalid username or password!";
    }
}

mysqli_close($conn);
?>
