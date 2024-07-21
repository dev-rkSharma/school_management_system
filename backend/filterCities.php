<?php
header('Content-Type: application/json');
require './config.php';

$input = json_decode(file_get_contents('php://input'), true);
$country_id = isset($input['id']) ? $input['id'] : 0;

$output = [
    'status' => 0,
    'data' => [],
    'message' => 'This is getting country id from client side'
];

if ($country_id != 0) {
    $sql2 = "SELECT state_id, state_name FROM state_master WHERE country_id = $country_id";
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) > 0) {
        $output['status'] = 2;
        $output['message'] = 'States fetched successfully';
        while ($row = mysqli_fetch_assoc($result)) {
            $output['data'][] = [
                'id' => $row['state_id'],
                'name' => $row['state_name']
            ];
        }
    } else {
        $output['status'] = 3;
        $output['message'] = 'No states found for this country_id';
    }
} else {
    $output['status'] = 3;
    $output['message'] = 'Invalid country_id';
}

mysqli_close($conn);

// Output the JSON response
echo json_encode($output);
