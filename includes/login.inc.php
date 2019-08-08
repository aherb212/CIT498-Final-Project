<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Existing User Login
Last Updated: 8/6/2019
*/
    // Connect to the db
    include 'dbconnect.inc.php';
    
    // Check if the email and password have been set and create the necessary variables
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = test_input($_POST['lEmail']);
        $password = test_input($_POST['lPassword']);
    // End if()
    }

    //Create test_input function for validation against XSS
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    // Close function
    }

    // Retrieve all the records in the user table
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Find the record with matching email
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $row = $result->fetch_row();

        // Assign the row values to variables
        $email = $row[0];
        $hashedPassword = $row[1];
        $firstName = $row[2];
        $lastName = $row[3];
        $telephone = $row[4];
        $reskey = $row[5];
        $userLevel = $row[6];
        
        // Check if a standard user has logged in
        if(password_verify($password, $hashedPassword) && $userLevel !=1){
            $_SESSION['currentUser'] = $row[2];

            $_SESSION['UserFirstName'] = $firstName;
            $_SESSION['UserLastName'] = $lastName;
            $_SESSION['UserEmail'] = $email;
            $_SESSION['UserTelephone'] = $telephone;
            $_SESSION['UserLevel'] = $userLevel;
            echo "Login successful!";   
        // Check if an administrative user has logged in 
        } else if(password_verify($password, $hashedPassword) && $userLevel == 1){
            $_SESSION['adminUser'] = $row[2];

            $_SESSION['AdminFirstName'] = $firstName;
            $_SESSION['AdminLastName'] = $lastName;
            $_SESSION['AdminEmail'] = $email;
            $_SESSION['AdminTelephone'] = $telephone;
            $_SESSION['UserLevel'] = $userLevel;
            echo "Admin login successful!";
        // Email and password do not match - display login error
        } else {
            echo "Incorrect username and password - try again!"; 
            $stmt->close();  
        // End if-else statements
        }
    // Email could not be found - display login error
    }else{
        echo "Login error - try again!"; 
        $stmt->close();  
    // End if-else statement
    }
    
    // Close connection to the db
    $conn->close();
// Close PHP
?>