<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Home Page
Last Updated: 8/1/2019
*/

    $title = "Rolling Hills Estates: Home";
    include 'includes/header.inc.php';
?>

<!-- Open 'Jumbotron' div -->
<div class="jumbotron"
  style="background-image: url(https://images.pexels.com/photos/259280/pexels-photo-259280.jpeg?cs=srgb&dl=agriculture-countryside-crop-259280.jpg&fm=jpg); background-size: 100%; height: 500px; background-repeat: no-repeat;">
  <!-- Open 'container' div -->
  <div class="container">
    <h1 class="display-4">Welcome to Rolling Hills Estates</h1>
    <p class="lead">A proud member of the United Mobile Homes family.</p>
  <!-- Close 'container' div -->
  </div>
<!-- Close 'jumbotron' div -->
</div>



<!-- Open 'middle' div -->
<div class="middle">
  <!-- Open 'container' div -->
  <div class="container">
    <!-- Open 'row' div -->
    <div class="row">

      <!-- Open 'col-sm' div -->
      <div class="col-sm">
        <img src="images/RHE_sign.png" alt="about">
        <!-- Open 'col-head' div -->
        <div class="col-head">
          <h3>About Us</h3>
          <!-- Close 'col-head' div -->
        </div>
        <p>Learn more about United Mobile Homes, Inc. and the Rolling Hills Estates community.</p>
        <!-- Open 'more_about' div -->
        <div id="more_about" style="text-align:center;">
          <a class="btn btn-large btn-info" href="about.php">More</a>
        <!-- Close more_about -->
        </div>
      <!-- Close 'col-sm' div -->
      </div>

      <!-- Open 'col-sm' div -->
      <div class="col-sm">
        <img src="images/properties.png" alt="properties">
        <!-- Open 'col-head' div -->
        <div class="col-head">
          <h3>Our Properties</h3>
        <!-- Close 'col-head' div -->
        </div>
        <p>View a list of our properties available for sale or rent.</p>
        <!-- Open 'more_properties' div -->
        <div id="more_properties" style="text-align:center;">
          <a class="btn btn-large btn-info" href="properties.php">More</a>
        <!-- Close 'more_properties' div -->
        </div>
      <!-- Close 'col-sm' div -->
      </div>

      <!-- Open 'col-sm' div -->
      <div class="col-sm">
        <img src="images/contact.png" alt="contact">
        <!-- Open 'col-head' div -->
        <div class="col-head">
          <h3>Contact Us</h3>
        <!-- Close 'col-head' div -->
        </div>
        <p>Contact us with any questions or comments you may have.</p>
        <!-- Open 'more_contact' div -->
        <div id="more_contact" style="text-align:center;">
          <a class="btn btn-large btn-info" href="contact.php">More</a>
        <!-- Close 'more_contact' div -->
        </div>
      <!-- Close 'col-sm' div -->
      </div>
    <!-- Close 'row' div -->
    </div>
  <!-- Close 'container' div -->
  </div>
<!-- Close 'middle' div -->
</div>

<!-- Optional JavaScript -->
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

<!-- Bootstrap -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<?php
  include 'includes/footer.inc.php';
?>