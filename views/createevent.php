<title>Event</title>
<div class="dashboard">
    <div class="dashboard-bar">
        <h id="head">Create Event</h>
            <div class="new-event">
                <form action="/createevent" method="post">
                    <label for="fname">Event Name</label> <br>
                    <input type="text" id="fname" name="eventname" placeholder="Event Name"> <br>

                    <label for="dateofbirth">Event Date</label> <br>
                    <input type="date" name="eventdate" id="date"> <br>
                    <label for="appt">Choose a time for your Event:</label>
                    <br>
                    <input type="time" id="appt" name="time">
                    <input type="submit" name="createit" value="Submit">
                </form>
            </div>
    </div>
</div>