<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="../css/register.css"> <!-- Adjust path as needed -->
    <script defer src="../js/register.js"></script> <!-- Add this line -->

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
            <form id="register-form" action="javascript:void(0);" method="post"> <!-- Modify this line -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Register</button>
                <p id="error-msg" style="color: #ff6347; margin-top: 1rem;"></p> <!-- Add this line -->
            </form>
            <p style="margin-top: 1rem;">Already have an account? <a href="../php/login.php" style="color: #ff6347;">Login here</a></p>
        </div>
    </div>
</body>
</html>
