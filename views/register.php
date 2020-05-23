<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" novalidate>
    <div class="form-group">
        <div class="back">
            <button type="submit" class="btn btn-primary md-4 ml-3" name="Backtologin">Back To Log in</button>
        </div>
        <?php if(empty($errors) and !empty($_POST) ) echo '
        <div class="Success">
            <h>Accout Succesfully Created</h>
        </div> '
            ?>

    </div>

    <div class="container">
        <div class="form-group col-md-4 mt-3">
            <label for="registeruser">Name</label>
            <input type="text" class="form-control <?php echo isset($errors['registeruser']) ? ' is-invalid' : '' ?>"
                   value="<?php if(isset($_SESSION['registeruser'])) echo $_SESSION['registeruser']; else echo "";  ?>" name="registeruser">
            <div class="invalid-feedback">
                <?php echo $errors['registeruser'] ?? '' ?>
            </div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="surname">Surname</label>
            <input type="text" class="form-control <?php echo isset($errors['surname']) ? ' is-invalid' : '' ?>" id="surname" name="surname"
                   value="<?php if(isset($_SESSION['surname'])) echo $_SESSION['surname']; else echo ""; ?>">
            <div class="invalid-feedback">
                <?php echo $errors['surname'] ?? '' ?>
            </div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="email">Email</label>
            <input type="text" class="form-control <?php echo isset($errors['email']) ? ' is-invalid' : '' ?>" id="email" name="email"
                   value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; else echo ""; ?>">
            <div class="invalid-feedback">
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="passwd">Password</label>
            <input type="password" class="form-control <?php echo isset($errors['passwd']) ? ' is-invalid' : '' ?>" id="passwd" name="passwd"
                   value="<?php if(isset($_SESSION['passwd'])) echo $_SESSION['passwd']; else echo ""; ?>">
            <div class="invalid-feedback">
                <?php echo $errors['passwd'] ?? '' ?>
            </div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="exampleInputEmail1">Confirm Password</label>
            <input type="password" name="checkpass" class="form-control <?php echo isset($errors['checkpass']) ? ' is-invalid' : '' ?>"
                   id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="invalid-feedback">
                <?php echo $errors['checkpass'] ?? '' ?>
            </div>
        </div>
        <div class="form-group col-md-4 ">
            <label id="label" for="userstatus">Birth Date </label>
            <div class="birthdate">

                <div class="birthday">
                    <select id="birthday1" class="form-control <?php echo isset($errors['birthday']) ? ' is-invalid' : '' ?>" name="birthday">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                </div>
                <div class="birthday">
                    <select id="birthday2" class="form-control <?php echo isset($errors['birthday']) ? ' is-invalid' : '' ?>" name="birthmonth">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
                <div class="birthday">
                    <select id="birthday3" class="form-control <?php echo isset($errors['birthday']) ? ' is-invalid' : '' ?>" name="birthyear">
                        <option>2000</option>
                        <option>2001</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                    </select>
                </div>
            </div>
        </div>



        <div class="form-column">
            <div class="form-group col-md-4">
                <label for="userstatus">Status</label>
                <select id="userstatus" class="form-control <?php echo isset($errors['userstatus']) ? ' is-invalid' : '' ?>" name="userstatus">
                    <option <?php if(isset($_SESSION['userstatus']) && $_SESSION['userstatus']=='Student')  echo ' selected'; else echo '';?>>Student</option>
                    <option <?php if(isset($_SESSION['userstatus']) && $_SESSION['userstatus']=='Teacher') echo ' selected'; else echo ''; ?>>Teacher</option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $errors['userstatus'] ?? '' ?>
                </div>
            </div>
            <div>
                <div class="photo"
                     <h>Select image : &nbsp;</h> <br>
                    <input type="file" name="file"><br/>
                </div>
                <?php
                if($temp = 1  and isset($email) and isset($_FILES["file"]["tmp_name"]))
                {
                    $filepath = "./" . $email . '.png';

                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
                    {
                        $temp = 0;
                    }
                }
                ?>
            </div>
            <div class="form-group">
                <button id="rbtn" type="submit" value="Upload" class="btn btn-primary md-4 ml-3" name="btn">Submit</button>
            </div>

        </div>
</form>
