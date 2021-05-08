<?php
    require("../database.php");
    session_start();
    if(isset($_SESSION['userID'])){
        $clientFirstName = "'" . strval($_POST['clientFirstName']) . "'";
        $clientLastName = "'" . strval($_POST['clientLastName']) . "'";
        $clientID = intval($_POST['clientID']);
        $sql = "INSERT INTO IT202_clients (client_first_name, client_last_name, client_id) VALUES ('$_POST[clientFirstName]','$_POST[clientLastName]','$_POST[clientID]')";
        if(mysqli_num_rows(mysqli_query($GLOBALS['con'], "SELECT * FROM IT202_clients WHERE client_id=".$clientID))>0){
            $errormsg = "This ID is already being used.";
            header("Location: ../create_client.php?errormsg=".$errormsg);
        } else {
            if(mysqli_query($GLOBALS['con'], $sql)){
                echo "Records inserted successfully.";
            } else{
                $errormsg = mysqli_error($GLOBALS['con']);
                header("Location: ../create_client.php?errormsg=".$errormsg);
            }
        }
    } else {
        $errormsg = "Photographer not logged in";
        header("Location: ../create_client.php?errormsg=".$errormsg);
    }
