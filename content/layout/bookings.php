<?php
/**
 * Get news posts available
 */

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    if($event_desc = $_POST['event_desc'] && $event_type = $_POST['event_type'] && $event_time = $_POST['event_time'] && $event_date = $_POST['event_date'] && $venue_name = $_POST['venue_name'] && $venue_address = $_POST['venue_address'] && $venue_capacity = $_POST['venue_capacity'] && $promoter_name = $_POST['promoter_name'] && $promoter_email = $_POST['promoter_email'] && $promoter_contact = $_POST['promoter_contact']) {
        $event_desc = $_POST['event_desc'];
        $event_type = $_POST['event_type'];
        $event_time = $_POST['event_time'];
        $event_date = $_POST['event_date'];
        $venue_name = $_POST['venue_name'];
        $venue_address = $_POST['venue_address'];
        $venue_capacity = $_POST['venue_capacity'];
        $promoter_name = $_POST['promoter_name'];
        $promoter_email = $_POST['promoter_email'];
        $promoter_contact = $_POST['promoter_contact'];

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
        <li>$event_type</li>
        <li>$event_date</li>
        <li>$event_time</li>
        <li>$event_desc</li>
        <li>$venue_address</li>
        <li>$venue_capacity</li>
        <li>$venue_address</li>
        <ul>
        <ul>
        <li>Promoter Details</li>
        <li>$promoter_name</li>
        <li>$promoter_email</li>
        <li>$promoter_contact</li>
        </ul>
        </body>
        </html>
        ";

        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <webmaster@premiumbeats.co.za>' . "\r\n";
        $headers .= 'Cc: luphondog@yahoo.com' . "\r\n";

        mail($to,$subject,$message,$headers);
    } else {
        if(!$_POST['event_desc']) $errors[] = "Event description is required.";
        if(!$_POST['event_type']) $errors[] = "Let us know what type of event this will be.";
        if(!$_POST['event_time']) $errors[] = "State the time at which the event will start.";
        if(!$_POST['event_date']) $errors[] = "A date is important for scheduling purposes.";
        if(!$_POST['venue_name']) $errors[] = "The name of the venue of the event is needed.";
        if(!$_POST['venue_address']) $errors[] = "For proper planning, the address of the venue is needed.";
        if(!$_POST['venue_capacity']) $errors[] = "Event description is required.";
        if(!$_POST['promoter_name']) $errors[] = "Let us know who you are.";
        if(!$_POST['promoter_email']) $errors[] = "We need to know where to responde to.";
        if(!$_POST['promoter_contact']) $errors[] = "We might want to give you a call.";

        if($errors) {
            foreach($errors as $error) {
                echo("<p>$error</p>");
            }
            exit;
        }
    }
}
get_header();
?>
<div id="content" class="content">
            <div class="container">
                <!-- BO0KING FORM -->
                <form class="form" method="POST" onsubmit="submitBooking(event)">
                    <div class="input">
                        <div class="input__group">
                            <label>Type of Event</label>
                            <input type="text" name="event_type" id="event_type" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Date of Event</label>
                            <input type="text" name="event_date" id="event_date" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Time of Event</label>
                            <input type="text" name="event_time" id="event_time" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Description of Event</label>
                            <input type="text" name="event_desc" id="event_desc" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Name of Venue</label>
                            <input type="text" name="venue_name" id="venue_name" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Capacity of Venue</label>
                            <input type="text" name="venue_capacity" id="venue_capacity" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Address of Venue</label>
                            <textarea name="venue_address" id="venue_address" class="form__control form__control--booking"></textarea>
                        </div>
                        <div class="input__group">
                            <label>Name of Promoter</label>
                            <input type="text" name="promoter_name" id="promoter_name" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Email of Promoter</label>
                            <input type="text" name="promoter_email" id="promoter_email" class="form__control form__control--booking">
                        </div>
                        <div class="input__group">
                            <label>Contact of Promoter</label>
                            <input type="text" name="promoter_contact" id="promoter_contact" class="form__control form__control--booking">
                        </div>
                    </div>
                    <div class="form__group">
                        <input type="submit" value="Submit Booking" class="form__button form__button--booking">
                    </div>
                </form>
                <script>
                function submitBooking(event) {
                    event.preventDefault();
                    let errors = [];
                    let event_desc = document.getElementById("event_desc").value;
                    let event_date = document.getElementById("event_date").value;
                    let event_time = document.getElementById("event_time").value;
                    let event_type = document.getElementById("event_type").value;
                    let venue_name = document.getElementById("venue_name").value;
                    let venue_address = document.getElementById("venue_address").text;
                    let venue_capacity = document.getElementById("venue_capacity").value;
                    let promoter_name = document.getElementById("promoter_name").value;
                    let promoter_email = document.getElementById("promoter_email").value;
                    let promoter_contact = document.getElementById("promoter_contact").value;

                    if(event_desc && event_date && event_time && event_type && venue_name && venue_address && venue_capacity && promoter_name && promoter_email && promoter_contact) {
                        console.log("ready to submit booking.");
                    } else {
                        errors = [];
                        if(!event_desc) errors.push("Event description is required.");
                        if(!event_type) errors.push("Let us know what type of event this will be.");
                        if(!event_time) errors.push("State the time at which the event will start.");
                        if(!event_date) errors.push("A date is important for scheduling purposes.");
                        if(!venue_name) errors.push("The name of the venue of the event is needed.");
                        if(!venue_address) errors.push("For proper planning, the address of the venue is needed.");
                        if(!venue_capacity) errors.push("Event description is required.");
                        if(!promoter_name) errors.push("Let us know who you are.");
                        if(!promoter_email) errors.push("We need to know where to responde to.");
                        if(!promoter_contact) errors.push("We might want to give you a call.");
                        console.log(errors);
                    }
                }
                </script>
            </div>
        </div>
</div>
        <!--- .content -->
<?php
get_footer();