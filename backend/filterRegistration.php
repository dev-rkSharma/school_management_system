<?php
// header('Content-Type: application/json');
// require_once('./config.php');
// $data = json_decode(file_get_contents('php://input'), true);

// $output = [
//     "status" => 0,
//     "message" => "",
//     "data" => [],
// ];

// if(!$data) {
//     $sql = 'SELECT country_id, country_name FROM country_master where removed = "n"';
//     $result = mysqli_query($conn, $sql);
//     if($result) {
//         $output['status'] = 1;
//         $output['message'] = 'Countries fetched successfully';
//         while($row = mysqli_fetch_assoc($result)) {
//             $output['data'][] = $row;
//         }
//     }else{
//         $output['status'] = 2;
//         $output['message'] = 'No countries found';
//     }
//     mysqli_close($conn);
//     echo json_encode($output);
// }else if(!empty($data['country_id']) && isset($data['country_id'])) {
//     $sql = 'SELECT state_id, state_name FROM state_master where removed = "n" and country_id ={$data["country_id"]}';
//     $result = mysqli_query($conn, $sql);
//     if($result) {
//         $output['status'] = 1;
//         $output['message'] = 'state fetched successfully';
//         while($row = mysqli_fetch_assoc($result)) {
//             $output['data'][] = $row;
//         }
//     }else{
//         $output['status'] = 2;
//         $output['message'] = 'No countries found';
//     }
//     mysqli_close($conn);
// }
// else if(isset($data['country_id']) && isset($data['state_id'])) {
//     $sql = 'SELECT city_id, city_name FROM city_master where removed = "n" and state_id ={$data["state_id"]}';
//     $result = mysqli_query($conn, $sql);
//     if($result) {
//         $output['status'] = 1;
//         $output['message'] = 'cities fetched successfully';
//         while($row = mysqli_fetch_assoc($result)) {
//             $output['data'][] = $row;
//         }
//     }else{
//         $output['status'] = 2;
//         $output['message'] = 'No cities found';
//     }
//     mysqli_close($conn);

// }
//  else {
//     $output['status'] = 3;
//     $output['message'] = 'Invalid request';
// }


// mysqli_close($conn);

// echo json_encode($output);

?>