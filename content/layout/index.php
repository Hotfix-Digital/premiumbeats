<?php

/**
 * 
 * The main page for default layout
 * 
 */

get_header();
?>
<div id="content" class="content">
    <div class="container">
        <div class="slide__show">
            <input type="radio" id="i1" name="images" checked />
            <input type="radio" id="i2" name="images" />
            <input type="radio" id="i3" name="images" />
            <input type="radio" id="i4" name="images" />
            <input type="radio" id="i5" name="images" />

            <div class="slide_img" id="one">

                <img src="/content/layout/assets/slider/slide1.jpg">

                <label class="prev" for="i5"><span>&#x2039;</span></label>
                <label class="next" for="i2"><span>&#x203a;</span></label>

            </div>

            <div class="slide_img" id="two">

                <img src="/content/layout/assets/slider/slide2.jpg">

                <label class="prev" for="i1"><span>&#x2039;</span></label>
                <label class="next" for="i3"><span>&#x203a;</span></label>

            </div>

            <div class="slide_img" id="three">
                <img src="/content/layout/assets/slider/slide3.jpg">

                <label class="prev" for="i2"><span>&#x2039;</span></label>
                <label class="next" for="i4"><span>&#x203a;</span></label>
            </div>

            <div class="slide_img" id="four">
                <img src="/content/layout/assets/slider/slide4.jpg">

                <label class="prev" for="i3"><span>&#x2039;</span></label>
                <label class="next" for="i5"><span>&#x203a;</span></label>
            </div>

            <div class="slide_img" id="five">
                <img src="/content/layout/assets/slider/slide5.jpg">

                <label class="prev" for="i4"><span>&#x2039;</span></label>
                <label class="next" for="i1"><span>&#x203a;</span></label>

            </div>

            <div id="nav_slide">
                <label for="i1" class="dots" id="dot1"></label>
                <label for="i2" class="dots" id="dot2"></label>
                <label for="i3" class="dots" id="dot3"></label>
                <label for="i4" class="dots" id="dot4"></label>
                <label for="i5" class="dots" id="dot5"></label>
            </div>
        </div> <!-- end of .slide__show -->
        <div class="soundcloud">
            <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/741154570&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
            <div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;">
                <a href="https://soundcloud.com/premiumbeatssa" title="Thebigzill Onair" target="_blank" style="color: #cccccc; text-decoration: none;">Thebigzill Onair
                </a> ·
                <a href="https://soundcloud.com/premiumbeatssa/premium-beats-014-feat-dj-kts-tbm" title="Premium Beats 014 Feat. DJ KTS TBM" target="_blank" style="color: #cccccc; text-decoration: none;">Premium Beats 014 Feat. DJ KTS TBM
                </a>
            </div>
        </div> <!--.soundcloud-->
    </div><!-- end of .container -->
</div>
<!--- .content -->
<?php
get_footer();
