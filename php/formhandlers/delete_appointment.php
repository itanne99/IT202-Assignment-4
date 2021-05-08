<?php
require("../database.php");
session_start();
if(isset($_SESSION['userID'])){
    $clientID = intval($_POST['clientID']);
    $appointmentID = intval($_POST['appointmentID']);
    $sql = "DELETE FROM IT202_client_appointments WHERE client_id='".$clientID."' AND appointment_id='".$appointmentID."' AND photographer_id='".$_SESSION['userID']."'";
    /*Look for Client ID*/
    if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT client_id FROM IT202_clients WHERE client_id=".$clientID))<=0){
        $errormsg = "Client Not Found";
        header("Location: ../cancel_appointment.php?errormsg=".$errormsg);
    } elseif(mysqli_num_rows(mysqli_query($GLOBALS['con'],"SELECT appointment_id FROM IT202_client_appointments WHERE appointment_id=".$appointmentID))<=0){
        $errormsg = "Appointment Not Found";
        header("Location: ../cancel_appointment.php?errormsg=".$errormsg);
    } else {
        if(mysqli_query($GLOBALS['con'], $sql)){
            echo("Appointments deleted successfully");
            if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "DELETE FROM IT202_client_orders WHERE appointment_id'".$appointmentID."' AND photographer_id='".$_SESSION['userID']."'"))>0){
                mysqli_query($GLOBALS['con'], "DELETE FROM IT202_client_orders WHERE appointment_id'".$appointmentID."' AND photographer_id='".$_SESSION['userID']."'");
                echo("Appointment Order's deleted successfully");
            }
        } else {
            $errormsg = mysqli_error($GLOBALS['con']);
            header("Location: ../cancel_appointment.php?errormsg=".$errormsg);
        }
    }
} else {
    $errormsg = "Photographer not logged in";
    header("Location: ../cancel_appointment.php?errormsg=".$errormsg);
}
