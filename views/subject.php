<title>Subject</title>
 <div class="dashboard">
        <div class="dashboard-bar">
            <h>Courses</h>
            <p id="selection">Please select subjects</p>
        </div>
        <div class="subjects">
            <ul>
                <li><a href="#"> Math </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="math" id="mathid">Enroll</button></li>
                <li><a href="#"> Physic </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="physic" id="physicid">Enroll</button></li>
                <li><a href="#"> Biology </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="biology" id="biologyid">Enroll</button></li>
                <li><a href="#"> History </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="history" id="historyid">Enroll</button></li>
                <li><a href="#"> Chemistry </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="chemistry" id="chemistryid">Enroll</button></li>
                <li><a href="#"> Art </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="art" id="artid">Enroll</button></li>
                <li><a href="#"> Geography </a> <button onclick="addSubject(this)" type="submit" class="forcolor" name="geography" id="geographyid">Enroll</button></li>
            </ul>
        </div>

     <div>
        <form method="post" action="/subject" novalidate>
            <div class="registersubject">
                <input class="subjectregister" name="subjectregister" type="submit" onclick="test(SubjectArray)">
            </div>
        </form>
    </div>


</div>



