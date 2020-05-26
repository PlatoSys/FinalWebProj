<?php

namespace app\database;


use PDO;
use PDOException;

    $config = require __DIR__ . '/../config.php';

    $servername = $config['host'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    $conn = new PDO("mysql:host=$servername", $username, $password);

    try {
        $sql = "CREATE DATABASE $database";
        $conn->exec($sql);
        echo "Database created successfully" . PHP_EOL;
        $conn->query("use $database");

        $sql = "CREATE TABLE Tasks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) NOT NULL,
    taskname VARCHAR(255) NOT NULL,
    deadlinedate date NOT NULL ,
    subject VARCHAR(255)
)";

        $conn->exec($sql);


        $sql = "CREATE TABLE Students (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    birthdate date,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL  
)";
        $conn->exec($sql);

        $sql = "CREATE TABLE Events (
    eventid INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) NOT NULL,
    eventname VARCHAR(255) NOT NULL,
    eventduration int,
    eventtime time,
    eventdate date 
)";
        $conn->exec($sql);


        $sql = "CREATE TABLE Subjects (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL
)";

        $conn->exec($sql);
        echo "database was created" . PHP_EOL;

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
