<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - New User Registration
Last Updatd 8/6/2019
*/
    // Connect to the db
    include 'dbconnect.inc.php';
    
    // Check that all the fields have been filled and create the necessary variables
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = test_input($_POST['rEmail']);
        $password = test_input($_POST['rPassword']);
        $firstName = test_input($_POST['rFirstName']);
        $lastName = test_input($_POST['rLastName']);
        $telephone = test_input($_POST['telephone']);
        $reskey = test_input($_POST['reskey']);
    // End if()
    }

    // Create test_inpput function for validation against XSS
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    // Close function
    }

    // Create hashed pw variable
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Select the emails from the user table
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // If email exists already, display error message
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        echo "The email address you've entered is already registered - Please log in"; 
        $stmt->close();

    } else {
        // Select the resident keys from the db
        $stmt = $conn->prepare("SELECT residentKey FROM reskeys WHERE residentKey = ?");
        $stmt->bind_param("s", $reskey);
        $stmt->execute();

        // If the resident key is valid insert the record into the db
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $stmt = $conn->prepare("INSERT INTO users (email, password, firstName, lastName, telephone, reskey) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $email, $hashedPassword, $firstName, $lastName, $telephone, $reskey);
            $stmt->execute();

            // Set session variables
            $_SESSION['currentUser'] = $firstName;
            $_SESSION['currentUserEmail'] = $email;
            echo "Registration successful!";
            // Close statement
            $stmt->close();
        // End if()
        }
    // End if-else statement
    }
    // Close connection to the db
    $conn->close();
// Close PHP
?>