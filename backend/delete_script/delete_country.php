<?php
require '../config.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$id = isset($data['id']) ? $data['id'] : 0;
$name = isset($data['name']) ? $data['name'] : '';

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];
if ($id && $name) {
    $sql = "UPDATE country_master SET removed = 'y' WHERE country_id = $id and country_name = '$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn)) {
        $output['status'] = 1;
        $output['message'] = 'Country delete successfully';
        $output['data'] = $name;
    } else {
        $output['status'] = 2;
        $output['message'] = 'Country not found';
        $output['data'] = $name;
    }
}else {
    $output['status'] = 3;
    $output['message'] = 'Invalid request parameters';
    $output['data'] = 'id : '. $id.'name : '. $name;

}

mysqli_close($conn);
echo json_encode($output);