<?php
error_reporting(0);

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, x-Request-with');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == 'PUT')
{
    
    //use this method for without form data
    $inputData = json_decode(file_get_contents("php://input"), true);
    if(empty($inputData)){
        
        $updateCustomer = updateCustomer($_POST, $_GET);
    }
    else
    {
        $updateCustomer = updateCustomer($inputData, $_GET);
       
    }
    echo $updateCustomer;

    //use this for form data
    // $inputData = json_decode(file_get_contents("php://input"), true);
    // $updateCustomer = updateCustomer($_POST, $_GET);
    // echo $updateCustomer;
}
else
{
    $data = [
        'status' => 405,
        'message' => $requestMethod. ' Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>