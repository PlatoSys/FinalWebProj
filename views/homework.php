<div class="dashboard">
    <div class="dashboard-bar">
        <h id="head">Homework</h>
        <div class="table table-sm">
            <form method="POST" action="/homework" novalidate>
            <?php
            for ($x = 0; $x < sizeof($data); $x++) {
                foreach ($data[$x] as $key => $value){
                        if($key == 'subject'){
                            if($_COOKIE['status'] == 'Teacher'){
                                echo '<div class="subj"><h1>'  . ucfirst($value) . '</h1></div>';
                                echo '        <div class="task-uploader">
            <form method="post" action="/homework">
                <label for="taskname">Task Name</label> <br>
                <input type="hidden" name="hidesubj" value="'. $value.'">
                <input type="text" name="taskname" placeholder="Task Name"> <br>
                <label for="taskdetails">Task Details</label> <br>
                <input type="text" name="taskdetails" placeholder="Task Details"><br>
                <label for="deadline">Task Deadline</label> <br>
                <input type="date" name="deadlinedate" id="date">
                <input type="time" id="appt" name="deadlinetime">
                <input type="submit" name="taskbtn">
            </form>
        </div>';

                            } else {

                                echo  '<div class="subj"><h1>'  . '   ' . $value . '</h1> </div><br>';
                            }
                        }
                }
            }
            ?>
            </form>
        </div>

<!--        <div class="uploader">-->
<!--            <form method="post" action="/homework">-->
<!--                <h1>Upload your homework here</h1>-->
<!--                <input type="submit" name="gela">eg</input>-->
<!--                <input type="file" name="file"><br/>-->
<!--            </form>-->
<!--        </div>-->


    </div>
</div>