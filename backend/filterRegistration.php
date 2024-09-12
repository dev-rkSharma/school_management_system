<?php
header('Content-Type: application/json');
require_once('./config.php');

$data = json_decode(file_get_contents('php://input'), true);

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];

// Handle fetching countries
if(!$data) {
    $sql = 'SELECT country_id, country_name FROM country_master WHERE removed = "n"';
    $result = mysqli_query($conn, $sql);

    if($result) {
        $output['status'] = 1;
        $output['message'] = 'Countries fetched successfully';
        while($row = mysqli_fetch_assoc($result)) {
            $output['data'][] = $row;
        }
    } else {
        $output['status'] = 2;
        $output['message'] = 'Error fetching countries: ' . mysqli_error($conn);
    }

// Handle fetching states based on selected country
} else if(isset($data['country_id']) ) {
    $country_id = intval($data['country_id']);
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

// Handle fetching cities based on selected state
} else if(isset($data['state_id'])) {
    $state_id = intval($data['state_id']);
    $sql = 'SELECT city_id, city_name FROM city_master WHERE removed = "n" AND state_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $state_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $output['status'] = 1;
        $output['message'] = 'Cities fetched successfully';
        while($row = mysqli_fetch_assoc($result)) {
            $output['data'][] = $row;
        }
    } else {
        $output['status'] = 2;
        $output['message'] = 'No cities found';
    }

// Handle invalid requests
} else {
    $output['status'] = 3;
    $output['message'] = 'Invalid request';
}

mysqli_close($conn);
echo json_encode($output);

?>