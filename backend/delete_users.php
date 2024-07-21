<?php
require '../backend/config.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$id = isset($data['id']) ? $data['id'] : '';

$output = [];
if($id) {
    try{

        $sql = 'update user_master SET removed = "y" WHERE user_id = '. $id;
        $result = mysqli_query($conn, $sql);
        throw new Exception("incorect query : ". mysqli_error($conn));
    }
    catch(Exception $e) {
        $output = [
            "status" => 0,
            "message" => "Error deleting user : ". $e->getMessage()
        ];
    }

    if(mysqli_affected_rows($conn)) {
        $output = [
            "status" => 1,
            "message" => "User deleted successfully."
        ];
    }
    else {
        $output = [
            "status" => 2,
            "message" => "Failed to delete user."
        ];
    }
}
else {
    $output = [
        "status" => 3,
        "message" => "User ID not provided."
    ];
}

mysqli_close($conn);

echo json_encode($output);
?>