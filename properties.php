<?php
/* 
Austin Herb
CIT498 Final Project
Rolling Hills Estates - Available Properties
Last Updated: 8/1/2019
*/

    $title = "Rolling Hills Estates: Properties";
    include 'includes/header.inc.php';
?>

<!-- Open 'Jumbotron' div -->
<div class="jumbotron">
    <!-- Open 'container' div -->
    <div class="container">
        <h1 class="display-4">Properties at Rolling Hills Estates</h1>
        <p class="lead">View our properties available for rent or sale.</p>
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

            <!-- Property 01 -->
            <!-- Open 'col-sm' div -->
            <div class="col-sm">
                <!-- Open 'property_photo' div -->
                <div class="property_photo">
                    <img src="images/Property01.png" alt="property01">
                <!-- Close 'property_photo' div -->
                </div>
                <!-- Open 'property_details' div -->
                <div class="property_details">
                    <h3>10 Tip Top Circle</h3>
                    <hr>
                    <ul>
                        <li>Size: 16'x76'</li>
                        <li>Bedrooms: 3</li>
                        <li>Bathrooms: 2</li>
                        <li>Garage: No</li>
                        <li>Asking Price: $70,000</li>
                        <li>Available for Rent: Yes</li>
                    </ul>
                <!-- Close 'property_details' div -->
                </div>
                <!-- Open 'more_property01' div -->
                <div id="more_property01" style="text-align:center;">
                    <a class="btn btn-large btn-info" href="contact.html">More</a>
                <!-- Close 'more_property01' div -->
                </div>
            <!-- Close 'col-sm' div -->
            </div>
            
            <!-- Property 02 -->
            <!-- Open 'col-sm' div -->
            <div class="col-sm">
                <!-- Open 'property_photo' div -->
                <div class="property_photo">
                    <img src="images/Property02.png" alt="property02">
                <!-- Close 'property_photo' div -->
                </div>
                <!-- Open 'property_details' div -->
                <div class="property_details">
                    <h3>25 Tip Top Circle</h3>
                    <hr>
                    <ul>
                        <li>Size: 25'x75'</li>
                        <li>Bedrooms: 3</li>
                        <li>Bathrooms: 2.5</li>
                        <li>Garage: No</li>
                        <li>Asking Price: $85,000</li>
                        <li>Available for Rent: Yes</li>
                    </ul>
                <!-- Close 'property_details' div -->
                </div>
                <!-- Open 'more_property02' div -->
                <div id="more_property02" style="text-align:center;">
                    <a class="btn btn-large btn-info" href="contact.html">More</a>
                <!-- Close 'more_property02' div -->
                </div>
            <!-- Close 'col-sm' div -->
            </div>

            <!-- Property 03 -->
            <!-- Open 'col-sm' div -->
            <div class="col-sm">
                <!-- Open 'property_photo' div -->
                <div class="property_photo">
                    <img src="images/Property03.png" alt="property03">
                <!-- Close 'property_photo' div -->
                </div>
                <!-- Open 'property_details' div -->
                <div class="property_details">
                    <h3>13 Blair Court</h3>
                    <hr>
                    <ul>
                        <li>Size: 25'x80'</li>
                        <li>Bedrooms: 3</li>
                        <li>Bathrooms: 2.5</li>
                        <li>Garage: No</li>
                        <li>Asking Price: $78,500</li>
                        <li>Available for Rent: No</li>
                    </ul>
                <!-- Close 'property_details' div -->
                </div>
                <!-- Open 'more_property03' div -->
                <div id="more_property03" style="text-align:center;">
                    <a class="btn btn-large btn-info" href="contact.html">More</a>
                <!-- Close 'more_property03' div -->
                </div>
            <!-- Close 'col-sm' div -->
            </div>

            <!-- Property 04 -->
            <!-- Open 'col-sm' div -->
            <div class="col-sm">
                <!-- Open 'property_photo' div -->
                <div class="property_photo">
                    <img src="images/Property04.png" alt="property04">
                <!-- Close 'property_photo' div -->
                </div>
                <!-- Open 'property_details' div -->
                <div class="property_details">
                    <h3>18 John Drive</h3>
                    <hr>
                    <ul>
                        <li>Size: 16'x76'</li>
                        <li>Bedrooms: 2</li>
                        <li>Bathrooms: 2</li>
                        <li>Garage: No</li>
                        <li>Asking Price: $69,900</li>
                        <li>Available for Rent: Yes</li>
                    </ul>
                <!-- Close 'property_details' div -->
                </div>
                <!-- Open 'more_property04' div -->
                <div id="more_property04" style="text-align:center;">
                    <a class="btn btn-large btn-info" href="contact.html">More</a>
                <!-- Close 'more_property04' div -->
                </div>
            <!-- Close 'col-sm' div -->
            </div>

        <!-- Close 'row' div -->
        </div>
    <!-- Close 'container' div -->
    </div>
<!--Close 'middle' div  -->
</div>

<?php
    include 'includes/footer.inc.php';
?>