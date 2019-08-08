<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Connect to wlbolhjp_Rolling_Hills_Estates_DB
Last Updated: 8/2/2019
*/

// Start the session
session_start();

//Create the necessary variables to connect
$host = "localhost";
$db_user = "wlbolhjp_user01";
$db_password = "user01";
$db_name = "wlbolhjp_Rolling_Hills_Estates_DB";

//Connect to the database
$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

// Connection error
if(!$conn){
    echo "Error: there was a problem, try again";
// End if()
}
// Close PHP
?>