<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Maintenance Requests
Last Updated: 8/1/2019
*/

    $title = "Rolling Hills Estates: Maintenance Requests";
    include 'includes/header.inc.php';
?>


<!-- Open 'jumbotron' div -->
<div class="jumbotron">
    <!-- Open 'container' div -->
    <div class="container">
        <h1 class="display-4">Contact a member of our maintenance team.</h1>
        <p class="lead">Please complete and submit the form below.</p>
    <!-- Close 'container' div -->
    </div>
<!-- Close 'jumbotron' div -->
</div>

<!-- Open 'contact_container' div -->
<div id="contact_container" style='padding-left: 100px; padding-right: 100px;'>
    <!-- Open contact form -->
    <form method="post" action="send_maintenance_form.php">

        <!-- First Name -->
        <?php
            // If user has logged in set first name
            if(isset($_SESSION['UserFirstName'])){
                $firstName = $_SESSION['UserFirstName'];
                echo "<div class='form-group'>
                        <label for='contact_first_name'>First Name:</label>
                        $firstName
                      </div>";
            // If admin has logged in set first name
            } else if(isset($_SESSION['AdminFirstName'])){
                $firstName = $_SESSION['AdminFirstName'];
                echo "<div class='form-group'>
                        <label for='contact_first_name'>First Name:</label>
                        $firstName
                      </div>";
            // If no one has logged in display form input
            } else if(!isset($_SESSION['UserFirstName']) || !isset($_SESSION['AdminFirstName'])) {
                echo "<div class='form-group'>
                        <label for='contact_first_name'>First Name:</label>
                        <input type='text' class='form-control' id='contact_first_name' name='contact_first_name'>
                      </div>";
            // End if-else statements
            }
        // End PHP
        ?>

        <!-- Last Name -->
        <?php
            // If user has logged in set last name
            if(isset($_SESSION['UserLastName'])){
                $lastName = $_SESSION['UserLastName'];
                echo "<div class='form-group'>
                        <label for='contact_last_name'>Last Name:</label>
                        $lastName
                      </div>";
            // If admin has logged in set last name
            } else if(isset($_SESSION['AdminLastName'])){
                $lastName = $_SESSION['AdminLastName'];
                echo "<div class='form-group'>
                        <label for='contact_last_name'>Last Name:</label>
                        $lastName
                      </div>";
            // If no one has logged in display form input
            } else if(!isset($_SESSION['UserLastName']) || !isset($_SESSION['AdminLastName'])) {
                echo "<div class='form-group'>
                        <label for='contact_last_name'>Last Name:</label>
                        <input type='text' class='form-control' id='contact_last_name' name='contact_last_name'>
                      </div>";
            // End if-else statements
            }
        ?>

        <!-- Email Address -->
        <?php
            // If user has logged in set email address
            if(isset($_SESSION['UserEmail'])){
                $email = $_SESSION['UserEmail'];
                echo "<div class='form-group'>
                        <label for='contact_email'>Email Address:</label>
                        $email
                      </div>";
            // If admin has logged in set email address
            } else if(isset($_SESSION['AdminEmail'])){
                $email = $_SESSION['AdminEmail'];
                echo "<div class='form-group'>
                        <label for='contact_email'>Email Address:</label>
                        $email
                      </div>";
            // If no one has logged in display form input
            } else if(!isset($_SESSION['UserEmail']) || !isset($_SESSION['AdminEmail'])) {
                echo "<div class='form-group'>
                        <label for='contact_email'>Email Address:</label>
                        <input type='email' class='form-control' id='contact_email' name='contact_email'>
                      </div>";
            // End if-else statements
            }
        ?>
            
        <!-- Telephone Number -->
        <?php
            // If user has logged in set telephone number
            if(isset($_SESSION['UserTelephone'])){
                $telephone = $_SESSION['UserTelephone'];
                echo "<div class='form-group'>
                        <label for='contact_telephone'>Telephone Number:</label>
                        $telephone
                      </div>";
            // If admin has logged in set telephone number
            } else if(isset($_SESSION['AdminTelephone'])){
                $telephone = $_SESSION['AdminTelephone'];
                echo "<div class='form-group'>
                        <label for='contact_telephone'>Telephone Number:</label>
                        $telephone
                      </div>";
            // If no one has logged in display form input
            } else if(!isset($_SESSION['UserTelephone']) || !isset($_SESSION['AdminTelephone'])) {
                echo "<div class='form-group'>
                        <label for='contact_telephone'>Telephone Number:</label>
                        <input type='text' class='form-control' id='contact_telephone' name='contact_telephone'>
                      </div>";
            // End if-else statements
            }
        ?>

        <!-- Request Type -->
        <!-- Open 'form-group' div -->
        <div class="form-group">
            <label for="request_type">Request Type:</label>
            <!-- Open 'request_type' select box -->
            <select  id="request_type" name="request_type" required>
                <option value="heating_ac">Heating / AC</option>
                <option value="plumbing">Plumbing</option>
                <option value="electric">Electric</option>
                <option value="appliances">Household Appliances</option>
                <option value="other" selected>Other</option>
            <!-- Close 'request_type' select box -->
            </select>
        <!-- Close 'form-group' div -->
        </div>

        <!-- Address -->
        <!-- Open 'form-group' div -->
        <div class="form-group">
            <label for="contact_address">Address:</label>
            <input type="text" class="form-control" id="contact_address" name="contact_address">
        <!-- Close 'form-group' div -->
        </div>

        <!-- Comments -->
        <!-- Open 'form-group' div -->
        <div class="form-group">
            <label for="contact_comments">Description of the problem:</label>
            <textarea class="form-control" rows="5" id="contact_comments" name="contact_comments"></textarea>
        <!-- Close 'form-group' div -->
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-default">Submit</button>

    <!-- Close contact form -->
    </form>
<!-- Close 'contact_container' div -->
</div>
    
<?php
    include 'includes/footer.inc.php';
?>