<?php
/**
 * Get news posts available
 */

get_header();
?>
<div id="content" class="content">
            <div class="container">
                <!-- BO0KING FORM -->
                <form action="/">
                    <div class="banner">
                        <h2 class="profile__header">Premium Beats Booking Form</h2>
                    </div>
                    <div class="field">
                        <p>Date of Event</p>
                        <input class="form__input form__input--booking" type="date" name="bdate" />
                    </div>
                    <div class="field">
                        <p>Time of Event</p>
                        <input class="form__input form__input--booking" type="time" name="name" />
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
                        <textarea class="form__input form__input--booking" rows="10"></textarea>
                    </div>
                    <div class="field">
                        <p>Promoter's Name</p>
                        <input class="form__input form__input--booking" type="text" name="name" />
                    </div>
                    <div class="field">
                        <p>Venue Name</p>
                        <input class="form__input form__input--booking" type="text" name="name" />
                    </div>
                    <div class="field">
                        <p>Venue Address</p>
                        <input class="form__input form__input--booking" type="text" name="name" placeholder="Street address" />
                        <input class="form__input form__input--booking" type="text" name="name" placeholder="Street address line 2" />
                        <div class="city-field">
                            <input class="form__input form__input--booking" type="text" name="name" placeholder="City" />
                            <input class="form__input form__input--booking"  type="text" name="name" placeholder="Region" />
                            <input class="form__input form__input--booking"  type="text" name="name" placeholder="Postal / Zip code" />
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
                                    <input type="checkbox" value="none" id="check_1" name="checklist" required />
                                    <label for="check_1" class="check"><span>CLUB</span></label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" value="none" id="check_2" name="checklist" required />
                                    <label for="check_2" class="check"><span>FESTIVAL</span></label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" value="none" id="check_3" name="checklist" required />
                                    <label for="check_3" class="check"><span>CORPORATE</span></label>
                                </div>
                            </div> 
                            <div class="field">
                            <p>Set Time (in minutes)</p>
                            <input class="form__input form__input--booking" type="number" name="set" />
                        </div>
                        <div class="field">
                            <p>Contact Person</p>
                            <div class="name-field">
                                <input class="form__input form__input--booking" type="text" name="name" placeholder="Full Name" />
                            </div>
                        </div>
                        <div class="field">
                            <p>Contact Email</p>
                            <input class="form__input form__input--booking" type="email" name="name" />
                        </div>
                        <div class="field">
                            <p>Contact Number</p>
                            <input class="form__input form__input--booking" type="tel" name="name" />
                        </div>
                        <div class="question">
                            <div class="question-answer checkbox-field">
                                <div>
                                    <input type="checkbox" value="none" id="check_9" name="check" required />
                                    <label for="check_9" class="check"><span>I agree to the <a href="#">terms of service.</a></span></label>
                                </div>
                            </div>
                        </div>
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