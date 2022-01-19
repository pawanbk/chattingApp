<?php 
include_once('components/head.php');
include_once('config/database.php');
?>

<div class="form signup">
    <div class="title">
        <h2>Welcome to Online Chat</h2>
    </div>
    <form action="controllers/signupController.php" method="post" enctype="multipart/form-data">
        <?php
        if(isset($_SESSION['error'])){ ?>
        <div class="display-error" style="display:block !important">
            <li><?php echo $_SESSION['error'];?></li>
        </div>
        <?php unset($_SESSION["error"]);}?>
        <div class="field">
            <label>First Name<span>*</span></label>
            <?php if(isset($_SESSION['old'])):?>
                <input type="text" name="first_name" value="<?php echo $_SESSION['old']['fname']?>" placeholder="your first name">
            <?php else:?>
                <input type="text" name="first_name"  placeholder="your first name">
            <?php endif;?>
        </div>
        <div class="field">
            <label>Last Name<span>*</span></label>
            <?php if(isset($_SESSION['old'])):?>
                <input type="text" name="last_name" value="<?php echo $_SESSION['old']['lname']?>" placeholder="your last name">
            <?php else:?>
                <input type="text" name="last_name"  placeholder="your last name">
                <?php endif;?>
        </div>
        <div class="field">
            <label>Email<span>*</span></label>
            <?php if(isset($_SESSION['old'])){?>
                <input type="text" name="email" value="<?php echo $_SESSION['old']['email']?>" placeholder="your email">
            <?php } else{?>
                <input type="text" name="email"  placeholder="your email">
            <?php }unset($_SESSION['old']);?>
        </div>
        <div class="field">
            <label>Profile<span>*</span></label>
            <input type="file" name="image">
        </div>
        <div class="field">
            <label>Password<span>*</span></label>
            <input type="password" name="password" placeholder="password">
        </div>
        <div class="field">
            <label>Confirm Password<span>*</span></label>
            <input type="password" name="confirm" placeholder="confirm password">
        </div>
        <div class="field">
            <button type="submit" name="signup">Continue To Chat</button>
        </div>
    </form>
    <div class="links">
        <span>Already have an Account ?</span><a href="login.php">Login</a>
    </div>
</div>
<?php include_once('components/footer.php');