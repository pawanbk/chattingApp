<?php
include_once('../config/database.php');
$data = [];
$sql = "select * from tbl_chats 
        where (reciever_id ={$_GET['reciever_id']}  AND sender_id = {$_GET['reciever_id']})
        OR (sender_id = {$_SESSION['u_id']} AND reciever_id = {$_SESSION['u_id']}) order by chat_id desc limit 1";
$result = $conn->query($sql);
echo json_encode(['sql'=>$sql]);
exit;
if($result->num_rows > 0){
   $data = $result->fetch_assoc();
} else{
    $data = ["response"=>"No chats available"];
}
echo json_encode($data);
?>