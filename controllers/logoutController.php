<?php
include_once('../config/database.php');

if(isset($_POST['logout'])){
    $sql = "UPDATE tbl_users SET is_active = 0 where user_id = {$_SESSION['u_id']}";
    echo $sql;
    $update = $conn->query($sql);
    if($update){
        unset($_SESSION['u_id']);
        header('Location: ../login.php');
    }

}
?>