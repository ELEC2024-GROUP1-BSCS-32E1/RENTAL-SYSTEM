<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="../css/login.css"> <!-- Adjust path as needed -->
    <script defer src="../js/login.js"></script> <!-- Add this line -->
</head>
<body>
    <div class="main-content">
        <div class="form-container">
            <h1>Login</h1>
            <form id="login-form" action="javascript:void(0);" method="post"> <!-- Modify this line -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Login</button>
                <p id="error-msg" style="color: #ff6347; margin-top: 1rem;"></p> <!-- Add this line -->
            </form>
            <p style="margin-top: 1rem;">Don't have an account? <a href="../php/register.php" style="color: #ff6347;">Register here</a></p>
        </div>
    </div>
</body>
</html>
