<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Community Events Calendar
Code Adapted From: https://code-boxx.com/simple-php-calendar-events/#sec-db
Last Updated: 8/1/2019
*/

    $title = "Rolling Hills Estates: Community Events";
    include 'includes/header.inc.php';
?>

<?php
// Create an array of months
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// Set default month/year to current month/year
$unix = strtotime("today");
$monthNow = date("M", $unix);
$yearNow = date("Y", $unix); ?>
<!DOCTYPE html>

<!-- Page content -->
<html>
  <!-- Open header -->
  <head>
    <title>Rolling Hills Estates: Community Events</title>
    <script src="js/eventsCal.js"></script>
    <link href="css/style.css" rel="stylesheet">
  <!-- Close header -->
  </head>

  <!-- Open body -->
  <body>
    <!-- Date selector -->
    <!-- Open 'selector' div -->
    <div id="selector">

      <!-- Open 'month' select box -->
      <select id="month"><?php
        foreach ($months as $m) {
          printf("<option %svalue='%s'>%s</option>", 
            $m==$monthNow ? "selected='selected' " : "", $m, $m
          );
        }
      // Close 'month' select box
      ?></select>

      <!-- Open 'year' select box -->
      <select id="year"><?php
        // Display a +/-10 year range (can be adjusted if needed)
        for ($y=$yearNow-10; $y<=$yearNow+10; $y++) {
          printf("<option %svalue='%s'>%s</option>",
            $y==$yearNow ? "selected='selected' " : "", $y, $y
          // End printf
          );
        // End for()
        }
      // Close 'year' select box
      ?></select>

      <!-- Set month/year button -->
      <input type="button" value="SET" onclick="cal.list()"/>
    <!-- Close 'selector' div -->
    </div>
    
    <!-- Calendar -->
    <!-- Open 'calcontainer' div -->
    <div id="calcontainer">
      <!-- Open 'container' div -->
      <div id="container">
      
      <!-- Close 'containe' div -->
      </div>
    <!-- Close 'calcontainer' div -->
    </div>

    <!-- Events -->
    <!-- Open 'event' div -->
    <div id="event">

    <!-- Close 'event' div -->
    </div>
  <!-- Close body -->
  </body>
<!-- Close HTML -->
</html>

<?php
    include 'includes/footer.inc.php';
?>