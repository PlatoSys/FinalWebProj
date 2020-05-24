<?php
use app\database\database;

$events = new database();
$del = $events->checkPastEvents();


//            unlink("../MoodleSystem/events/$item" . ".php");

$del = $events->removePastEvents();


$event = $events->getEvents();
$str = '.php';

for ($i = 0; $i < sizeof($event); $i++) {
    echo
        '<div class="event">
               <h1></h1> <a href="/" target="_blank">' . $event[$i]['eventname'] .
        '</a></h1></>
                <div class="date">
                    <h>Event Date:' . strval($event[$i]['eventdate']) .
        '</h>
                </div>
                <div class="time">
                    <h>Event Time:' . strval($event[$i]['eventtime']) .
        ' </h>
                </div>
                <div class="host">
                    <h>Event Host:' . $event[$i]['firstname'] . " " . $event[$i]['lastname'] .
        ' </h>
                </div>
            </div>';

}
?>

<div class="events">

</div>
