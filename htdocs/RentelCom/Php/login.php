<?php
session_start();  // Start session to persist login status

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db_connection.php";  // Include database connection script

    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL injection prevention with PDO prepared statements
    $sql = "SELECT UserID, Username FROM userrental WHERE Username=:username AND Password=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Valid credentials, set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['Username'];
        $_SESSION['user_id'] = $user['UserID'];

        header("Location: ../php/index.php");  // Redirect to home page after login
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="../css/login.css"> <!-- Adjust path as needed -->

</head>
<body>
    <div class="main-content">
        <div class="form-container">
            <h1>Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Login</button>
                <?php if (isset($error)) { echo '<p style="color: #ff6347; margin-top: 1rem;">' . $error . '</p>'; } ?>
            </form>
            <p style="margin-top: 1rem;">Don't have an account? <a href="../php/register.php" style="color: #ff6347;">Register here</a></p>
        </div>
    </div>
</body>
</html>