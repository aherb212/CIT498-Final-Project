<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Database functions
Last Updated: 8/2/2019
*/

// Function for deleting users from the db
function deleteRecord(mysqli $conn, $email){
    $sql = "DELETE FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if(!$result){
        echo "Failed to delete record";
    // End if()
    }
// Close function
}

// Functino for deleting maintenance requests from the db
function delete_maintenance_request(mysqli $conn, $ticket_number){
    $sql = "DELETE FROM maintenance_requests WHERE ticket_number = '$ticket_number'";
    $result = $conn->query($sql);
    if(!$result){
        echo "Failed to delete record";
    // End if()
    }
// Close function
}

// Experimental - Currently not functioning
function create_community_event(mysqli $conn, $event_ID, $event_date, $event_desc){
    $sql = "INSERT INTO events(event_id, date, details) VALUES ('$event_ID', '$event_date', '$event_desc')";
    $result = $conn->query($sql);
    if(!$result){
        echo "Failed to create record";
    // End if()
    }
// Close function
}
// Close PHP
?>
