<?php
require("../database.php");
session_start();
if(isset($_SESSION['userID'])){
    $formInput = [$_POST["clientFirstName"],$_POST["clientLastName"],$_POST["clientID"],$_POST["clientAppointmentID"],$_POST["orderDetails"],$_POST["shippingAddress"]];
    $sql = "INSERT INTO IT202_client_orders (order_type, shipping_address, order_num, photographer_id, client_id, appointment_id) VALUES ('" . $formInput[4] . "', '" . $formInput[5] . "', '" . rand(10000000, 99999999) . "', '" . $_SESSION['userID'] . "', '" . $formInput[2] . "', '" . $formInput[3] . "')";
    /*Look for Client ID*/
    if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT client_id FROM IT202_clients WHERE client_id=".$formInput[2]))<=0){
        $errormsg = "Client Not Found";
        header("Location: ../place_order.php?errormsg=".$errormsg);
    } elseif(mysqli_num_rows(mysqli_query($GLOBALS['con'],"SELECT appointment_id FROM IT202_client_appointments WHERE appointment_id='".$formInput[3]."' AND client_id='".$formInput[2]."'"))<=0){
        $errormsg = "Appointment For Client Not Found";
        header("Location: ../place_order.php?errormsg=".$errormsg);
    } else {
        if(mysqli_query($GLOBALS['con'], $sql)){
            echo("Order placed successfully");
        } else {
            $errormsg = mysqli_error($GLOBALS['con']);
            header("Location: ../place_order.php?errormsg=".$errormsg);
        }
    }
} else {
    $errormsg = "Photographer not logged in";
    header("Location: ../place_order.php?errormsg=".$errormsg);
}
