<title>Homework</title>
<div class="dashboard">
    <div class="dashboard-bar">
        <h id="head">Homework</h>
            <form method="POST" action="/homework">
            <?php
            if(!isset($data)){
                $data = [];
            };
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

                for ($x = 0; $x < sizeof($data); $x++) {
                    foreach ($data[$x] as $key => $value) {
                        if ($key == 'subject')  {
                                foreach ($task as $key1 => $value1){
                                        if($value == $value1['subject']){
                                            echo "    <tr>
                                                    <th ". " " . "=\"row\">" . $value1['taskname'] . "</th>
                                                    <td>". $value1['subject'] . " </td>
                                                    <td><input type=\"file\" name=\"file\" ></td>
                                                    <td><button type=\"submit\" class=\"taskbtn\">Upload</button></td>
                                                </tr>";
                                        }

                                    }
                                }
                            }
                        }
                                                echo "    </thead>
                                                <tbody>
                                            
                                            
                                            
                                                </tbody>
                                            </table>";

                }


            ?>
            </form>

<!--        <div class="uploader">-->
<!--            <form method="post" action="/homework">-->
<!--                <h1>Upload your homework here</h1>-->
<!--                <input type="submit" name="gela">eg</input>-->
<!--                <input type="file" name="file"><br/>-->
<!--            </form>-->
<!--        </div>-->

               </div>


    <form method="post" action="/homework">
        <div class="form-group col-sm-6 column">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-sm-6 column">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



</div>
