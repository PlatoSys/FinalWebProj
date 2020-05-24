<?php
use app\controllers\HomeController;
if(!$_COOKIE['firstname']){
    header("Location: http://localhost:8080/login");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .oldpass {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        input[type=text], select {
            width: 60%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .taskupload {
            z-index: 0;
        }
        .addtask {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .addtaskbtn {
            margin: 20px;
            padding: 10px;
        }
        input[type=submit] {
            width: 60%;
            background-color:  #42a8ff;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .taskbtn {
            background-color: #42a8ff;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color:  #42a8ff;
        }

        .new-event {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .subj {
            display: flex;
            justify-content: space-around;
        }
        .new-event form {
            width: 70%;
        }
        .new-event input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .new-event input[type=submit] {
            width: 100%;
            background-color: #42a8ff;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .new-event input[type=submit]:hover {
            background-color: #42a8ff;
        }

        .new-event div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .resolving {
            display: flex;
            justify-content: center;
            flex-direction: column;
            background-color: red;
        }
        .menu-nav {
            z-index: 1;
        }
        .profilebtn {
            border: none;
            background: none;
        }
        * {
            background-color: white;
        }

        .menu-nav {
            width: 100%;
            position: fixed;
            -webkit-box-shadow: -1px 10px 26px -20px rgba(0, 0, 0, 0.75);
            box-shadow: -1px 10px 26px -20px rgba(0, 0, 0, 0.75);
        }

        .menu-nav-bar ul {
            display: block;
            background-color: #42a8ff;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .menu-nav-bar ul li {
            background-color: #42a8ff;
            display: inline-block;
        }

        .menu-nav-bar ul li a:hover {
            background-color: #2278c4;
        }

        .menu-nav-bar ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 20px;
        }

        .middle {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .middle .dashboard {
            margin-top: 92px;
            margin-left: 33%;
            outline: solid 2px;
            outline-color: grey;
            width: 35.5%;
            height: auto;
        }

        .middle .dashboard .dashboard-bar {
            text-align: center;
            background-coloR: #42a8ff;
        }

        .middle .dashboard .dashboard-bar h {
            background-color: #42a8ff;
        }

        .middle .dashboard h {
            font-size: 100px;
        }

        .middle .dashboard .subjects {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            margin: 20px;
            font-size: 25px;
        }

        .middle .dashboard .subjects button {
            background-color: red;
            margin: 10px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            background-color: #42a8ff;
            /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .middle .profile-nav {
            margin-top: 90px;
            -webkit-box-shadow: 11px 10px 29px -19px rgba(0, 0, 0, 0.75);
            box-shadow: 11px 10px 29px -19px rgba(0, 0, 0, 0.75);
            margin-left: 6.6%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 300px;
            height: 490px;
            position: fixed;
            background-color: #42a8ff;
        }

        .middle .profile-nav .profile-nav-bar {
            padding: 40px;
        }

        .middle .profile-nav .profile-nav-bar .profile-picture-bar img {
            border-radius: 50%;
        }

        .middle .profile-nav .profile-description-bar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin: 25px;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .middle .profile-nav .profile-description-bar .profile1 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            margin-top: 20px;
            font-size: 20px;
            outline: 1px solid;
            outline-color: #c0b6b6;
        }

        .middle .profile-nav .profile-description-bar .profile1 .profile2 {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 5px;
            width: 150px;
            text-align: center;
        }

        .profilebtn {
            border: none;
            background: none;
        }



        .menu-nav {
            z-index: 1;
        }
        .profilebtn {
            border: none;
            background: none;
        }
        #test {
            height: 40px;
            margin: 0;
            padding: 0;
        }
        #head {
            font-size: 60px;
        }
        .profile-nav1 {
            position: relative;
            z-index: 0;
            margin-top: 92px;
            margin-left: 50px;
            width: 300px;
            height: auto;

        }

        .event-head {
            display: flex;
            justify-content: center;
            text-align: center;
        }
        .event-head h {
            font-size: 40px;

        }

        .event {
            margin-top: 15px;
            margin-bottom: 15px;
            outline: solid 2px;
            outline-color: grey;
            font-size: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .menu-nav {
            z-index: 1;
        }
        .profilebtn {
            border: none;
            background: none;
        }
        #test {
            height: 40px;
            margin: 0;
            padding: 0;
        }

        #selection {
            font-size: 30px;
        }
        .registersubject {
            justify-content: center;
            display: flex;
            align-items: center;
        }
        .subjectregister {
            justify-content: center;
            text-align: center;
            display: flex;
            background-color: #42a8ff;
            /* Green */
            border: none;
            color: white;
            padding: 15px;
            padding-left: 50px;
            padding-right: 50px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .profile-nav1 {
            position: relative;
            z-index: 0;
            margin-top: 92px;
            margin-left: 50px;
            width: 300px;
            height: auto;

        }

        .event-head {
            display: flex;
            justify-content: center;
            text-align: center;
        }
        .event-head h {
            font-size: 40px;

        }

        .event {
            margin-top: 15px;
            margin-bottom: 15px;
            outline: solid 2px;
            outline-color: grey;
            font-size: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

    </style>
</head>
<body>
<div class="menu-nav">
    <div class="menu-nav-bar">
        <ul>
            <li><a href="/">Dashboard</a></li>
            <li><a href="/homework">Homework</a></li>
            <li><a href="/createevent">Create Event</a></li>
            <li><a href="/subject"> Subjects</a></li>
            <li><a href="/logout"> Log Out </a></li>
        </ul>
    </div>
</div>

<div class="middle">
    <div class="profile-nav">
        <div class="profile-nav-bar">
            <div class="profile-picture-bar">
                <img src="/Images/<?php
                if(file_exists("Images/". $_COOKIE['email'] . '.png'))
                    echo $_COOKIE['email'] . '.png';
                else echo 'img_avatar.png';
                ?>" alt="Profile Picture" height="200" width="200">
            </div>
            <div class="profile-description-bar">
                <div class="profile1">
                    <div class="profile2">
                        <h><?php echo ucfirst($_COOKIE['firstname']) . ' ' . ucfirst($_COOKIE['lastname']) ?></h>
                    </div>
                </div>
                <div class="profile1">
                    <div class="profile2">
                        <h><?php echo ucfirst($_COOKIE['status']); ?> </h>
                    </div>
                </div>
                <div class="profile1">
                    <div class="profile2" id="test">
                        <form method="post">
                            <a href="/profile">Profile</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $content; ?>


    <div class="profile-nav1">
        <div class="event-head">
            <h>Future Events</h>
        </div>
        <div class="events">
            <?php
            require_once 'eventhandler.php';
            ?>
        </div>

    </div>
</div>



</body>
</html>
