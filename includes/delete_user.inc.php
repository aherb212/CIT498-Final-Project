<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Delete Existing User
Code Adapted From: https://stackoverflow.com/questions/43286387/adding-a-delete-button-in-php-on-each-row-of-a-mysql-table/43286487
Last Updated: 8/6/2019
*/
    include 'dbconnect.inc.php';
    include 'dbfunctions.inc.php';

    // Default email
    $email = '';
    // Get email if available
    if(!empty($_GET['email'])){
        $email = $_GET['email'];
    }

    // Use deleteRecord function to delete record based on email
    deleteRecord($conn, $email);

    // Direct the user back to the admin control panel
    header('Location: http://cit351-01.aherb.info/CIT498_Final_Project/index.admin.php');
    die;
// End PHP
?>