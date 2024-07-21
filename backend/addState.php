<?php
require 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = isset($data['id']) ? $data['id'] : '';
$state_name = isset($data['state_name']) ? $data['state_name'] : '';


$sql = "insert into state_master(state_name, country_id) values('$state_name','$id') ";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
      $response = [
            'status' => 'success',
            'data' => $data,
            'message' => 'State added successfully'
      ];
} else {
      $response = [
            'status' => 'error',
            'data' => $data,
            'message' => 'Error adding state'
      ];
}

$json_response = json_encode($response);
header('Content-Type: application/json');
echo json_encode($json_response);
