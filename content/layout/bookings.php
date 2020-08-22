<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $alerts = array();
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

        if(mail($to,$subject,$message,$headers)) {
            $alerts[] = "Your booking enquity was sent successfully.";
        }
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
    }

    if($alerts) $_SESSION['alerts'] = $alerts;
    if($errors) $_SESSION['errors'] = $errors;

    header("Location: bookings");
    exit;
}
get_header();
?>
<div id="content" class="content">
            <div class="container">
<?php if(isset($_SESSION['alerts'])): ?>

                <!-- ALERT -->
                <div class="alert">
                    <ul><strong>Success:</strong>
<?php foreach($_SESSION['alerts'] as $alert): ?>
                        <li><?php echo($alert); ?></li>
<?php endforeach; ?>
                    </ul>
                </div>
<?php
unset($_SESSION['alerts']);
endif;
if(isset($_SESSION['errors'])):
?>

                <!-- ERROR -->
                <div class="error">
                    <ul><strong>Fixed the errors below:</strong>
<?php foreach($_SESSION['errors'] as $error): ?>
                        <li><?php echo($error); ?></li>
<?php endforeach; ?>
                    </ul>
                </div>
<?php 
unset($_SESSION['errors']);
endif;
?>

                <!-- BO0KING FORM -->
                <form class="form" method="POST">
                    <div class="banner">
                        <h2 class="profile__header">Premium Beats Booking Form</h2>
                    </div>
                    <div class="input">
                        <div class="input__group">
                            <label class="form__label">Type of Event</label>
                            <input type="text" name="event_type" id="event_type" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Date of Event</label>
                            <input type="date" name="event_date" id="event_date" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Time of Event</label>
                            <input type="time" name="event_time" id="event_time" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Description of Event</label>
                            <input type="text" name="event_desc" id="event_desc" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Name of Venue</label>
                            <input type="text" name="venue_name" id="venue_name" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Capacity of Venue</label>
                            <input type="text" name="venue_capacity" id="venue_capacity" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Address of Venue</label>
                            <textarea name="venue_address" rows="10" id="venue_address" class="form__control form__control--textarea"></textarea>
                        </div>
                        <div class="input__group">
                            <label class="form__label">Name of Promoter</label>
                            <input type="text" name="promoter_name" id="promoter_name" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Email of Promoter</label>
                            <input type="email" name="promoter_email" id="promoter_email" class="form__control">
                        </div>
                        <div class="input__group">
                            <label class="form__label">Contact of Promoter</label>
                            <input type="text" name="promoter_contact" id="promoter_contact" class="form__control">
                        </div>
                    </div>
                    <div class="form__group">
                        <input type="submit" value="Submit Booking" class="form__button form__button--booking">
                    </div>
                </form>
            </div>
        </div>
</div>
        <!--- .content -->
<?php
get_footer();