<?php

/**
 * 
 * The main page for default layout
 * 
 */

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alerts = array();
    $errors = array();
    if($_POST['subscriber_name'] && $_POST['subscriber_email'] && $_POST['subscriber_contact']) {
        $subscriber_name = $dbcon->real_escape_string($_POST['subscriber_name']);
        $subscriber_email = $dbcon->real_escape_string($_POST['subscriber_email']);
        $subscriber_contact = $dbcon->real_escape_string($_POST['subscriber_contact']);

        if($subscribe = $dbcon->prepare("INSERT INTO subscriber (fullname, registered, email_address, phone_number) VALUES (?, CURRENT_TIMESTAMP(), ?, ?)")) {
            $subscribe->bind_param("sss", $subscriber_name, $subscriber_email, $subscriber_contact);
            $subscribe->execute();
            if($ubscriber_id = $subscribe->insert_id) {
                $alerts[] = "You have been successfully subscribed.";
            } else {
                trigger_error($dbcon->error);
                $errors[] = "We could not subscribe you at this time. Please try again later.";
            }
        } else {
            trigger_error($dbcon->error);
            $errors[] = "There was an error subscribing you.";
        }
    } else {
        if(!$_POST['subscriber_name']) $errors[] = "You did not provide your name.";
        if(!$_POST['subscriber_email']) $errors[] = "Email address cannot be blank.";
        if(!$_POST['subscriber_contact']) $errors[] = "Contact number missing.";
    }

    if($errors) $_SESSION['errors'] = $errors;
    if($alerts) $_SESSION['alerts'] = $alerts;

    header("Location: ./");
    exit;
}
get_header();
?>
<div id="content" class="content">
    <div class="slide__show">
        <input type="radio" id="i1" name="images" checked />
        <input type="radio" id="i2" name="images" />
        <input type="radio" id="i3" name="images" />
        <input type="radio" id="i4" name="images" />

        <div class="slide_img" id="one">
            <h1 class="large">MIXES</h1>
            <div class="slider__text">
                <!-- <img class="slider__logo" src="content/layout/assets/premiumbeats-logo-color-01-small.png" alt=""> -->
                <h1>MIXED BY THEBIGZILL ONAIR</h1>
                <a href="mixes"><button class="slider__button">
                        Listen
                    </button></a>
            </div>

            <label class="prev" for="i5"><span>&#x2039;</span></label>
            <label class="next" for="i2"><span>&#x203a;</span></label>

        </div>

        <div class="slide_img" id="two">
            <h1 class="large">VOICEOVER</h1>
            <div class="slider__text">
                <!-- <img class="slider__logo" src="content/layout/assets/premiumbeats-logo-color-01-small.png" alt=""> -->
                <h1>VOICE OVERS</h1>
                <a href="voice-overs"><button class="slider__button">
                        Listen
                    </button></a>
            </div>

            <label class="prev" for="i1"><span>&#x2039;</span></label>
            <label class="next" for="i3"><span>&#x203a;</span></label>

        </div>

        <div class="slide_img" id="three">
            <h1 class="large">GALLERY</h1>
            <div class="slider__text">
                <!-- <img class="slider__logo" src="content/layout/assets/premiumbeats-logo-color-01-small.png" alt=""> -->
                <h1>SEE OUR GALLERY</h1>
                <a href="gallery"><button class="slider__button">
                        Gallery
                    </button></a>
            </div>

            <label class="prev" for="i2"><span>&#x2039;</span></label>
            <label class="next" for="i4"><span>&#x203a;</span></label>
        </div>

        <div class="slide_img" id="four">
            <h1 class="large">BOOKINGS</h1>
            <div class="slider__text">
                <!-- <img class="slider__logo" src="content/layout/assets/premiumbeats-logo-color-01-small.png" alt=""> -->
                <h1>BOOKINGS</h1>
                <a href="bookings"><button class="slider__button">
                        BOOK NOW
                    </button></a>
            </div>

            <label class="prev" for="i3"><span>&#x2039;</span></label>
            <label class="next" for="i5"><span>&#x203a;</span></label>
        </div>

        <div id="nav_slide">
            <label for="i1" class="dots" id="dot1"></label>
            <label for="i2" class="dots" id="dot2"></label>
            <label for="i3" class="dots" id="dot3"></label>
            <label for="i4" class="dots" id="dot4"></label>
        </div>
    </div> <!-- end of .slide__show -->
    <div class="container">
        <div class="player">
            <iframe scrolling="no" id="hearthis_at_track_5176631" width="100%" height="150"
                src="https://app.hearthis.at/embed/5176631/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=0&css="
                frameborder="0" allowtransparency allow="autoplay">
                <p>Listen to <a href="https://hearthis.at/premiumbeats/pb021-feat.-bozza-la/" target="_blank">PB021
                        Feat. BOZZA LA</a> <span>by</span><a href="https://hearthis.at/premiumbeats/"
                        target="_blank">Thebigzill Onair</a> <span>on</span> <a href="https://hearthis.at/"
                        target="_blank">hearthis.at</a></p>
            </iframe>
        </div>
        <!--.player-->
        <div class="subscribe">
            <h1 class="subscribe__header">SUBSCRIBE</h1>
            <p class="subscribe__text">Signup with your email address to recieve the latest updates on Premium Beats</p>
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

            <form action="#" class="subscribe__form" method="POST">
                <label for="name">Full Name</label>
                <input class="form__input form__input--fullname" type="text" placeholder="Full Name"
                    name="subscriber_name" required>
                <label for="name">Contact Number</label>
                <input class="form__input form__input--fullname" type="tel" placeholder="Contact Number"
                    name="subscriber_contact">
                <label for="email">Email Address</label>
                <input class="form__input form__input--email" type="email" placeholder="Email address"
                    name="subscriber_email" required>
                <button class="form__button" type="submit">Sign up</button>
            </form>
        </div>
        <!--.subscribe-->
    </div><!-- end of .container -->
</div>
<!--- .content -->
<?php

get_footer();
?>