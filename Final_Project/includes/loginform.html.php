<h1>Please Login</h1>

<form method="post" action="#">   
    <input name="email" type="text" value="<?php echo $email; ?>" placeholder="Enter your email..." />
    <br />
    <input name="password" type="password" value="" placeholder="Enter your password..." />
    <br />
    <input type="hidden" name="action" value="login" />
    <input class="loginSubmit" type="submit" value="Submit" />    
</form>

<h4 id="loginText" >Don't have a user account?</h4>
<h4 id="loginh4"><a class="loginLink" href="../site/addUser.php">Create New User</a></h4>