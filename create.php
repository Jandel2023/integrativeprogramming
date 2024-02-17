<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$userid = $data['userid'];
$title = $data['title'];
$body = $data['body'];



$conn = new mysqli('localhost','root','','dbsampledata');


$insertdata =  $conn->query("INSERT INTO datas VALUES ('$id','$userid','$title','$body')");

if($insertdata){
    $iddata = $conn->insert_id;
    $row = $conn->query("SELECT * FROM datas where id = $iddata");
    $response = $row->fetch_assoc();

    echo json_encode($response);

}else{
    echo json_encode([
        'message' => "Failed to insert data",
        'code' => 422,
    ]);
}



?>