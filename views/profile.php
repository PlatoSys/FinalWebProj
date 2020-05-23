<div class="dashboard">
    <div class="dashboard-bar">
        <h id="head">Profile</h>

        <div class="table">
            <div class="differ">
                <h1>Full Name <br> <?php echo ucfirst($_COOKIE['firstname']) ?> <?php echo ucfirst($_COOKIE['lastname']) ?></h1>
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
                <h1><a href="/password">Change Password</a></h1>
            </div>
            <div class="differ">
                <h1><a href="/picture">Change Profile Picture</a></h1>
            </div>
        </div>

    </div>
</div>
