<?php

include_once('../config/database.php');

function escapeString($post){
    global $conn;
    return mysqli_real_escape_string($conn,$post);
}
function findEmail($email){
    global $conn;
    $result = $conn->query("Select * from tbl_users where email = '$email'");
    if($result->num_rows > 0){
        return true;
    }
    return false;
}

if(isset($_POST['signup'])){
    $fname = escapeString($_POST['first_name']);
    $lname = escapeString($_POST['last_name']);
    $email = escapeString($_POST['email']);
    $password = escapeString($_POST['password']);
    $confirm = escapeString($_POST['confirm']);
    $input = [
        "email" => $email,
        "fname" => $fname,
        "lname" => $lname
    ];

    $_SESSION['old'] = $input;


    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($confirm)){
        $temp_name = $_FILES['image']['tmp_name'];
        $type = explode('/',$_FILES['image']['type']);
        $extension = $type[1];
        $new_image = time().'.'.$extension;
        $extensions = ['jpg','png','jpeg'];
        if(empty($_FILES['image']['name'])){
            $_SESSION["error"] =  "Please choose an image";
        } else{
            if(findEmail($email)){
                $_SESSION["error"] =  "$email is taken. Please choose another email.";
            } else {
                if(in_array($extension,$extensions)){
                    if($password == $confirm){
                        if(move_uploaded_file($temp_name,'../uploads/'.$new_image)){
                            $insert = $conn->query("INSERT INTO tbl_users VALUES('','$fname','$lname','$email','$password','$new_image','')");
                            $_SESSION["success"] = "You are successfully registered. Please proceed to login.";
                            header("Location: ../login.php");
                            exit;
                        } else{
                            $_SESSION["error"] = "Something went wrong. Please try again";
                        }
                    } else{
                        $_SESSION["error"] =  "Passwords do not match. Please try again";
                    }
                } else{
                    $_SESSION["error"] = ".$extension file extension is not accepted. Please choose .png, .jpeg, .jpg extension";
                }
            }
        }
        
    } else{
        $_SESSION["error"] = "All * fields are required. Please fill all the fields and try again.";
    }
    
    header('Location: ../index.php');
    
}

?>