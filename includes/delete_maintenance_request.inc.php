<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Delete Maintenance Request
Code Adapted From: https://stackoverflow.com/questions/43286387/adding-a-delete-button-in-php-on-each-row-of-a-mysql-table/43286487
Last Updated 8/6/2019
*/
    include 'dbconnect.inc.php';
    include 'dbfunctions.inc.php';

    // Default ticket number
    $ticket_number = '';
    // Get ticket number if available
    if(!empty($_GET['ticket_number'])){
        $ticket_number = $_GET['ticket_number'];
    }

    // Use delete_maintenance_request function to delete record based on ticket number
    delete_maintenance_request($conn, $ticket_number);

    // Direct the user back to the admin control panel
    header('Location: http://cit351-01.aherb.info/CIT498_Final_Project/index.admin.php');
    die;
// Close PHP
?>