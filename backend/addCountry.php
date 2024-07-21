<?php
session_start();
$counter = $_SESSION['counter'];
require "config.php";

header("Content-Type: application/json");
$data = json_decode(file_get_contents('php://input'), true);
$country_name = isset($data['country_name']) ? $data['country_name'] : '';

$output = [
      'status' => 0,
      'message' => '',
      'data' => [],
      'counter' => 0
];


if (!empty($country_name)) {


      $country_name = mysqli_real_escape_string($conn, $country_name);
      $insert = "insert into country_master(country_name) values('$country_name')";
      $result = mysqli_query($conn, $insert);

      if (mysqli_affected_rows($conn) > 0) {



            if ($result) {
                  $output['status'] = 1;
                  $output['message'] = $country_name . ' added successfully';
                  $output['counter'] = $GLOBALS['counter'];
            } else {
                  $output['status'] = 2;
                  $output['message'] = 'failed to add ' . $country_name;
            }
      } else {
            $output['status'] = 3;
            $output['message'] = 'error occured while processing' . mysqli_error($conn);
      }
} else {
      $output['status'] = 4;
      $output['message'] = 'country name is not provided';
      $output['data'] = 'country name : ' . $country_name;
}

mysqli_close($conn);
echo json_encode($output);
