<div class="dashboard">
    <div class="dashboard-bar">
        <h id="head">Profile</h>

        <div class="table">
            <div class="differ">
                <h1>First Name : <?php echo ucfirst($_COOKIE['firstname']) ?></h1>
            </div>
            <div class="differ">
                <h1>Last Name : <?php echo ucfirst($_COOKIE['lastname']) ?></h1>
            </div>
            <div class="differ">
                <h1>Email : <?php echo $_COOKIE['email'] ?></h1>
            </div>
            <div class="differ">
                <h1>Status : <?php echo ucfirst($_COOKIE['status']) ?></h1>
            </div>
            <div class="differ">
                <h1>Birth Date : <?php echo $_COOKIE['birthdate'] ?></h1>
            </div>
            <div class="differ">
                <h1><a href="gela">Change Password</a></h1>
            </div>
            <div class="differ">
                <h1><a href="gela">Change Profile Picture</a></h1>
            </div>
        </div>

    </div>
</div>
