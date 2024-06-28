<?php
header('Content-Type: application/json');
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];

$sql = "INSERT INTO userrental (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Registration successful';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Error: ' . $conn->error;
}

echo json_encode($response);

$conn->close();
?>
