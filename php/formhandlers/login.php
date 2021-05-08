<?php
    if($_POST) {
        require '../database.php';
        $emailRequired = isset($_POST['emailRequired']);
        if($emailRequired){
            $formArray = [$_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['userIDInput'], $_POST['passwordInput'], $_POST['phoneInput'], $_POST['emailInput']];
        } else {
            $formArray = [$_POST['firstNameInput'], $_POST['lastNameInput'], $_POST['userIDInput'], $_POST['passwordInput'], $_POST['phoneInput']];
        }

        $userFound = false;
        if($result = mysqli_query($GLOBALS['con'], "SELECT * FROM IT202_photographers")) {
            if (mysqli_num_rows($result) > 0) {
                //Look for user
                while ($row = mysqli_fetch_array($result)) {
                    if($emailRequired){
                        $dbarray = [$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]];
                    } else {
                        $dbarray = [$row[0],$row[1],$row[2],$row[3],$row[4]];
                    }

                    if(array_values($dbarray)==array_values($formArray)){
                        session_start();
                        $_SESSION['userID'] = intval($_POST['userIDInput']);
                        $_SESSION['userFirst'] = strval($_POST['firstNameInput']);
                        //User found
                        switch ($_POST['transactionSelect']){
                            case "Search A Photographer's Accounts":
                                header("Location: ../photographer_records.php");
                                break;
                            case "Book A Client's Appointment":
                                header("Location: ../make_appointment.php");
                                break;
                            case "Place A Client's Order":
                                header("Location: ../place_order.php");
                                break;
                            case "Update A Client's Order":
                                header("Location: ../update_order.php");
                                break;
                            case "Cancel A Client's Appointment":
                                header("Location: ../cancel_appointment.php");
                                break;
                            case "Cancel A Client's Order":
                                header("Location: ../cancel_order.php");
                                break;
                            case "Create A New Client Account":
                                header("Location: ../create_client.php");
                                break;
                        }
                        $userFound = true;
                    }
                }
                //User not found
                if($userFound === false){
                    $errormsg = "User not found";
                    header("location:../../index.php?errormsg=".$errormsg."&firstNameInput=".$_POST['firstNameInput']."&lastNameInput=".$_POST['lastNameInput']."&userIDInput=".$_POST['userIDInput']."&passwordInput=".$_POST['passwordInput']."&phoneInput=".$_POST['phoneInput']."&emailInput=".$_POST['emailInput']);
                }
            }
        }

    }
?>
