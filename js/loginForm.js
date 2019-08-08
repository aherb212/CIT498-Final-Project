/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Existing User Login
Last Updated 8/6/2019
*/

// Start ready function
$(document).ready(function () {
    // When submit is selected
    $(document).on('click', '#lSubmit', function (e) {
        //stops the submit from functioning normal
        e.preventDefault();

        //Global variables
        // Email
        var ellEmail = document.getElementById('lEmail');
        var elErrorLEmail = document.getElementById('errorLEmail');

        // Password
        var ellPassword = document.getElementById('lPassword');
        var elErrorLPassword = document.getElementById('errorLPassword');

        // General Error
        var elError = document.getElementById('lError');

        // Submit
        var elSubmit = document.getElementById('lSubmit');

        //Event Listeners
        ellEmail.addEventListener('blur', validateLEmail, false);
        ellPassword.addEventListener('blur', validateLPassword, false);
        elSubmit.addEventListener('click', validateLoginForm, false);


        //Email validation function
        function validateLEmail() {

            // Email field is empty
            if (ellEmail.value == "") {
                elErrorLEmail.innerHTML = "<p class=\"alert alert-danger\">You must enter an email address.</p>";
                return false;
            // No problems
            } else {
                elErrorLEmail.innerHTML = "";
            // End if-else statement
            }
        // Close function
        }

        // Password validation Function
        function validateLPassword() {

            // Password field is empty
            if (ellPassword.value == "") {
                elErrorLPassword.innerHTML = "<p class=\"alert alert-danger\">You must enter a password.</p>";
                return false;
            // No Problems
            } else {
                elErrorLPassword.innerHTML = "";
            // End if-else statement
            }
        // Close function
        }

        // Form Validation Function
        function validateLoginForm() {

            // Both fields are empty
            if (ellEmail.value == "" || ellPassword.value == "") {
                elError.innerHTML = "<p class=\"alert alert-danger\">All fields are required!</p>";
                return false;
            // Log the user in
            } else {
                elError.innerHTML = "";
                $.ajax({
                    url: 'includes/login.inc.php',
                    type: 'POST',
                    data: $('#loginForm').serialize(),
                    success: function (response) {
                        // Login successful, close modal
                        if (response == 'Login successful!' || response == 'Admin login successful!') {
                            $('#lSubmit').html('Logging in...'); //changes the value of the button
                            $('#lError').html('<div class="alert alert-success">' + response + '</div>');
                            setTimeout('window.location.href="index.php";', 4000);
                        // Display error message
                        } else {
                            $('#lError').fadeIn(1000, function () {
                                $('#lError').html('<div class="alert alert-danger">' + response + '</div>');
                                $('#lSubmit').html('Login');
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