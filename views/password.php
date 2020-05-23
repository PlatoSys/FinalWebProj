<title>Change Password</title>
<div class="dashboard">
    <div class="dashboard-bar">
        <h>Profile</h>
        <form method="post" action="/password" novalidate>
            <div class="form-group column oldpass">
                <div class="form-group col-sm-6 <?php echo isset($errors['oldpass']) ? ' is-invalid' : '' ?>">
                    <label for="exampleInputEmail1">Old Password</label>
                    <input type="password" name="oldpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="invalid-feedback">
                    <?php echo $errors['oldpass'] ?? '' ?>
                </div>
                <div class="form-group col-sm-6 <?php echo isset($errors['newpass']) ? ' is-invalid' : '' ?>">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" name="newpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="invalid-feedback">
                    <?php echo $errors['newpass'] ?? '' ?>
                </div>
                <div class="form-group col-sm-6 <?php echo isset($errors['newcheckpass']) ? ' is-invalid' : '' ?>">
                    <label for="exampleInputPassword1">Re-enter new password</label>
                    <input type="password" name="newcheckpass" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="invalid-feedback">
                    <?php echo $errors['newcheckpass'] ?? '' ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>
</div>
