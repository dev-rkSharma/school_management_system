<?php
require '../backend/config.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$id = isset($data['user_id']) ? $data['user_id'] : '';
$name = isset($data['user_name']) ? $data['user_name'] : '';
$username = isset($data['_username']) ? $data['_username'] : '';
$email = isset($data['user_mail']) ? $data['user_mail'] : '';
$password = isset($data['password']) ? $data['password'] : '';

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];

$cmd = $id ? "UPDATE user_master SET name = '$name', username = '$username', email = '$email' WHERE user_id = $id" : "INSERT INTO user_master (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

$sql = $cmd;
$result = mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {
    $output["status"] = 1;
    $output["message"] = "User Altered successfully";
    $output["data"] = $id ? $id : mysqli_insert_id($conn);
} else {
    $output["status"] = 3;
    $output["message"] = "Failed to add/update user";
}


mysqli_close($conn);
echo json_encode($output);
