<?php
header('Content-Type: application/json');
require '../backend/config.php';
$data = json_decode(file_get_contents('php://input'), true);

$country_id = isset($data['country_id'])? $data['country_id'] : 0;

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];

// Validate country_id
if($country_id < 0 || $country_id == '') {
    $output['status'] = 1;
    $output['message'] = "Invalid country_id";
    echo json_encode($output);
    exit;

}

else{
    // Fetch states based on country_id
    $sql = "SELECT state_id, state_name FROM state_master WHERE country_id = $country_id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $output['status'] = 1;
        $output['message'] = "States fetched successfully";
        while($row = mysqli_fetch_assoc($result)){
            $output['data'][] = $row;
        }
        echo json_encode($output);  
    }
    else{
        $output['status'] = 2;
        $output['message'] = "No states found for this country_id";
        echo json_encode($output);
    }
}

// Close database connection

mysqli_close($conn);

?>

