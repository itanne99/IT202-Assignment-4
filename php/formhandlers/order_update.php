<?php
    require("../database.php");
    session_start();
    if(isset($_SESSION['userID'])) {
        $formInput = [$_POST['clientID'],$_POST['orderNumber'],$_POST['orderDetail']];
        $sql = "UPDATE IT202_client_orders SET order_type='".$formInput[2]."' WHERE order_num='".$formInput[1]."'";
        /*Check if the client exists in the db*/
        if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT * FROM IT202_clients WHERE client_id='".$formInput[0]."'"))>0) {
            if(mysqli_num_rows(mysqli_query($GLOBALS['con'],"SELECT * FROM IT202_client_orders WHERE order_num='".$formInput[1]."'"))>0){
                if (mysqli_query($GLOBALS['con'], $sql)) {
                    echo "Order updated successfully.";
                } else {
                    header("Location: ../update_order.php?errormsg=".mysqli_error($GLOBALS['con']));
                }
            }else{
                $errormsg = "Order num not exist";
                header("Location: ../update_order.php?errormsg=".$errormsg);
            }
        } else {
            $errormsg = "Client does not exist";
            header("Location: ../update_order.php?errormsg=".$errormsg);
        }
    } else {
        $errormsg = "Photographer not logged in";
        header("Location: ../update_order.php?errormsg=".$errormsg);
    }