<?php
$Title = "PPP Cancel Appointment";
require './header.php';
?>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100" style="margin-top: 100px">
        <div class="jumbotron semi-transparent-jumbotron-bg">
            <h1 class="text-center mb-3">Cancel Appointment</h1>
            <form action="./formhandlers/delete_appointment.php" method="post">
                <div class="form-group">
                    <label for="clientID">Client ID <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="clientID" id="clientID" aria-describedby="Client ID" placeholder="Client ID" required>
                </div>
                <div class="form-group">
                    <label for="appointmentID">Client Appointment ID <span class="required">*</span>:</label>
                    <input type="text" class="form-control" name="appointmentID" id="appointmentID" aria-describedby="Client Appointment ID" placeholder="Client Appointment ID" required>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmationModal">Submit</button>
                <!-- Modal -->
                <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                Are you sure you want to delete this appointment?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php include("./formhandlers/display_error.php"); ?>
    </div>


<?php
require './footer.php';
?>
