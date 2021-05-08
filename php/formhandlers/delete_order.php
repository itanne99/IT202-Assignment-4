<?php
    require("../database.php");
    session_start();
    if(isset($_SESSION['userID'])){
        $clientID = intval($_POST['clientID']);
        $clientOrderNum = intval($_POST['orderNum']);
        $sql = "DELETE FROM IT202_client_orders WHERE client_id='".$clientID."' AND order_num='".$clientOrderNum."' AND photographer_id='".$_SESSION['userID']."'";
        /*Look for Client ID*/
        if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT client_id FROM IT202_clients WHERE client_id=".$clientID))<=0){
            $errormsg = "Client Not Found";
            header("Location: ../cancel_order.php?errormsg=".$errormsg);
        } elseif(mysqli_num_rows(mysqli_query($GLOBALS['con'],"SELECT order_num FROM IT202_client_orders WHERE order_num=".$clientOrderNum))<=0){
            $errormsg = "Order Not Found";
            header("Location: ../cancel_order.php?errormsg=".$errormsg);
        } else {
            if(mysqli_query($GLOBALS['con'], $sql)){
                echo("Order deleted successfully");
            } else {
                $errormsg = mysqli_error($GLOBALS['con']);
                header("Location: ../cancel_order.php?errormsg=".$errormsg);
            }
        }
    } else {
        $errormsg = "Photographer not logged in";
        header("Location: ../cancel_order.php?errormsg=".$errormsg);
    }
