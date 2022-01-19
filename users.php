<?php 
include_once('components/head.php');
require_once('config/database.php');
if(!isset($_SESSION['u_id'])){
    header("Location: login.php");
}

$result = $conn->query("select * from tbl_users where user_id = '".$_SESSION['u_id']."'");
$user = $result->fetch_object();

$result1 = $conn->query("select * from tbl_users where NOT user_id = '".$_SESSION['u_id']."'");

?>
<div class="head">
    <div class="user-details">
        <img src="<?php echo 'uploads/'.$user->featured_image?>" alt=""><div class="user-info">
        <span class="header"><?php echo $user->f_name.' '.$user->l_name?></span>
        <?php 
        if($user->is_active == 1){
            echo '<p>Active now</p>';
        } else{
            echo '<p class="offline">Offline</p>';
        }
        ?>
          
        </div>
    </div>
    <form action="controllers/logoutController.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</div>
<div class="content">
    <div class="search-box">
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fa fa-search"></i></button>
    </div>
   <?php while($friend = mysqli_fetch_object($result1)){
       $user_id = $friend->user_id;?>
    <div class="chats">
        <div class="chat-left">
            <img src="<?php echo 'uploads/'.$friend->featured_image?>" alt="">
            <div class="">
                <input type="hidden" name="reciever_id" value="<?php echo $user_id?>">
                <a href="chats.php?id=<?php echo $user_id?>">
                    <span class="header"><?php echo $friend->f_name.' '.$friend->l_name;?></span>
                   <?php 
                   $sql = "select * from tbl_chats 
                   where (reciever_id =$user_id OR sender_id = $user_id) 
                   AND (sender_id = {$_SESSION['u_id']} OR reciever_id = {$_SESSION['u_id']}) order by chat_id desc limit 1";
                   $result2 = $conn->query($sql);
                   while($chat = mysqli_fetch_object($result2)){
                   ?>
                <p class="message"><?php 
                (strlen($chat->message>28))? $msg = substr($chat->message,28).'......' : $msg =$chat->message;
                ($chat->sender_id == $_SESSION['u_id'])? $you = 'You:' : $you = '';
                  echo $you.' '.$msg?></p>
                <?php }?>
                </a>
            </div>
        </div>
        <?php if($friend->is_active == 1):?>
        <span class="active"><i class="fa fa-circle"></i></span>
        <?php else:?>
            <span class="offline"><i class="fa fa-circle"></i></span>
        <?php endif;?>
    </div>
   <?php }?>
</div>
<!-- <script src="js/main.js"></script> -->
<?php include_once('components/footer.php')?>