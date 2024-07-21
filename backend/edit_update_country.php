<?php 
require '../backend/config.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$id = trim(isset($data['country_id'])? $data['country_id'] : '');
$name = trim(isset($data['country_name'])? $data['country_name'] : '');

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];
$update_query = "UPDATE country_master SET country_name = '$name' WHERE country_id = $id"; $insert_query = "INSERT into country_master(country_name) VALUES('$name')";
$cmd = $id ? $update_query: $insert_query;

$sql = $cmd;
$result = mysqli_query($conn, $sql);

// if ( $cmd == $update_query && $result) {
//     $output['status'] = 1;
//     $output['message'] = 'country updated successfully';
//     $output['data'] = $name;
// }
// else if ($cmd == $insert_query && $result) {
//     $output['status'] = 1;
//     $output['message'] = 'country added successfully';
//     $output['data'] = $name;
// }

if($result) {
    $output["status"] = 1;
    $output["message"] = "Country updated/added successfully";
    $output["data"] = $id? $id : mysqli_insert_id($conn);
}
mysqli_close($conn);
echo json_encode($output);


?>