<?php
$Title = "PPP Cancel Appointment";
require './header.php';
?>
<div class="container d-flex flex-column justify-content-center align-items-center vh-100" style="margin-top: 100px">
    <div class="jumbotron semi-transparent-jumbotron-bg">
        <h1 class="text-center mb-3">Create a New Account</h1>
        <form action="./formhandlers/upload_new_client.php" method="post">
            <div class="form-group">
                <label for="clientFirstName">Client First Name <span class="required">*</span>:</label>
                <input type="text" class="form-control" name="clientFirstName" id="clientFirstName" aria-describedby="clientFirstName" placeholder="Client First Name" required>
            </div>
            <div class="form-group">
                <label for="clientLastName">Client Last Name <span class="required">*</span>:</label>
                <input type="text" class="form-control" name="clientLastName" id="clientLastName" aria-describedby="Client Last Name" placeholder="Client Last Name" required>
            </div>
            <div class="form-group">
                <label for="clientID">Client ID <span class="required">*</span>:</label>
                <input type="text" class="form-control" name="clientID" id="clientID" aria-describedby="Client ID" placeholder="Client ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php include("./formhandlers/display_error.php"); ?>
</div>



<?php
require './footer.php';
?>
