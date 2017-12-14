<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include("classes/Calendar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book for change weells</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

</head>
<body>

<div class="container-fluid">
    <?php
    $calendar = new Calendar();
    echo $calendar->showDaily();
    ?>
</div>

<!--<div class="container-fluid">-->
<!--    <div class="row">-->
<!--        <h1>CHANGE YOUR WHEELS WITH US</h1>-->
<!--        <div class="col-sm-9 col-sm-offset-2">-->
<!--            <section class="booking">-->
<!--                <form class="booking-form" action="#" method="POST">-->
<!--                    <div class="car-registration">-->
<!--                        <p>Registration number</p>-->
<!--                        <input type="text" name="registration-number" id="registration-number" placeholder="BG025SJ"/>-->
<!--                        <button type="button" class="next">Next</button>-->
<!--                    </div>-->
<!--                    <div class="booking-date">-->
<!--                        <p>Choose your booking date</p>-->
<!--                        <div class='input-group date' id='datepicker'>-->
<!--                            <input name="date" id="date" type='text' class="form-control" />-->
<!--                            <span class="input-group-addon">-->
<!--                                <span class="glyphicon glyphicon-calendar"></span>-->
<!--                            </span>-->
<!--                        </div>-->
<!--                        <div class="form-froup">-->
<!--                            <button type="button" class="next">Next</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="personal-info">-->
<!--                        <p>Personal Informations</p>-->
<!--                        <div class="form-group">-->
<!--                            <input placeholder="First name" type="text" name="first-name" id="first-name" class="first-name" />-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input placeholder="Last name" type="text" name="last-name" id="last-name" class="last-name" />-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input placeholder="Email" type="text" name="email" id="email" class="email" />-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input placeholder="Address" type="text" name="address" id="address" class="address" />-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="checkbox" id="person" name="person" class="person" />-->
<!--                            <span class="person">Person</span>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="checkbox" id="company" name="company" class="company" />-->
<!--                            <span class="company">Company</span>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <button type="button" class="next">Next</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="location-info">-->
<!--                        <p>Choose your location</p>-->
<!--                        <div class="form-group">-->
<!--                            <input type="checkbox" name="our-service" id="our-service" class="our-service" />-->
<!--                            <span class="service">Come to our service</span>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="checkbox" name="your-location" id="your-location" class="your-location" />-->
<!--                            <span class="customer">We come to your location</span>-->
<!--                        </div>-->
<!--                        <input type="text" name="custom-location" id="custom-location" class="custom-location" placeholder="Please enter your location" />-->
<!--                        <button type="submit" class="next">Next</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </section>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->




<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>
