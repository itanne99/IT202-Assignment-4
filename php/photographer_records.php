<?php
    $Title = 'PPP Photographer DB';
    include 'header.php'
?>
<div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="margin-top: 100px">
    <div class="row mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="d-none d-lg-block">Click on the table and use the left and right arrows on your keyboard to navigate.</h5>
                <h5 class="d-lg-none">Swipe left and right on the table to navigate through it horizontally</h5>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-light">
            <thead class="table-dark">
            <tr>
                <th>Client First Name</th>
                <th>Client Last Name</th>
                <th>Event Type</th>
                <th>Venue</th>
                <th>Date & Time</th>
                <th>Appointment ID</th>
                <th>Order</th>
                <th>Address</th>
                <th>Order Number</th>
            </tr>
            </thead>
            <tbody class="table-hover">
            <?php
            require 'database.php';
            //$result = tableResult('IT202_appointments INNER JOIN IT202_photographers WHERE IT202_appointments.photographer_id=IT202_photographers.id');
            $photographerNumID = intval($_SESSION['userID']);
            if($result = mysqli_query($GLOBALS['con'], "SELECT client_first_name, client_last_name, event_type, venue_of_event, date_time, I202ca.appointment_id, order_type, order_num, shipping_address FROM IT202_clients JOIN IT202_client_appointments I202ca on IT202_clients.client_id = I202ca.client_id LEFT JOIN IT202_client_orders I202co on I202ca.appointment_id = I202co.appointment_id WHERE I202ca.photographer_id=".$photographerNumID)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['client_first_name'] . "</td>";
                        echo "<td>" . $row['client_last_name'] . "</td>";
                        echo "<td>" . $row['event_type'] . "</td>";
                        echo "<td>" . $row['venue_of_event'] . "</td>";
                        echo "<td>" . $row['date_time'] . "</td>";
                        echo "<td>" . $row['appointment_id'] . "</td>";
                        echo "<td>" . $row['order_type'] . "</td>";
                        echo "<td>" . $row['shipping_address'] . "</td>";
                        echo "<td>" . $row['order_num'] . "</td>";
                        echo "</tr>";
                    }
                }
            }

            mysqli_close($GLOBALS['con'])
            ?>
            </tbody>
        </table>

</div>
<?php include 'footer.php'?>
