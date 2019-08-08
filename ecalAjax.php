<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Community Events Calendar
Adapted From: https://code-boxx.com/simple-php-calendar-events/#sec-db
Last Updated: 8/1/2019
*/

include 'includes/ecaldbconnect.inc.php';
require PATH_LIB . "ecalEvents.inc.php";
$calLib = new Events();
 
// Ajax requests
switch ($_POST['req']) {
  default :
    echo "ERR";
    break;

  // Creating the calendar
  case "list":

    // Calendar calculations
    // Start and end of month + number of days in month
    $startMonth = sprintf("01 %s %s", $_POST['month'], $_POST['year']);
    $unix = strtotime($startMonth);
    $daysInMonth = date("t", $unix);
    $endMonth = sprintf("%s %s %s", $daysInMonth, $_POST['month'], $_POST['year']);

    // Set first and last day of month
    $firstDayOfMonth = date("N", strtotime($startMonth));
    $lastDayOfMonth = date("N", strtotime($endMonth));

    // Set YYYY-MM date format for later use
    $ym = date("Y-m-", $unix);

    // Display all events for the selected period
    $events = $calLib->getRange($ym."01", $ym.$daysInMonth);

    // Drawing calculations
    // Determine the number of blank squares before start of month
    $squares = [];
    if ($firstDayOfMonth != 7) {
      for ($i=0; $i<$firstDayOfMonth; $i++) {
        $squares[] = "b";
      // End for()
      }
    // End if()
    }

    // Populate the days of the month
    for ($i=1; $i<=$daysInMonth; $i++) {
      $squares[] = $i;
    // End for()
    }

    // Determine the number of blank squares after end of month
    if ($lastDayOfMonth != 6) {
      $blanks = $lastDayOfMonth==7 ? 6 : 6-$lastDayOfMonth;
      for ($i=0; $i<$blanks; $i++) {
        $squares[] = "b";
      // end for()
      }
    // end if() 
    }
// Close PHP
?>

<!-- Open 'calendar' table -->
<table id="calendar">
  <tr class="day">
    <td>Sun</td> <td>Mon</td> <td>Tue</td> <td>Wed</td>
    <td>Thur</td> <td>Fri</td> <td>Sat</td>
  </tr>
  <tr><?php
    $total = count($squares);
    for ($i=1; $i<=$total; $i++) {
      $thisDay = $squares[$i-1];
      if ($thisDay=="b") {
        echo "<td class='blank'></td>";
      } else {
        $fullDay = sprintf("%s%02u", $ym, $thisDay);
        printf("<td onclick=\"cal.show('%s')\">%s%s</td>", 
          $fullDay, $thisDay,
          $events[$fullDay] ? "<div class='evt'>" . $events[$fullDay] . "</div>" : ""
        // End printf
        );
      // End if-else
      }
      if ($i!=$total && $i%7==0) { 
        echo "</tr><tr>"; 
      // End if()
      }
    // End for()
    }
  // Close php
  ?></tr>
<!-- Close 'calendar' table -->
</table>
<?php break;

  // Show the event when the day is selected
  case "show" :
    $evt = $calLib->get($_POST['date']); ?>
    <!-- Open event form -->
    <form onsubmit="return cal.save()">
      <h1><?=$evt==false?"ADD":"EDIT"?> EVENT</h1>
      <div id="evt-date"><?=$_POST['date']?></div>
      <textarea id="evt-details" required><?=$evt==false?"":$evt?></textarea>
      <input type="button" value="Delete" onclick="cal.del()"/>
      <input type="submit" value="Save"/>
    <!-- Close event form -->
    </form>
    <?php break;

  // Save the event when 'save' is selected
  case "save" :
    echo $calLib->save($_POST['date'], $_POST['details']) ? "OK" : "ERR" ;
    break;

  // Delete the event when 'delete' is selected
  case "del" :
    echo $calLib->delete($_POST['date']) ? "OK" : "ERR" ;
    break;
    
// Close switch()
}
// Close PHP
?>