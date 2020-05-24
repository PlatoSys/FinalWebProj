<title>Homework</title>
<div class="dashboard">
    <div class="dashboard-bar">
        <h id="head">Homework</h>
            <?php
            $task = new \app\database\database();
            $subj = $task->getSubject($_COOKIE['email']);
            $task = $task->getTasks();


            if($_COOKIE['status'] == 'Student'){
                echo "<table class=\"table\">
                        <thead>
                        <tr>
                        <th scope=\"col\">Task Name</th>
                        <th scope=\"col\">Subject</th>
                        <th scope=\"col\">Your File</th>
                        <th scope=\"col\">Upload</th>
                        </tr>
                        </thead>
                        <tbody>";
                foreach ($subj as $key => $item){
                    foreach ($task as $key1 => $item1){
                        if($item1['subject'] == $item['subject']){
//                                echo $item1['taskname'] . '   ' . $item1['subject'] .  '<br>';
                            echo "<tr>";
                            echo "<td>" . $item1['taskname'] . "</td>";
                            echo "<td>" . $item1['subject'] . "</td>";
                            echo "<td>";
                            echo ' <form method="post" action="/homework" enctype="multipart/form-data" novalidate>
            <div class="form-group col-sm-12 taskupload">
                <div class="custom-file">
                    <input type="hidden" value="'. $item1['taskname'] .'" name="taskname">
                    <input type="file" name="file" class="custom-file-input" id="post_image"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
</td>' ;
                            echo "<td>" . " <button type=\"submit\" class=\"btn btn-primary\">Upload</button>    </form> " . "</td>";

                        }
                    }
                }
                echo "  
                        </tbody>
                           </table>";
            } else {echo "
           
                    <form method='post' action='/homework'>
            <div class=\"addtask\">
                <div class=\"form-group col-sm-6\">
                    <label for=\"exampleInputEmail1\">Task Name</label> <br>
                    <input type=\"text\" class=\"form-control\" name='taskname' id=\"exampleInputEmail1\" aria-describedby=\"emailHelp\" placeholder=\"Enter Task name\">
                </div>
                <div class=\"form-group col-sm-6\">
                    <label for=\"exampleFormControlSelect1\">Select Subject</label>
                    <select class=\"form-control\" name='subjectselection' id=\"exampleFormControlSelect1\">";
                        foreach ($subj as $key => $value){
                            echo "<option>" .  $value['subject'] . " </option>";
                        }
     echo " 
                    </select>
                </div>
                <div class=\"form-group col-sm-6\">
                    <label for=\"deadline\">Deadline</label> <br>
                    <input type=\"date\" name=\"deadline\" id=\"date\"> <br>
                </div>
                <div class=\"form-group col-sm-6\">
                    <button type=\"submit\" name=\"taskaddbtn\" class=\"btn btn-primary addtaskbtn\">Submit</button>
                </div>
            </div>
        </form>
        ";}

            ?>



    </div>


</div>
