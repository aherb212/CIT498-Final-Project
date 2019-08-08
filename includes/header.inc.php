<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Page Header
Last Updated: 8/6/2019
*/

  session_start();
?>
<!doctype html>
<html lang="en">

<!-- Open Head -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS  first -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Custom CSS third -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Open Title -->
  <title>
    <?php      
         echo "$title";
      // Close PHP
      ?>
  <!-- Close Title -->
  </title>
<!-- Close Head -->
</head>

<!-- Open Body -->
<body>
  <!-- Open Nav Bar -->
  <nav class="navbar navbar-expand-lg navbar-light navColor">
    <a class="navbar-brand" href="index.php">Rolling Hills Estates</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <!-- Home -->
        <li class="nav-item
          <?php
            if($title == "Rolling Hills Estates: Home"){
              echo "active";
            }
          // Close PHP
          ?>
        ">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        <!-- Close list item -->
        </li>

        <!-- About -->
        <li class="nav-item
          <?php
            if($title == "Rolling Hills Estates: About Us"){
              echo "active";
            }
          // Close PHP
          ?>
        ">
          <a class="nav-link" href="about.php">About Us</a>
        <!-- Close list item -->
        </li>

        <!-- Properties -->
        <li class="nav-item
          <?php
            if($title == "Rolling Hills Estates: Properties"){
              echo "active";
            }
          // Close PHP
          ?>
        ">
          <a class="nav-link" href="properties.php">Properties</a>
        <!-- Close list item -->
        </li>

        <!-- Contact -->
        <li class="nav-item
          <?php
            if($title == "Rolling Hills Estates: Contact Us"){
              echo "active";
            }
          // Close PHP
          ?>
        ">
          <a class="nav-link" href="contact.php">Contact Us</a>
        <!-- Close list item -->
        </li>

        <!-- Community Events -->
        <li class="nav-item
          <?php
            if($title == "Rolling Hills Estates: Community Events"){
              echo "active";
            }
          // Close PHP
          ?>
        ">
          <a class="nav-link" href="comEvents.php">Community Events</a>
        <!-- Close list item -->
        </li>

        <!-- If user or admin has logged in display 'maintenance request' button -->
        <?php
          if(isset($_SESSION['currentUser']) || isset($_SESSION['adminUser'])){
            echo "<li class='nav-item'>
                    <a class='nav-link' href='maintenance_request.php'>Maintenance Request</a>
                  </li>";
          // End if()
          }
        // Close PHP
        ?>

        <!-- If user or admin has logged in display 'Rent Manager' button -->
        <?php
          if(isset($_SESSION['currentUser'])){
            echo "<li class='nav-item'>
                    <a class='nav-link' href='https://umh.twa.rentmanager.com/'>Rent Manager</a>
                  </li>";
          // End if()
          }
        // Close PHP
        ?>

        <!-- If an admin has logged in display the 'Admin Panel' button -->
        <?php
          if(isset($_SESSION['adminUser'])){
            echo "<li class='nav-item'>
                    <a class='nav-link' href='index.admin.php'>Admin Panel</a>
                  </li>";
          // End if()
          }
        // Close PHP
        ?>
      
      <!-- Close list of subdomains -->
      </ul>
      
      <!-- If user or admin has logged in change the 'Register' button to 'My Account' -->
      <?php
        if(isset($_SESSION['currentUser']) || isset($_SESSION['adminUser'])){
          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">
          My Account
          </button>';
        } else {
          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
          Register
          </button>';
        // End if-else statement
        }
      // Close PHP
      ?>

      <!-- If user or admin has logged in change the 'Login' button to 'Logout' -->
      <?php
        if(isset($_SESSION['currentUser']) || isset($_SESSION['adminUser'])){
          echo '<a href="includes/logout.inc.php">
          <button type="button" class="btn btn-primary">
          Logout
          </button></a>';
        } else {
          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
          Login
          </button>';
        // End if-else statement
        }
      // End PHP
      ?>  

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <!-- Close navbarSupportedContent -->
    </div>
    <!-- Close nav bar -->
  </nav>