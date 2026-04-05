<?php
// DB connection
$host = 'localhost';
$user = 'DB_USERNAME'; // replace with your DB username
$password = 'DB_PASSWORD'; // replace with your DB password
$database = 'DB_NAME'; // replace with your DB name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Validate password
        if (password_verify($password, $row['password'])) {
            // Redirect to dashboard if successful
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Invalid password';
        }
    } else {
        $error = 'No user found with that email';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)) { echo '<p style="color:red;">'.$error.'</p>'; } ?>
    <p>Don't have an account? <a href="registration.php">Register here</a></p>
</body>
</html>