<?PHP
if(isset($_GET['errormsg'])) {
    echo '<div class="alert alert-danger show" role="alert">';
    echo $_GET['errormsg'];
//    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">    <span aria-hidden="true">&times;</span>  </button>';
    echo '</div>';
}
echo '<script type="text/JavaScript">';
echo 'document.getElementById("firstNameInput").value="'.$_GET['firstNameInput'].'";';
echo 'document.getElementById("lastNameInput").value="'.$_GET['lastNameInput'].'";';
echo 'document.getElementById("userIDInput").value="'.$_GET['userIDInput'].'";';
echo 'document.getElementById("passwordInput").value="'.$_GET['passwordInput'].'";';
echo 'document.getElementById("phoneInput").value="'.$_GET['phoneInput'].'";';
echo 'document.getElementById("emailInput").value="'.$_GET['emailInput'].'";';
echo '</script>';
?>
