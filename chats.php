<?php 
include_once('components/head.php');
require_once('config/database.php');
if(!isset($_SESSION['u_id'])){
    header("Location: login.php");
}
$result = $conn->query("select * from tbl_users where user_id = {$_GET['id']}");
$user = $result->fetch_object();
?>
<div class="head">
    <div class="user-details">
        <a href="users.php"><i class="fa fa-arrow-left"></i></a>
        <img id ="friend_img" src="<?php echo 'uploads/'.$user->featured_image?>" alt="">
        <div class="user-info">
            <span class="header"><?php echo $user->f_name.' '.$user->l_name;?></span>
            <?php 
            if($user->is_active == 1){
                echo '<p>Active now</p>';
            } else{
                echo '<p class="offline">Offline</p>';
            }
            ?>
        </div>
    </div>
</div>
<div class="chat-box">
</div>
<div class="typing-area">
    <form class="chatForm">
        <input type="hidden" name="reciever_id" value="<?php echo $user->user_id?>">
        <input type="text" name="message" placeholder="type a message..">
        <button name="sendMsg">Send</button>
    </form>
</div>
<script src="js/chat.js"></script>
<?php include_once('components/footer.php');
