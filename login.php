<?php include_once('components/head.php');
session_start();?>
<div class="form signup" >
    <div class="title">
        <h2>Welcome to Online Chat</h2>
    </div>
    <form class="loginForm">
        <div class="display-error">
        </div>
        <div class="field">
            <label>Email<span>*</span></label>
            <input type="text" name="email" placeholder="your email">
        </div>
        <div class="field">
            <label>Password<span>*</span></label>
            <input type="password" name="password" placeholder="password">
        </div>
        <div class="field">
            <button type="submit" name="login" class="active">Continue To Chat</button>
        </div>
    </form>
    
    <div class="links">
        <span>New to Online Chat ?</span><a href="index.php">Signup</a>
    </div>
</div>
<script src="js/login.js"></script> 
<?php include_once('components/footer.php');?>