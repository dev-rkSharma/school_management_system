<?php

header('Content-Type: application/json');
require '../backend/config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = isset($data['id']) ? $data['id'] : 0;
$state_name = isset($data['state_name']) ? $data['state_name'] : '';
$response = [
      'status' => 0,
      'message' => '',
      'data' => [],
      'counter' => 0,
      'errors' => []
];


$sql = "insert into state_master(state_name,country_id) values('$state_name',$id)";
$result = mysqli_query($conn, $sql);



// echo $result;

if (mysqli_affected_rows($conn)) {
      $response = [
            'status' => 'success',
            'data' => [
                  'id' => $id,
                  'state_name' => $state_name
            ],
            'message' => 'State added successfully'
      ];
} 
else {
      $response = [
            'status' => 'error',
            'data' => [
                  'id' => $id,
                  'state_name' => $state_name
            ],
            'message' => 'Error adding state'
      ];
}


echo json_encode($response);
