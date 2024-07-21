
<?php
header('Content-Type: application/json');
require './config.php';

$input = json_decode(file_get_contents('php://input'), true);

$state_id = isset($input['state_id']) ? $input['state_id'] : 0;

$output = [
    'status' => 0,
    'data' => $state_id,
    'message' => 'this is getting country id form client side'
];

$cond = (@$state_id && @$state_id != 0) ? "where c.state_id = '$state_id'" : "";

if (1) {
    // $sql = "select * from state_master s  where s.state_id = 7 and removed = 'n'";
    $sql2 = "select c.city_id,c.city_name from city_master c inner join state_master s on c.state_id = s.state_id $cond  order by c.city_name ASC";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
        $output['status'] = 2;
        $output['message'] = 'States fetched successfully';

        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $output['data'] = [
                'id' => @$row['id'],
                'state_name' => @$row['state_name']
            ];
            echo "<tr>";
            echo "<td>" . ++$counter . "</td>";
            echo "<td>" . @$row['city_name'] . "</td>";
            // echo "<td>" . @$row['number_of_cities'] . "</td>";
            echo "<td> <a href=''><span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-green'>
                                          edit</span></a>
                                          <a href=''><span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-red'>delete</span></a>      
                                    </td>";

            echo "</tr>";
        }
    } else {
        $output['status'] = 3;
        $output['message'] = 'No states found for this state_id';
        $output['data'] = $state_id;
    }
}

mysqli_close($conn);
// echo json_encode($output);
