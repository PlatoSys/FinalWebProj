<?php

namespace app\database;
use \PDO;


class database
{
    private PDO $pdo;

    public function __construct()
    {
            $config = require __DIR__.'/../config.php';
            $servername = $config['host'];
            $username = $config['username'];
            $password = $config['password'];
            $database = $config['database'];
            $this->pdo = new PDO("mysql:host=$servername;port=3306;dbname=$database", "$username", "$password");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function insertStudent($dbfirstname,$dblastname,$dbbirthdate,$dbemail,$dbpassword,$dbstatus){
        $statement = $this->pdo->prepare("insert into Students (firstname,lastname,birthdate,email,password,Status) 
                                                    Values (:firstname, :lastname, :birthdate, :email, :password, :status)");
        $statement->bindParam(':firstname',$dbfirstname);
        $statement->bindParam(':lastname',$dblastname);
        $statement->bindParam(':birthdate',$dbbirthdate);
        $statement->bindParam(':email',$dbemail);
        $statement->bindParam(':password',$dbpassword);
        $statement->bindParam(':status',$dbstatus);
        return $statement->execute();
    }

    public function getStudent($dbemail,$dbpassword){
        $statement = $this->pdo->prepare("SELECT * FROM Students where email = :email and password = :password");
        $statement->bindValue(':email',$dbemail);
        $statement->bindValue(':password',$dbpassword);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmail($dbemail){
        $statement = $this->pdo->prepare("SELECT * FROM Students where email = :email");
        $statement->bindValue(':email',$dbemail);
        $statement->execute();
        $user =  $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($user)){
            return ['false','Incorrect email'];
        } else return true;
    }

    public function getUser($dbemail,$dbpassword){
        $statement = $this->pdo->prepare("SELECT * FROM students where email = :email");
        $statement->bindValue(':email',$dbemail);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!$user){
            return [false,'user doesnt exists'];
        }
        if(!password_verify($dbpassword,$user[0]['password'])){
            return [false,'Password is incorrect'];
        } else return $user;
    }

    public function NewPass($dbemail,$dbpassword){
        $statement = $this->pdo->prepare("UPDATE Moodle.Students
                                                        SET password = :password
                                                        WHERE email = :email");
        $statement->bindValue(':email',$dbemail);
        $statement->bindValue(':password',$dbpassword);
        return $statement->execute();
    }

    public function getEvents(){
        $statement = $this->pdo->prepare("select * from Events e
                                                inner join Students s on s.email = e.email
                                                 order by convert(eventdate, date) ASC, convert(eventtime,time) ASC;");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEvent($eventname){
        $statement = $this->pdo->prepare("select * from Events e
                                                    where :eventname = e.eventname");
        $statement->bindParam(':eventname',$eventname);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function checkPastEvents(){
        $statement = $this->pdo->prepare("select eventname FROM Events
                                                            where eventdate < current_timestamp() or eventdate is null;");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function removePastEvents(){
        $statement = $this->pdo->prepare("DELETE FROM Events
                                                            where (eventdate <= current_timestamp() and eventtime < current_time()) or eventdate is null;");
        return $statement->execute();
    }

    public function createEvent($email,$eventname,$eventdate,$eventtime){
        $statement = $this->pdo->prepare("insert into Events (email,eventname,eventdate,eventtime) 
                                                    Values (:email, :eventname, :eventdate, :eventtime)");
        $statement->bindValue(':email',$email);
        $statement->bindValue(':eventname',$eventname);
        $statement->bindValue(':eventdate',$eventdate);
        $statement->bindValue(':eventtime',$eventtime);
        return $statement->execute();
    }

    public function addSubject($email,$subject)
    {
        $statement = $this->pdo->prepare("insert into Subjects (email,subject) 
                                                    Values (:email, :subject)");
        $statement->bindValue(':email',$email);
        $statement->bindValue(':subject',$subject);
        return $statement->execute();
    }

    public function removeSubject($email)
    {
        $statement = $this->pdo->prepare("DELETE FROM Subjects
                                                            where email = :email");
        $statement->bindValue(':email',$email);
        return $statement->execute();
    }

    public function getSubject($email){
        $statement = $this->pdo->prepare("select * FROM Moodle.Subjects
                                                            where email = :email;");
        $statement->bindValue(':email',$email);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($email,$subject,$name,$date){
        $statement = $this->pdo->prepare("insert into Tasks (email,taskname,deadlinedate,subject) 
                                                    Values (:email, :name , :date, :subject)");
        $statement->bindValue(':email',$email);
        $statement->bindValue(':name',$name);
        $statement->bindValue(':date',$date);
        $statement->bindValue(':subject',$subject);
        return $statement->execute();
    }

    public function getTasks()
    {
        $statement = $this->pdo->prepare("select * FROM Moodle.Tasks;");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deadlineTasks()
    {
        $statement = $this->pdo->prepare("DELETE FROM Tasks
                                                            where deadlinedate < current_timestamp();");
        return $statement->execute();
    }

}