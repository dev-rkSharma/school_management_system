<?php
header('Content-Type: application/json');
require_once('./config.php');

$data = json_decode(file_get_contents('php://input'), true);
$country_id = intval(isset($data['country_id'])? $data['country_id']: 0);

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];

if($country_id  > 0) {
    $sql = 'SELECT state_id, state_name FROM state_master WHERE removed = "n" AND country_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $country_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $output['status'] = 1;
        $output['message'] = 'States fetched successfully';
        while($row = mysqli_fetch_assoc($result)) {
            $output['data'][] = $row;
        }
    } else {
        $output['status'] = 2;
        $output['message'] = 'No states found';
    }

}else{
    $output['status'] = 2;
    $output['message'] = 'Invalid country_id';

}
mysqli_close($conn);
echo json_encode($output);
?>