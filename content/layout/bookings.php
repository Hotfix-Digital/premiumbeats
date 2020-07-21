<?php
/**
 * Get news posts available
 */

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    if($_POST['bdate'] && $_POST['time'] && $_POST['description'] && $_POST['promoter'] && $_POST['venue'] && $_POST['street1'] && $_POST['street2'] && $_POST['region'] && $_POST['city'] && $_POST['code'] && $_POST['capacity'] && $_POST['attendance'] && $_POST['event'] && $_POST['duration'] && $_POST['contactperson'] && $_POST['contactemail'] && $_POST['contactnumber']) {
        $bdate = $_POST['bdate'];
        $time = $_POST['time'];
        $description = $_POST['description'];
        $promoter = $_POST['promoter'];
        $venue = $_POST['venue'];
        $street1 = $_POST['street1'];
        $street2 = $_POST['street2'];
        $region = $_POST['region'];
        $city = $_POST['city'];
        $code = $_POST['code'];
        $capacity = $_POST['capacity'];
        $attendance = $_POST['attendance'];
        $event = $_POST['event'];
        $duration = $_POST['duration'];
        $contactperson = $_POST['contactperson'];
        $contactemail = $_POST['contactemail'];
        $contactnumber = $_POST['contactnumber'];

        $to = "luphondog@gmail.com, princeradebe@gmail.com";
        $subject = "Booking Request";

        $message = "
        <html>
        <head>
        <title>Booking Request</title>
        </head>
        <body>
        <p>This email contains HTML Tags!</p>
        <ul>
        <li>$bdate</li>
        <li>$time</li>
        <li>$description</li>
        <li>$street1</li>
        <li>$street2</li>
        <li>$region</li>
        <li>$city</li>
        <li>$code</li>
        <li>$capacity</li>
        <li>$attendance</li>
        <li>$event</li>
        <li>$duration</li>
        <ul>
        <ul>
        <li>$promoter</li>
        <li>$contactperson</li>
        <li>$contactemail</li>
        <li>$contactnumber</li>
        </ul>
        </body>
        </html>
        ";

        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <webmaster@premiumbeats.co.za>' . "\r\n";
        $headers .= 'Cc: luphondog@yahoo.com' . "\r\n";

        mail($to,$subject,$message,$headers);
    }
}
get_header();
?>
<div id="content" class="content">
            <div class="container">
                <!-- BO0KING FORM -->
                <form method="POST">
                    <div class="banner">
                        <h2 class="profile__header">Premium Beats Booking Form</h2>
                    </div>
                    <div class="field">
                        <p>Date of Event</p>
                        <input class="form__input form__input--booking" type="date" name="bdate" />
                    </div>
                    <div class="field">
                        <p>Time of Event</p>
                        <input class="form__input form__input--booking" type="time" name="time" />
                    </div>
                    <!-- <div class="field">
                        <p>Artist to book</p>
                        <select class="form__input form__input--booking">
                            <option value=""></option>
                            <option value="1">*Please select*</option>
                            <option value="2">Artist 1</option>
                            <option value="3">Artist 2</option>
                            <option value="4">Artist 3</option>
                            <option value="5">Artist 4</option>
                        </select>
                    </div> -->
                    <div class="field">
                        <p>Description of Event</p>
                        <textarea class="form__input form__input--booking" rows="10" name="description"></textarea>
                    </div>
                    <div class="field">
                        <p>Promoter's Name</p>
                        <input class="form__input form__input--booking" type="text" name="promoter" />
                    </div>
                    <div class="field">
                        <p>Venue Name</p>
                        <input class="form__input form__input--booking" type="text" name="venue" />
                    </div>
                    <div class="field">
                        <p>Venue Address</p>
                        <input class="form__input form__input--booking" type="text" name="street1" placeholder="Street address" />
                        <input class="form__input form__input--booking" type="text" name="street1" placeholder="Street address line 2" />
                        <div class="city-field">
                            <input class="form__input form__input--booking" type="text" name="city" placeholder="City" />
                            <input class="form__input form__input--booking"  type="text" name="region" placeholder="Region" />
                            <input class="form__input form__input--booking"  type="text" name="code" placeholder="Postal code" />
                            <select class="form__input form__input--booking">
                                <option value="">Country</option>
                                <option value="1">South Africa</option>
                                <option value="2">Swaziland</option>
                                <option value="3">Lesotho</option>
                                <option value="4">Botswana</option>
                                <option value="5">Mozambique</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <p>Venue Capacity</p>
                        <input class="form__input form__input--booking" type="number" name="capacity" />
                    </div>
                    <div class="field">
                        <p>Expected Attendance</p>
                        <input class="form__input form__input--booking" type="number" name="attendance" />
                    </div>
                    <div class="field">
                        <div class="question">
                            <p>EVENT TYPE:<span class="required">*</span></p>
                            <div class="question-answer checkbox-field">
                                <div class="checkbox">
                                    <input type="checkbox" value="none" id="check_1" name="event" required />
                                    <label for="check_1" class="check"><span>CLUB</span></label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" value="none" id="check_2" name="event" required />
                                    <label for="check_2" class="check"><span>FESTIVAL</span></label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" value="none" id="check_3" name="event" required />
                                    <label for="check_3" class="check"><span>CORPORATE</span></label>
                                </div>
                            </div> 
                            <div class="field">
                            <p>Set Time (in minutes)</p>
                            <input class="form__input form__input--booking" type="number" name="duration" />
                        </div>
                        <div class="field">
                            <p>Contact Person</p>
                            <div class="name-field">
                                <input class="form__input form__input--booking" type="text" name="contactperson" placeholder="Full Name" />
                            </div>
                        </div>
                        <div class="field">
                            <p>Contact Email</p>
                            <input class="form__input form__input--booking" type="email" name="contactemail" />
                        </div>
                        <div class="field">
                            <p>Contact Number</p>
                            <input class="form__input form__input--booking" type="tel" name="contactnumber" />
                        </div>
                        <!-- <div class="question">
                            <div class="question-answer checkbox-field">
                                <div>
                                    <input type="checkbox" value="none" id="check_9" name="check" required />
                                    <label for="check_9" class="check"><span>I agree to the <a href="#">terms of service.</a></span></label>
                                </div>
                            </div>
                        </div> -->
                        <div class="btn-block">
                            <button class="form__button form__button--booking" type="submit" href="/">Send</button>
                        </div>
                </form>
            </div>
        </div>
</div>
        <!--- .content -->
<?php
get_footer();