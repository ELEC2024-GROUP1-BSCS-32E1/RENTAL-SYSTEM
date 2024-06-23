<?php
session_start();  // Start session to persist login status

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";  // Include database connection script

    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL injection prevention
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if username already exists
    $check_username = "SELECT UserID FROM userrental WHERE Username='$username'";
    $result = $conn->query($check_username);

    if ($result->num_rows > 0) {
        $error = "Username already exists";
    } else {
        // Insert new user into database
        $insert_user = "INSERT INTO userrental (Username, Password) VALUES ('$username', '$password')";
        if ($conn->query($insert_user) === TRUE) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $conn->insert_id;  // Get the ID of the newly inserted user

            header("Location: ../php/login.php");  // Redirect to home page after registration
            exit();
        } else {
            $error = "Error registering user: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">  <!-- Adjust path as needed -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: #333;
            padding: 4rem 2rem;
            max-width: 400px;
            margin: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .form-container h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #FF6347;
        }

        .form-group {
            margin-bottom: 2rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #fff;
        }

        .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #444;
            background-color: #555;
            color: #fff;
            border-radius: 4px;
        }

        .submit-btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1.2rem;
            text-align: center;
            color: #fff;
            background-color: #FF6347;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #E55340;
        }
    </style>
</head>
<body>

    <div class="main-content">
        <div class="form-container">
            <h1>Register</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Register</button>
                <?php if (isset($error)) { echo '<p style="color: #ff6347; margin-top: 1rem;">' . $error . '</p>'; } ?>
            </form>
            <p style="margin-top: 1rem;">Already have an account? <a href="../php/login.php" style="color: #ff6347;">Login here</a></p>
        </div>
    </div>

</body>
</html>