<?php
    require_once('./db/register.php');
?>

<div class="signup-form">
    <h2>Register</h2>
    <p class="hint-text">Create your account. </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required"
                value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6 <?php echo (!empty($fName_err)) ? 'has-error' : ''; ?>">
                    <input type="text" class="form-control" name="fName" placeholder="First Name" required="required"
                        value="<?php echo $fName;?>">
                    <span class="help-block"><?php echo $fName_err; ?></span>
                </div>
                <div class="col-xs-6 <?php echo (!empty($lName_err)) ? 'has-error' : ''; ?>">
                    <input type="text" class="form-control" name="lName" placeholder="Last Name" required="required"
                        value="<?php echo $lName; ?>">
                    <span class="help-block"><?php echo $lName_err; ?></span>
                </div>
            </div>
        </div>
        <div class="form-group  <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <input type="email" class="form-control" name="email" placeholder="E-mail" required="required"
                value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required"
                value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                required="required">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </form>
</div>