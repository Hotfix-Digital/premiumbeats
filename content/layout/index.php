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

            <label class="prev" for="i5"><span>&#x2039;</span></label>
            <label class="next" for="i2"><span>&#x203a;</span></label>

        </div>

        <div class="slide_img" id="two">

            <label class="prev" for="i1"><span>&#x2039;</span></label>
            <label class="next" for="i3"><span>&#x203a;</span></label>

        </div>

        <div class="slide_img" id="three">

            <label class="prev" for="i2"><span>&#x2039;</span></label>
            <label class="next" for="i4"><span>&#x203a;</span></label>
        </div>

        <div class="slide_img" id="four">

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
        <div class="soundcloud">
            <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/741154570&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
            <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;">
                <a href="https://soundcloud.com/premiumbeatssa" title="Thebigzill Onair" target="_blank" style="color: #cccccc; text-decoration: none;">Thebigzill Onair
                </a> ·
                <a href="https://soundcloud.com/premiumbeatssa/premium-beats-014-feat-dj-kts-tbm" title="Premium Beats 014 Feat. DJ KTS TBM" target="_blank" style="color: #cccccc; text-decoration: none;">Premium Beats 014 Feat. DJ KTS TBM
                </a>
            </div>
        </div>
        <!--.soundcloud-->
        <div class="subscribe">
            <h1 class="subscribe__header">SUBSCRIBE</h1>
            <p class="subscribe__text">Signup with your email address to recieve the latest updates on Premium Beats</p>
            <form action="#" class="subscribe__form">
                <label for="name">Full Name</label>
                <input class="form__input form__input--fullname" type="text" placeholder="Full Name" name="name" required>
                <label for="email">Email Address</label>
                <input class="form__input form__input--email" type="email" placeholder="Email address" name="email" required>
                <button class="form__button" type="submit">SIGN UP</button>
            </form>
        </div>
        <!--.subscribe-->
        <div class="news__higlights card">
            <div class="news__highlight">
                <div class="highlight__header">
                    <div class="date">
                        <span class="day">26</span>
                        <span class="month">May</span>
                        <span class="year">2020</span>
                    </div><!--.date-->
                    <ul class="highlight__icons">
                        <li><a href="#" class="fa fa-bookmark-o"></a></li>
                        <li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
                        <li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
                    </ul><!--Add icons for article-->
                </div>
                <!--.highlight__header-->
                <div class="highlight__body">
                    <div class="highlight__content">
                        <span class="highlight__author">Prince Radebe</span>
                        <h1 class="highlight__title"><a href="#">The next big thing is coming</a></h1>
                        <p class="highlight__text">Premium Beats will be launching a website very soon.</p>
                        <a href="#" class="button">Read More</a>
                    </div>
                    <!--.highlight__content-->
                </div>
                <!--.highlight__body-->
            </div>
            <!--.news__highlight-->
            <div class="news__highlight">
                <div class="highlight__header">
                    <div class="date">
                        <span class="day">26</span>
                        <span class="month">May</span>
                        <span class="year">2020</span>
                    </div><!--.date-->
                    <ul class="highlight__icons">
                        <li><a href="#" class="fa fa-bookmark-o"></a></li>
                        <li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
                        <li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
                    </ul><!--Add icons for article-->
                </div>
                <!--.highlight__header-->
                <div class="highlight__body">
                    <div class="highlight__content">
                        <span class="highlight__author">Prince Radebe</span>
                        <h1 class="highlight__title"><a href="#">The next big thing is coming</a></h1>
                        <p class="highlight__text">Premium Beats will be launching a website very soon.</p>
                        <a href="#" class="button">Read More</a>
                    </div>
                    <!--.highlight__content-->
                </div>
                <!--.highlight__body-->
            </div>
            <!--.news__highlight-->
            <div class="news__highlight">
                <div class="highlight__header">
                    <div class="date">
                        <span class="day">26</span>
                        <span class="month">May</span>
                        <span class="year">2020</span>
                    </div><!--.date-->
                    <ul class="highlight__icons">
                        <li><a href="#" class="fa fa-bookmark-o"></a></li>
                        <li><a href="#" class="fa fa-heart-o"><span>18</span></a></li>
                        <li><a href="#" class="fa fa-comment-o"><span>3</span></a></li>
                    </ul><!--Add icons for article-->
                </div>
                <!--.highlight__header-->
                <div class="highlight__body">
                    <div class="highlight__content">
                        <span class="highlight__author">Prince Radebe</span>
                        <h1 class="highlight__title"><a href="#">The next big thing is coming</a></h1>
                        <p class="highlight__text">Premium Beats will be launching a website very soon.</p>
                        <a href="#" class="button">Read More</a>
                    </div>
                    <!--.highlight__content-->
                </div>
                <!--.highlight__body-->
            </div>
            <!--.news__highlight-->
        </div> <!--.news__highlights card-->
    </div><!-- end of .container -->
</div>
<!--- .content -->
<?php
get_footer();
