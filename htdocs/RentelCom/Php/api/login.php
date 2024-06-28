<?php
header('Content-Type: application/json');
include 'db.php';  // Ensure the path to db.php is correct

session_start();

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];

// SQL injection prevention with prepared statements
$sql = "SELECT UserID, Username FROM userrental WHERE Username = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$response = array();
if ($user) {
    // Valid credentials, set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $user['Username'];
    $_SESSION['user_id'] = $user['UserID'];

    $response['status'] = 'success';
    $response['message'] = 'Login successful';
} else {
    // Invalid credentials, set session variable
    $_SESSION['loggedin'] = false;

    $response['status'] = 'error';
    $response['message'] = 'Invalid username or password';
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>
