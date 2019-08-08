<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Send Maintenance Request
Code Adapted From: https://www.freecontactform.com/email_form.php
                   https://www.twilio.com/docs/sms
Last Updated: 8/1/2019
*/

$title = "Rolling Hills Estates: Maintenance Form Sent";
include 'includes/dbconnect.inc.php';
include 'includes/header.inc.php';
// Use Twilio to send SMS notifications
use Twilio\Rest\Client;

// If user or admin email address is set send the form
if(isset($_POST['contact_email']) || isset($_SESSION['UserEmail']) || isset($_SESSION['AdminEmail'])) {
 
    // Email recipient
    $email_to = "maintenancemanaustin@gmail.com";
    // Email Subject
    $email_subject = "Maintenance Form Submission";
 
    // Create a function to display error messages
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please ";
        echo "<a href='maintenance_request.php'>go back </a>";
        echo "and correct these errors";
        die();
    }
    
    // If session variables have been set create the corresponding variables here
    // First Name
    if(isset($_SESSION['UserFirstName'])){
        $firstName = $_SESSION['UserFirstName'];
    } else if(isset($_SESSION['AdminFirstName'])){
        $firstName = $_SESSION['AdminFirstName'];
    } else if(isset($_POST['contact_first_name'])){
        $firstName = $_POST['contact_first_name'];
    // End if-else statements
    }

    // Last Name
    if(isset($_SESSION['UserLastName'])){
        $lastName = $_SESSION['UserLastName'];
    } else if(isset($_SESSION['AdminLastName'])){
        $lastName = $_SESSION['AdminLastName'];
    } else if(isset($_POST['contact_last_name'])){
        $lastName = $_POST['contact_last_name'];
    // End if-else statements
    }

    // Email Address
    if(isset($_SESSION['UserEmail'])){
        $email_from = $_SESSION['UserEmail'];
    } else if(isset($_SESSION['AdminEmail'])){
        $email_from = $_SESSION['AdminEmail'];
    } else if(isset($_POST['contact_email'])){
        $email_from = $_POST['contact_email'];
    // End if-else statements
    }

    // Telephone Number
    if(isset($_SESSION['UserTelephone'])){
        $telephone = $_SESSION['UserTelephone'];
    } else if(isset($_SESSION['AdminTelephone'])){
        $telephone = $_SESSION['AdminTelephone'];
    } else if(isset($_POST['contact_telephone'])){
        $telephone = $_POST['contact_telephone'];
    // End if-else statements
    }

    // Gather the remaining info from the form
    $request_type = $_POST['request_type'];
    $address = $_POST['contact_address'];
    $comments = $_POST['contact_comments'];

    // validation expected data exists
    if(!isset($firstName) ||
        !isset($lastName) ||
        !isset($email_from) ||
        !isset($telephone) ||
        !isset($address) ||
        !isset($comments)) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    // Default error message
    $error_message = "";
    // Email regex
    $email_regex = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    // First/last name regex
    $name_regex = "/^[A-Za-z .'-]+$/";
    // Telephone regex
    $telephone_regex = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im";

 
    // Email does not match regex
    if(!preg_match($email_regex,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    // End if()
    }
    
    // First name does not match regex
    if(!preg_match($name_regex,$firstName)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    // End if()
    }
    
    // Last name does not match regex
    if(!preg_match($name_regex,$lastName)) {
        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    // End if()
    }

    // Telephone number does not match regex
    if(!preg_match($telephone_regex, $telephone)) {
      $error_message .= 'The phone number you have entered does not appear to be valid.<br />';
    // End if()
    }

    // Address field is empty
    if($address == ""){
        $error_message .= 'You must enter an address.<br />';
    // End if()
    }
    
    // Comments are too short
    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered are not long enough.<br />';
    // End if()
    }
    
    // If errors exist display them with the died() function
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    

    // Create the email notification for Rolling Hills Estates
    $email_message = "Form details below.\n\n";
    
    // Create a function to clean data
    function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
    }

    // Add to the email message
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Request Type: ".clean_string($request_type)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
    // Create email headers and send the email
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);


    // Create the email notification for the user
    $email_confirmation .= "Form details below.\n\n";
    $email_confirmation .= "First Name: ".$firstName."\n";
    $email_confirmation .= "Last Name: ".$lastName."\n";
    $email_confirmation .= "Email: ".$email_from."\n";
    $email_confirmation .= "Telephone: ".$telephone."\n";
    $email_confirmation .= "Request Type: ".$request_type."\n";
    $email_confirmation .= "Address: ".$address."\n";
    $email_confirmation .= "Comments: ".$comments."\n\n";
    $email_confirmation .= "Thank you for contacting maintenance at Rolling Hills Estates!\n";
    $email_confirmation .= "We will get back to you as soon as possible, thank you for your patience.\n";
    $email_confirmation .= "For emergencies, please contact:\n";
    $email_confirmation .= "Office: 717-218-1062";
    $email_confirmation .= "Maintenance: 717-462-5751";

 
    // Create email headers and send the email
    $headers = 'From: '.$email_to."\r\n".
    'Reply-To: '.$email_to."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_from, $email_subject, $email_confirmation, $headers);



    // Send a confirmation text to the user
    require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

    // Twilio SID and auth-token
    $sid = 'AC4bcc65babd8b4d9bc81b196a9f52930f';
    $token = '620041ef84ae04274c792450fe81ba60';
    $client = new Client($sid, $token);

    // Use the Twilio client to send the text
    $client->messages->create(
        // Text recipient
        $telephone,
        array(
            // From my number at Twilio
            'from' => '+17175029698',
            // Text message content
            'body' => "Thank you for contacting Rolling Hills Estates! We will get back to you as soon as possible.\nEmergency Contacts:\nOffice: 717-218-1062\nMaintenance: 717-462-5751"
        // Close array()
        )
    // Close messages->create()
    );

    // Create a unique ticket number for the request
    $key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 6), 6));
    $_SESSION['ticket_number'] = $key;

    // Insert the record into the 'maintenance_requests' table
    $sql = "INSERT INTO maintenance_requests(ticket_number, first_name, last_name, email, telephone, request_type, request_address, comments) VALUES ('$key', '$firstName', '$lastName', '$email_from', '$telephone', '$request_type', '$address', '$comments')";
    $result = $conn->query($sql);
    if(!$result){
        echo "Failed to insert record";
    // End if()
    }
// Close PHP
?>
 
<!-- Display the contents of the success page -->
<!-- Open 'Jumbotron' div -->
<div class="jumbotron">
    <!-- Open 'container' div -->
    <div class="container">
        <h1 class="display-4">Thank you for your comments</h1>
        <p class="lead">A member of our staff will contact you as soon as possible</p>
    <!-- Close 'container' div -->
    </div>
<!-- Close 'jumbotron' div -->
</div>

<!-- Redirect the user to the home page -->
<a href="index.php" title="Return Home">Return Home</a>
 
<?php
// End if(isset($_POST['contact_email']) || isset($_SESSION['UserEmail']) || isset($_SESSION['AdminEmail']))
}
?>

<?php
    include 'includes/footer.inc.php';
?>