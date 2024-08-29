<?php
    header('Content-Type: application/json');
    require_once './config.php';
    $output = [
        'status' => 1,
        'message' => '',
        'data' => []
    ];
    $sql = "select * from class_master where removed = 'n'";
    $result = mysqli_query($conn,$sql);
    if($result) {
        $output['status'] = 1;
        $output['message'] = 'success';
        while($row = mysqli_fetch_assoc($result)) {
            $output['data'][] = $row['class_name'];
            // echo `<option value="${row['class_name']}">${row['class_name']}</option>`;
        }
    }
    else{
        $output['status'] = 0;
        $output['message'] = 'classes couldn\'t be found ';
        
    }
    mysqli_close($conn);
    echo json_encode($output);

    echo 'hello';
?>