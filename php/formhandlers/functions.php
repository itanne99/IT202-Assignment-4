<?php
    function clientExists($clientID){
        if ($result = mysqli_query($GLOBALS['con'], "SELECT client_id FROM IT202_clients WHERE client_id=".$clientID)) {
            if (mysqli_num_rows($result) > 0) {
                echo("Client Exists");
                return true;
            }
        } else {
            echo('ERROR:'. mysqli_error($GLOBALS['con']));
        }
        return false;
    }

    function appointmentExists($appointmentID){
        $appointmentFound = false;
        if ($result = mysqli_query($GLOBALS['con'], "SELECT appointment_id FROM IT202_client_appointments")) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if($row[0]=$appointmentID){
                        $appointmentFound = true;
                        break;
                    }
                }
            }
        }
        return $appointmentFound;
    }

    function orderExists($orderNum){
        $orderFound = false;
        if ($result = mysqli_query($GLOBALS['con'], "SELECT order_num from IT202_client_orders")) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if($row[0]=$orderNum){
                        $orderFound=true;
                        break;
                    }
                }
            }
        }
        return $orderFound;
    }