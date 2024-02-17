<?php
header('Content-type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "dbsampledata";


$conn = new mysqli($host, $username, $password, $dbname);

$data = $conn->query("SELECT * FROM datas");

if($data->num_rows > 0){
    $fetchdata = $data->fetch_all(MYSQLI_ASSOC);
    echo json_encode($fetchdata);
}else{
    echo json_encode([
        'message' => "No data has been fetch!",
        'code' => 404,
    ]);
}








//$requestMethod = $_SERVER['REQUEST_METHOD'];

// if(!$conn){
//     die("Connection Failed: ". mysqli_connect_error());
// }


// function getSampleData(){
//     global $conn;
    

//     $query = "SELECT * FROM datas ";
//     $query_run = mysqli_query($conn, $query);

//     if($query_run){

//         if(mysqli_num_rows($query_run) > 0 ){

//             $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC);
            
//             $data = [
//                 'status' => 200,
//                 'message' => "Data fetch successfully",
//                 'data' => $res,
//             ];
//             header("HTTP/1.0 200 OK");
//             return json_encode($data);

//         }else{
//             $data = [
//                 'status' => 404,
//                 'message' => "No data found",
//             ];
//             header("HTTP/1.0 404 No data found");
//             return json_encode($data);
//         }

//     }else{
//         $data = [
//             'status' => 500,
//             'message' => "Internal Server Error",
//         ];
//         header("HTTP/1.0 500 Internal Server Error");
//         return json_encode($data);
//     }
// }





// if($requestMethod == 'GET'){
//     $sampledata = getSampleData();
//     echo $sampledata;
// }else{
//     $data = [
//         'status' => 405,
//         'message' => $requestMethod. 'Method Not Allowed',
//     ];
//     header("HTTP/1.0 405 Method Not Allowed");
//     echo json_encode($data);
// }





?>