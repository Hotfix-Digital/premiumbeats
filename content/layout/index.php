<?php

/**
 * 
 * The main page for default layout
 * 
 */

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
            <iframe scrolling="no" id="hearthis_at_track_5021249" width="100%" height="150"
                src="https://app.hearthis.at/embed/5021249/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=0&css="
                frameborder="0" allowtransparency allow="autoplay">
                <p>Listen to <a href="https://hearthis.at/premiumbeats/pb018-feat.-que-hiber/" target="_blank">PB018
                        Feat. Que Hiber</a> <span>by</span><a href="https://hearthis.at/premiumbeats/"
                        target="_blank">Thebigzill Onair</a> <span>on</span> <a href="https://hearthis.at/"
                        target="_blank">hearthis.at</a></p>
            </iframe>
        </div>
        <!--.player-->
        <div class="subscribe">
            <h1 class="subscribe__header">SUBSCRIBE</h1>
            <p class="subscribe__text">Signup with your email address to recieve the latest updates on Premium Beats</p>
            <form action="#" class="subscribe__form">
                <label for="name">Full Name</label>
                <input class="form__input form__input--fullname" type="text" placeholder="Full Name" name="name"
                    required>
                <label for="name">Contact Number</label>
                <input class="form__input form__input--fullname" type="number" placeholder="Contact Number" name="name">
                <label for="email">Email Address</label>
                <input class="form__input form__input--email" type="email" placeholder="Email address" name="email"
                    required>
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