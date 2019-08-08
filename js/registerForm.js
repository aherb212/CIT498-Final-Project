/* 
Ausitn Herb
CIT498 Final Project
Rolling Hills Estates - New User Registration
Last Updated: 8/6/2019
*/

// Start ready function
$(document).ready(function () {
    // When submit is selected
    $(document).on('click', '#rSubmit', function (e) {
        //stops the submit from functioning normal
        e.preventDefault();
        
        //Global variables
        //Email
        var elrEmail = document.getElementById('rEmail');
        var elErrorREmail = document.getElementById('errorREmail');

        //Password
        var elrPassword = document.getElementById('rPassword');
        var elErrorRPassword = document.getElementById('errorRPassword');
        
        //Confirm Password
        var elrConfirmPassword = document.getElementById('rConfirmPassword');
        var elErrorRConfirmPassword = document.getElementById('errorRConfirmPassword');

        //First Name
        var elrFirstName = document.getElementById('rFirstName');
        var elErrorRFirstName = document.getElementById('errorRFirstName');

        //Last Name
        var elrLastName = document.getElementById('rLastName');
        var elErrorRLastName = document.getElementById('errorRLastName');

        //Telephone
        var elTelephone = document.getElementById('telephone');
        var elErrorTelephone = document.getElementById('errorTelephone');

        //Resident Key
        var elResKey = document.getElementById('reskey');
        var elErrorResKey = document.getElementById('errorResKey');

        //General Error
        var elError = document.getElementById('rError');

        //Submit Button
        var elSubmit = document.getElementById('rSubmit');

        //Event Listeners
        elSubmit.addEventListener('click', validateREmail);
        elSubmit.addEventListener('click', validateRPassword);
        elSubmit.addEventListener('click', validateRConfirmPassword);
        elSubmit.addEventListener('click', validateRFirstName);
        elSubmit.addEventListener('click', validateRLastName);
        elSubmit.addEventListener('click', validateTelephone);
        elSubmit.addEventListener('click', validateResKey);
        elSubmit.addEventListener('click', validateRegisterForm);
        
        
        //Email validation function
        function validateREmail() {

            // Email Regex
            var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            // Email field is empty
            if (elrEmail.value == "") {
                elErrorREmail.innerHTML = "<p class=\"alert alert-danger\">You must enter an email address.</p>";
                return false;
            // Email does not match regex
            } else if (!elrEmail.value.match(regEmail)) {
                elErrorREmail.innerHTML = "<p class=\"alert alert-danger\">You must enter a valid email address.</p>";
                return false;
            // No problems
            } else {
                elErrorREmail.innerHTML = "";
            // End if-else statements
            }
        // Close function
        }

        // Password Validation Function
        function validateRPassword() {

            // Password Regex
            var regPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[a-zA-Z!#$%&? "])[a-zA-Z0-9!#$%&?]{8,20}$/;

            // Password field is empty
            if (elrPassword.value == "") {
                elErrorRPassword.innerHTML = "<p class=\"alert alert-danger\">You must enter a password.</p>";
                return false;
            // Password does not match regex
            } else if (!elrPassword.value.match(regPassword)) {
                elErrorRPassword.innerHTML = "<p class=\"alert alert-danger\">You must enter a valid password.</p>";
                return false;
            // No problems
            } else {
                elErrorRPassword.innerHTML = "";
            // End if-else statements
            }
        // Close function
        }

        // Confirm Password Validation Function
        function validateRConfirmPassword() {
            
            // Confirm password field is empty
            if (elrConfirmPassword.value == "") {
                elErrorRConfirmPassword.innerHTML = "<p class=\"alert alert-danger\">You must enter a confirm password.</p>";
                return false;
            // Confirm password doesnt match password
            } else if (elrPassword.value !== elrConfirmPassword.value) {
                elErrorRConfirmPassword.innerHTML = "<p class=\"alert alert-danger\">Confirm password must match password.</p>";
                return false;
            // No problems
            } else {
                elErrorRConfirmPassword.innerHTML = "";
            // End if-else statements
            }
        // Close function
        }

        // First Name Validation Function
        function validateRFirstName() {

            // First name field is empty
            if (elrFirstName.value == "") {
                elErrorRFirstName.innerHTML = "<p class=\"alert alert-danger\">You must enter a first name.</p>";
                return false;
            // No problems
            } else {
                elErrorRFirstName.innerHTML = "";
            // End if-else statement
            }
        // Close function
        }

        // Last Name Validation Function
        function validateRLastName() {

            // Last name field is empty
            if (elrLastName.value == "") {
                elErrorRLastName.innerHTML = "<p class=\"alert alert-danger\">You must enter a last name.</p>";
                return false;
            // No problems
            } else {
                elErrorRLastName.innerHTML = "";
            // End if-else statement
            }
        // Close function
        }

        // Telephone Number Validation Function
        function validateTelephone() {

            // Telephone Regex
            var regTelephone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

            // Telephone field is empty
            if (elTelephone.value == "") {
                elErrorTelephone.innerHTML = "<p class=\"alert alert-danger\">You must enter a telephone number.</p>";
                return false;
            // Telephone number does not match regex
            }else if(!elTelephone.value.match(regTelephone)) {
                elErrorTelephone.innerHTML = "<p class=\"alert alert-danger\">You must enter a valid telephone number.</p>";
                return false; 
            // No problems
            }else{
                elErrorTelephone.innerHTML = "";
            // End if-else statements
            }
        // Close function
        }

        // Resident Key Validation Function
        function validateResKey(){

            // Resident key field is empty
            if(elResKey.value == ""){
                elErrorResKey.innerHTML = "<p class=\"alert alert-danger\">You must enter a resident key.</p>"
                return false;
            // No problems
            } else {
                elErrorResKey.innerHTML = "";
            // End if-else statement
            }
        // Close function
        }

        // Form Validation Function
        function validateRegisterForm() {

            // All fields are empty
            if (elrEmail.value == "" || elrPassword.value == "" || elrConfirmPassword.value == "" || elrFirstName.value == "" || elrLastName.value == "" || elTelephone.value == "") {
                elError.innerHTML = "<p class=\"alert alert-danger\">All fields are required!</p>";
                return false;
            // Validation error triggered
            }else if(validateREmail() == false || validateRPassword() == false || validateRConfirmPassword() == false || validateRFirstName() == false || validateRLastName() == false || validateTelephone() == false || validateResKey() == false){ 
                elError.innerHTML = "<p class=\"alert alert-danger\">Invalid Input</p>";
                return false;
            // Create the new user
            }else {
                elError.innerHTML = "";
                $.ajax({
                    url: 'includes/register.inc.php',
                    type: 'POST',
                    data: $('#registerForm').serialize(),
                    success: function (response) {
                        // Registration successfull close modal
                        if (response == 'Registration successful!') {
                            $('#rSubmit').html('Logging in...'); //changes the value of the button
                            $('#rError').html('<div class="alert alert-success">' + response + '</div>');
                            setTimeout('window.location.href="index.php";', 4000);
                        // Display error message
                        } else {
                            $('#rError').fadeIn(1000, function () {
                                $('#rError').html('<div class="alert alert-danger">' + response + '</div>');
                                $('#rSubmit').html('Register');
                            });
                        // End if-else statement
                        }
                    // Close function
                    }
                //end ajax function
                }); 
                return false;
            // End if-else statement
            }
        // Close function
        }
    // end onclick submit
    }); 
//end ready function
}); 