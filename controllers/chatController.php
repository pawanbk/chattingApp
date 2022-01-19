<?php
include_once('../config/database.php');

if(!empty($_POST['message'])){
    $sql = "INSERT INTO tbl_chats VALUES('',{$_SESSION['u_id']},{$_POST['reciever_id']},'{$_POST['message']}')";
    $insert = $conn->query($sql);
}

?>