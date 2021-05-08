<?php
    require("../database.php");
    session_start();
    if(isset($_SESSION['userID'])) {
        $formInput = [strval($_POST['clientFirstName']), strval($_POST['clientLastName']), intval($_POST['clientID']), strval($_POST['eventType']), strval($_POST['venue']), strval($_POST['dateTime'])];
        $sql = "INSERT INTO IT202_client_appointments (event_type, venue_of_event, date_time, photographer_id, client_id, appointment_id) VALUES ('" . $formInput[3] . "', '" . $formInput[4] . "', '" . $formInput[5] . "', '" . $_SESSION['userID'] . "', '" . $formInput[2] . "', '" . rand(10000000, 99999999) . "')";
        /*Check if the client exists in the db*/
        if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT * FROM IT202_clients WHERE client_id='".$formInput[2]."' AND client_first_name='".$formInput[0]."' AND client_last_name='".$formInput[1]."'"))>0) {
            if (mysqli_query($GLOBALS['con'], $sql)) {
                echo "Records inserted successfully.";
            } else {
                header("Location: ../make_appointment.php?errormsg=".mysqli_error($GLOBALS['con']));
            }
        } else {
            $errormsg = "Client does not exist";
            header("Location: ../make_appointment.php?errormsg=".$errormsg);
        }
    } else {
        $errormsg = "Photographer not logged in";
        header("Location: ../make_appointment.php?errormsg=".$errormsg);
    }
