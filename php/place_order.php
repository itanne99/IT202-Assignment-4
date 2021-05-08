<?php
$Title = "PPP Place Order";
require './header.php';
?>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100" style="margin-top: 100px">
        <div class="jumbotron semi-transparent-jumbotron-bg">
            <h1 class="text-center mb-3">Place Order</h1>
                <form action="./formhandlers/upload_new_order.php" method="post">
                    <fieldset>
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
                        <label for="clientAppointmentID">Client Appointment ID <span class="required">*</span>:</label>
                        <input type="text" class="form-control" name="clientAppointmentID" id="clientAppointmentID" aria-describedby="Client Appointment ID" placeholder="Appointment ID" required>
                    </div>
                    <div class="form-group">
                        <label for="orderDetails">Photo Order <span class="required">*</span>:</label>
                        <input type="text" class="form-control" name="orderDetails" id="orderDetails" aria-describedby="Photo Order" placeholder="Photo Order" required>
                    </div>
                    <div class="form-group">
                        <label for="shippingAddress">Shipping Address <span class="required">*</span>:</label>
                        <input type="text" class="form-control" name="shippingAddress" id="shippingAddress" aria-describedby="Shipping Address" placeholder="Shipping Address" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
        </div>
        <?php include("./formhandlers/display_error.php"); ?>
    </div>


<?php
require './footer.php';
?>
<?php
