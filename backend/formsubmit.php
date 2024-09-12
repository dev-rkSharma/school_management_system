<?php
require('./config.php');
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'),  true);
$name = isset($data['name']) ? $data['name'] : false;
$fatherName = isset($data['father_name']) ? $data['father_name'] : false;
$motherName = isset($data['mother_name']) ? $data['mother_name'] : false;
$mobile2 = isset($data['mobile2']) ? $data['mobile2'] : '';
$mobile1 = isset($data['mobile1']) ? $data['mobile1'] : false;
$email = isset($data['email']) ? $data['email'] : false;
$gender = isset($data['gender']) ? $data['gender'] : false;
$class = isset($data['class']) ? $data['class'] : false;
$dob = isset($data['dob']) ? $data['dob'] : false;
$address = isset($data['address']) ? $data['address'] : false;
$pincode = isset($data['pincode']) ? $data['pincode'] : false;
$city = isset($data['city']) ? $data['city'] : false;
$course = isset($data['course']) ? $data['course'] : '';

$output = [
    "status" => 0,
    "message" => "",
    "data" => [],
];




if (!$name || !$fatherName || !$motherName || !$mobile1 || !$email || !$gender || !$class || !$dob || !$address || !$city || !$pincode) {
    $output['status'] = false;
    $output['message'] = 'All fields are required';
    $output['data'] = [
        'name' => $name,
        'father_name' => $fatherName,
        'mother_name' => $motherName,
        'mobile1' => $mobile1,
        'mobile2' => $mobile2,
        'email' => $email,
        'gender' => $gender,
        'class' => $class,
        'dob' => $dob,
        'address' => $address,
        'city' => $city,
        'pincode' => $pincode,
        'course' => $course,
        'data' => 'Please provide all required fields'
    ];
} else {

    $sql = 'select * from student_details where email="$email"';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $output['status'] = 'collapsed';
        $output['message'] = 'Email already exists';
        $output['data'] = [
            'email' => $email
        ];
        mysqli_close($conn);
        exit();
        
    } else {

        try {
            $sql = 'insert into student_details (stuent_name, father_name, mother_name, mobile1, mobile2, email, gender, class_id, date_of_birth, address, city_id, pincode, course) values(?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?)';

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssssssssssss', $name, $fatherName, $motherName, $mobile1, $mobile2, $email, $gender, $class, $dob, $address, $city, $pincode, $course);

            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                $output['status'] = true;
                $output['message'] = 'Student details added successfully';
                $output['data'] = [
                    'student_id' => $conn->insert_id
                ];
            } else {
                throw new Exception("error while submitting the form", 1);
            }
            $stmt->close();
        } catch (Exception $e) {
            $output['status'] = false;
            $output['message'] = 'Error while submitting the form';
            $output['data'] = [
                'error_message' => $e->getMessage()
            ];
        }
    }
}

echo json_encode($output);
