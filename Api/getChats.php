<?php
include_once('../config/database.php');
$data = [];
$sql = "select * from tbl_chats
        where (reciever_id = {$_GET['reciever_id']} AND sender_id = {$_SESSION['u_id']})
        OR (reciever_id = {$_SESSION['u_id']} AND sender_id = {$_GET['reciever_id']})";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($chats = mysqli_fetch_object($result)){
        $data[] = $chats;
     }
     echo json_encode($data);
} else{
    $data = ["response"=>"No chats available"];
    echo json_encode($data);
}
?>