<!doctype html>
<html lang="en">
<head>
    <title>PPP Login Portal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/custom.css">
</head>
<body>
    <a class="text-white" href="./php/photographer_records.php"><button type="button" class="btn btn-primary float-right">Skip Login</button></a><!-- Remove in Production -->
    <div class="container">
        <div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center">
            <div class="jumbotron semi-transparent-jumbotron-bg col-12 col-md-8 row">
                <div class="col-12" id="formHeader">
                    <h1 class="text-center">Picture Perfect Portraits Login Portal</h1>
                </div>
                <form id="loginForm" class="col-12 row" action="php/formhandlers/login.php" method="post">
                    <!-- First Name Input -->
                    <div class="form-group col-12 col-md-6">
                        <label for="firstNameInput">First Name <span class="required">*</span>:</label>
                        <input type="text" class="form-control" name="firstNameInput" id="firstNameInput" aria-describedby="firstNameInput" placeholder="First name" required pattern="^[a-zA-Z]+$" title="Letters only please">
                    </div>
                    <!-- Last Name Input -->
                    <div class="form-group col-12 col-md-6">
                        <label for="lastNameInput">Last Name <span class="required">*</span>:</label>
                        <input type="text" class="form-control" name="lastNameInput" id="lastNameInput" aria-describedby="lastNameInput" placeholder="Last name" required pattern="^[a-zA-Z]+$" title="Letters only please">
                    </div>
                    <!-- User ID Input-->
                    <div class="form-group col-12 col-md-6">
                        <label for="userIDInput">User ID # <span class="required">*</span>:</label>
                        <input type="text" class="form-control" name="userIDInput" id="userIDInput" aria-describedby="userIDInput" placeholder="User ID" required pattern="^[0-9]+$" title="Numbers only please">
                    </div>
                    <!-- Password Input -->
                    <div class="form-group col-12 col-md-6">
                        <label for="passwordInput">Password <span class="required">*</span>:</label>
                        <input type="password" class="form-control" name="passwordInput" id="passwordInput" aria-describedby="passwordInput" placeholder="Password" required>
                    </div>
                    <!-- Phone Number Input -->
                    <div class="form-group col-12 col-md-6">
                        <label for="phoneInput">Phone Number <span class="required">*</span>:</label>
                        <input type="tel" class="form-control" name="phoneInput" id="phoneInput" aria-describedby="phoneInput" placeholder="Phone Number" required pattern="^\d{3}[-]\d{3}[-]\d{4}$" title="Please follow the format of ###-###-####">
                    </div>
                    <div id="emailForm" class="form-group col-12 col-md-6">
                        <label for="emailInput">Email <span class="required">*</span>:</label>
                        <input type="email" class="form-control" name="emailInput" id="emailInput" aria-describedby="emailInput" placeholder="Email" required="required" title="name@domain.ext">
                    </div>
                    <div class="form-group col-12 col-md-7">
                        <label for="emailRequired">Email Required?</label>
                        <input type="checkbox" id="emailRequired" name="emailRequired" checked>
                    </div>

                    <div class="form-group col-12 col-md-7">
                        <label for="transactionSelect">Select a Transaction:</label>
                        <select class="custom-select" name="transactionSelect" id="transactionSelect">
                            <option>Search A Photographer's Accounts</option>
                            <option>Book A Client's Appointment</option>
                            <option>Place A Client's Order</option> <!-- Give Warning -->
                            <option>Update A Client's Order</option>
                            <option>Cancel A Client's Appointment</option>
                            <option>Cancel A Client's Order</option>
                            <option>Create A New Client Account</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-5 ml-auto align-self-end"> <!-- Content hug bottom right-->
                        <div class="float-right">
                            <button id="loginSubmit" type="submit" name="loginSubmit" class="btn btn-success">Submit</button>
                            <a class="btn btn-warning" href="./index.php" role="button">Restart</a>
                        </div>
                    </div>
                </form>
            </div>
            <?php include("./php/formhandlers/display_error.php"); ?>
        </div>
    </div>


    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script type="text/javascript">
        var checkbox = document.querySelector("input[name=emailRequired]");
        var emailInput = document.getElementById("emailForm");
        var emailFormInput = document.getElementById("emailInput");
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                emailInput.removeAttribute("style");
                emailFormInput.setAttribute("required","");
            } else {
                emailInput.setAttribute("style","display:none;");
                emailFormInput.removeAttribute("required");
            }
        });
    </script>
</body>
</html>