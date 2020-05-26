<title>Log In</title>
<form method="POST" action="/login" novalidate>
    <div class="container forlogin">
        <div class="form-group col-md-3 mt-3 nav-justified">
            <label for="username" class="center">Email</label>
            <input type="text" class="form-control <?php echo isset($errors['username']) ? ' is-invalid' : '' ?>"
                   value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo "";  ?>" name="username">
            <div class="invalid-feedback">
                <?php echo $errors['username'] ?? '' ?>
            </div>
        </div>

        <div class="form-group col-md-3 ">
            <label for="userpassword" class="center">Password</label>
            <input type="password" class="form-control <?php echo isset($errors['userpassword']) ? ' is-invalid' : '' ?>"
                   value="<?php if(isset($_SESSION['userpassword'])) echo $_SESSION['userpassword']; else echo "";  ?>" name="userpassword">
            <div class="invalid-feedback">
                <?php echo $errors['userpassword'] ?? '' ?>
            </div>
        </div>
        <div class="form-group col-md-3 ">
            <div>
                <a href = 'Forgetpassword.php'>Forget password?</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary md-2 ml-5" name="loginbtn">Log In</button>
        <button type="submit" class="btn btn-primary md-2 ml-4" name="signupbtn">Sign Up</button>

    </div>
</form>