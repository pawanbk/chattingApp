<?php
include_once('../config/database.php');
$data = [];
$email = $_POST['email'];
$password = $_POST['password'];
login($email,$password);
function login($email,$password){
    global $conn;
    if(!empty($email) && !empty($password)){
        $sql = "Select * from tbl_users where email ='".$email."'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if($password == $user['password']){
                $_SESSION['u_id'] = $user['user_id'];
                $conn->query("update tbl_users set is_active = 1 where user_id ='".$user['user_id']."'");
               $data= ['success' => true];
            } else{
                $data = ["error" => "Credientials doesnot match our records."];
            }
        } else{
           $data = ["error"=>"{$email} doesn't exist in our record"];
        }   
    } else{
        $data = ["error"=>"All * fields are required"];
    }
    echo json_encode($data);
}

?>