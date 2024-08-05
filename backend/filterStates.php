
<?php
header('Content-Type: application/json');
require './config.php';

$input = json_decode(file_get_contents('php://input'), true);

$country_id = isset($input['id']) ? $input['id'] : 0;

$output = [
    'status' => 0,
    'data' => $country_id,
    'message' => 'this is getting country id form client side'

];

$cond = ($country_id && $country_id != 0) ? "where s.country_id = $country_id" : "";


    $sql2 = "select  s.state_id, s.state_name, count(ci.city_id) as number_of_cities from state_master s left join city_master ci on s.state_id = ci.state_id $cond group by s.state_id order by s.state_name";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
        $output['status'] = 2;
        $output['message'] = 'States fetched successfully';
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>";
            echo "<td>" . ++$counter . "</td>";
            echo "<td>" . @$row['state_name'] . "</td>";
            echo "<td>" . @$row['number_of_cities'] . "</td>";
            echo "<td> <a href=''><span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-green'>
                                          edit</span></a>
                                          <a href=''><span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-red'>delete</span></a>      
                                    </td>";

            echo "</tr>";
        }
    } else {
        $output['status'] = 3;
        $output['message'] = 'No states found for this country_id';
        $output['data'] = $country_id;
    }


mysqli_close($conn);
// echo json_encode($output);
