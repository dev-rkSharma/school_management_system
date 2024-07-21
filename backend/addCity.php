<?php
header('Content-Type: application/json');
require './config.php';

$data = json_decode(file_get_contents('php://input'), true);
$state_id = isset($data['state_id'])? $data['state_id']: 'state id not found';
$city_name = isset($data['city_name'])? $data['city_name']: 'city name not found';

$output = [
    'status' => 0,
    'city_id' => 0,
    'state_id' => 0,
    'message' => ' '
];
if(!isset($state_id) && isset($city_name) || empty($state_id) && empty($city_name)  ) {
    $output = [
        'status' => 0,
        'city_id' => 0,
        'state_id' => 0,
        'message' => 'inputs are invalid !! '
    ];

}else{
    $sql = "insert into city_master (city_name, state_id) values ('$city_name',$state_id)";
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn)) {
        $output = [
            'city_id' => mysqli_insert_id($conn),
            'state_id' => $state_id,
            'status' => 1,
            'message' => 'City inserted successfully'
        ];
        
    }
    else{
        $output = [
            'status' => 2,
            'city_id' => 0,
            'state_id' => 0,
            'message' => 'Failed to insert city'
        ];
    }

}
mysqli_close($conn);
echo json_encode($output);

?>