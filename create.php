<?php
header('Content-type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-type, Access-Control-Allow-Headers, Authorization, X-Requested-With');



//GET THE DATA
$data = json_decode(file_get_contents("php://input"), true);

$userid = $data['userid'];
$title = $data['title'];
$body = $data['body'];


//CONNECT TO DATABASE
$conn = new mysqli('localhost','root','','dbsampledata');

//INSERT THE DATA
$insertdata =  $conn->query("INSERT INTO datas (userid, title, body) VALUES ('$userid','$title','$body')");

if($insertdata){
    $id = $conn->insert_id;
    $row = $conn->query("SELECT * FROM datas where id = $id");
    $response = $row->fetch_assoc();

    echo json_encode($response);

}else{
    echo json_encode([
        'message' => "Failed to insert data",
        'code' => 422,
    ]);
}



?>