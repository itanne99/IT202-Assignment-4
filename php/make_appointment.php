<?php
$Title = "PPP Make Appointment";
require './header.php';
?>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100" style="margin-top: 100px">
        <div class="jumbotron semi-transparent-jumbotron-bg">
            <h1 class="text-center mb-3">Make Appointment</h1>
            <form action="./formhandlers/place_appointment.php" method="post">
                <div class="form-group">
                    <label for="clientFirstName">Client First Name <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="clientFirstName" id="clientFirstName" aria-describedby="Client First Name" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="clientLastName">Client Last Name <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="clientLastName" id="clientLastName" aria-describedby="Client Last Name" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <label for="clientID">Client ID <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="clientID" id="clientID" aria-describedby="Client ID" placeholder="ID" required>
                </div>
                <div class="form-group">
                    <label for="eventType">Event Type <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="eventType" id="eventType" aria-describedby="Event Type" placeholder="Event Type" required>
                </div>
                <div class="form-group">
                    <label for="venue">Venue <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="venue" id="venue" aria-describedby="Client Last Name" placeholder="Location" required>
                </div>
                <div class="form-group">
                    <label for="dateTime">Date and Time <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="dateTime" id="dateTime" aria-describedby="Event Date & Time" placeholder="YYYY/MM/DD HH:MM:SS" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php include("./formhandlers/display_error.php"); ?>
    </div>


<?php
require './footer.php';
?>
<?php
