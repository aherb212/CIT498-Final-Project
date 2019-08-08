<?php
/* 
Austin Herb
CIT498 Final Project
Administrator Control Panel
Last Updated: 7/31/2019
*/

  include 'includes/dbconnect.inc.php';
  include 'includes/dbfunctions.inc.php';

// If an admin has not logged in, redirect the user to the home page
  if(!isset($_SESSION['adminUser'])){
    header("Location: index.php");
  }

// Page title and header
  $title = "Rolling Hills Estates: Admin Panel";
  include 'includes/header.inc.php';
  
?>



<!-- Jumbotron -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Welcome <?php echo $_SESSION['adminUser']; ?></h1>
        <p class="lead">Rolling Hills Estates Administrators Panel</p>
        <!-- Close container -->
    </div>
    <!-- Close jumbotron -->
</div>



<!-- Open the 'admin_panel' section -->
<section id = "admin_panel">

  <!-- Display the exisitng user accounts -->
  <!-- Open the 'existing_user_container' div -->
  <div class = "existing_users_container">

    <h1>Manage existing users:</h1>
    
    <!-- Open the 'existing_users_table' -->
    <table style = "width:75%" class = "existing_users_table" name = "existing_users_table">
      <tr>
        <th>Email:</th>
        <th>First Name:</th>
        <th>Last Name:</th>
        <th>Telephone:</th>
        <th>Resident Key:</th>
        <th>User Level:</th>
      </tr>

      <?php
        // Delete record based on email if the admin selects 'delete'
        if(isset($_POST['delete'])){
          $email = $_POST['email'];
          $sql = sprintf("DELETE FROM users WHERE email = '".$email."'");
          $result = $conn->query($sql);
          echo "Account has been deleted.";
        }

        // Display all the rows in the 'users' table
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $email = $row['email'];
            
            echo "<tr>";
              echo "<td>" .$row['email']. "</td>";
              echo "<td>" .$row['firstName']. "</td>";
              echo "<td>" .$row['lastName']. "</td>";
              echo "<td>" .$row['telephone']. "</td>";
              echo "<td>" .$row['reskey']. "</td>";
              echo "<td>" .$row['userlevel']. "</td>";
              ?><td><a href='includes/delete_user.inc.php?email=<?php echo $email;?>'>Delete</a></td><?php
            echo "</tr>";

          // end while()
          }
        // end if()
        } else {
          // No results found
          echo "0 results";
        // end else{}
        }
      // Close PHP
      ?>
    <!-- Close 'existing_users_table' -->
    </table>
  <!-- Close the 'existing_users_container' div -->
  </div>


  
  <!-- Display the submitted maintenance requests  -->
  <!-- Open the 'maintenance_requests_container' div -->
  <div class = "maintenance_requests_container">

    <h1>Manage submitted maintenance requests:</h1>
    
    <!-- Open 'maintenance_requests_table' -->
    <table style = "width:75%" class = "maintenance_requests_table" name = "maintenance_requests_table">
      <tr>
        <th>Ticket Number:</th>
        <th>First Name:</th>
        <th>Last Name:</th>
        <th>Email:</th>
        <th>Telephone:</th>
        <th>Request Type:</th>
        <th>Address:</th>
        <th>Comments:</th>
      </tr>

      <?php
        // Delete record based on ticket number if the admin selects 'delete'
        if(isset($_POST['delete'])){
          $ticket_number = $_POST['ticket_number'];
          $sql = sprintf("DELETE FROM maintenance_requests WHERE ticket_number = '".$ticket_number."'");
          $result = $conn->query($sql);
          echo "Request has been deleted.";
        }

        // Select all the rows from the 'maintenance_requests' table
        $sql = "SELECT * FROM maintenance_requests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $ticket_number = $row['ticket_number'];

            echo "<tr>";
              echo "<td>" .$row['ticket_number']. "</td>";
              echo "<td>" .$row['first_name']. "</td>";
              echo "<td>" .$row['last_name']. "</td>";
              echo "<td>" .$row['email']. "</td>";
              echo "<td>" .$row['telephone']. "</td>";
              echo "<td>" .$row['request_type']. "</td>";
              echo "<td>" .$row['request_address']. "</td>";
              echo "<td>" .$row['comments']. "</td>";
              ?><td><a href='includes/delete_maintenance_request.inc.php?ticket_number=<?php echo $ticket_number;?>'>Delete</a></td><?php
            echo "</tr>";

          // end while()
          }
        // end if() 
        } else {
          // No results found
          echo "0 results";
        // end else{}
        }
      // Close PHP
      ?>
    <!-- Close 'maintenance_requests_table' -->
    </table>
  <!-- Close the 'maintenance_requests_container' div -->
  </div>



  <!-- Display the created community events -->
  <!-- Open the 'comunity_events_container' div -->
  <div class = "community_events_container">

    <h1>Manage community events:</h1>

    <!-- Open 'community_events_table' -->
    <table style = "width:75%" class = "community_events_table" name = "community_events_table">
      <tr>
        <th>Event ID:</th>
        <th>Date:</th>
        <th>Details:</th>
      </tr>

      <?php
        // Display all the rows in the 'events' table
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
              echo "<td>" .$row['event_ID']. "</td>";
              echo "<td>" .$row['date']. "</td>";
              echo "<td>" .$row['details']. "</td>";
            echo "</tr>";

          // end while()
          }
        // end if()
        } else {
          // No results found
          echo "0 results";
        // end else{}
        }  

        // Close connection to Rolling_Hills_Estates_DB
        $conn->close();
      // End PHP
      ?>
    <!-- Close 'community_events_table' -->
    </table>
  <!-- Close the 'community_events_container' div -->
  </div>
<!-- Close the 'admin_pannel' section -->
</section>

<?php
  include 'includes/footer.inc.php';
?>