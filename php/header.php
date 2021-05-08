<?php
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="nav-item active"';
    else
        echo 'class="nav-item"';
}

?>
<!doctype html >
<html lang = "en" >
<head>
    <?php echo '<title>'. $Title .'</title>' ?>
    <!-- Required meta tags-->
    <meta charset = "utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">

            <?php
                session_start();
                if(isset($_SESSION['userID'])){
                    echo('<li class="nav-item">');
                    echo('<p class="text-white">Hello '.$_SESSION['userFirst']);
                    echo('</p>');
                    echo('</li>');
                }
            ?>

            <li <?php echoActiveClassIfRequestMatches("photographer_records")?> >
                <a class="nav-link" href="./photographer_records.php">Search DB</a>
            </li>
            <li <?php echoActiveClassIfRequestMatches("make_appointment")?> >
                <a class="nav-link" href="./make_appointment.php">Make Appointment</a>
            </li>
            <li <?php echoActiveClassIfRequestMatches("place_order")?> >
                <a class="nav-link" href="./place_order.php">Place Order</a>
            </li>
            <li <?php echoActiveClassIfRequestMatches("update_order")?> >
                <a class="nav-link" href="./update_order.php">Update Order</a>
            </li>
            <li <?php echoActiveClassIfRequestMatches("cancel_appointment")?> >
                <a class="nav-link" href="./cancel_appointment.php">Cancel Appointment</a>
            </li>
            <li <?php echoActiveClassIfRequestMatches("cancel_order")?> >
                <a class="nav-link" href="./cancel_order.php">Cancel Order</a>
            </li>
            <li <?php echoActiveClassIfRequestMatches("create_client")?> >
                <a class="nav-link" href="./create_client.php">Create Client</a>
            </li>
            <li>
                <a class="nav-link text-danger" href="./formhandlers/logout.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid d-flex flex-column vh-100 ">
