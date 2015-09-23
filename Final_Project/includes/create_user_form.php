<form method="post" action="#">
    <h1 id="h1">Create your Address Book Account</h1>
    <div id="createUserForm">
    <h4> Enter your Email <br/><input type="text" placeholder="example@example.com" name="email" value="<?php echo $email; ?>"/></h4>

    <h4> Create a Password <br/><input type="password" name="password" /></h4>
    
    <h4> Confirm Password <br/><input type="password" name="passwordConfirm" /></h4>
    </div>
    <input type="hidden" name="action" value="addUser" />
    <input class="addUserSubmit" type="submit" value="Submit" /><br/><br/>
</form>
