<section class="block" id="Contact_form">
    <div class="container">
        <h3 class="block-title">Contact us</h3>
        <div class="block-form">
            <form id="gform" method="POST" data-email="hphoang@fastbooking.net" action="https://script.google.com/a/fastbooking.net/macros/s/AKfycbwHT3WhwdKCr1Pnc1VdLfWKw4IBMsZ29KRXtKcrhYRHe7jtnk8/exec" class="form form--contact">
                <div class="row form--contact__info">
                    <?php 
                        $args = array(
                            'offset'      => 0,
                            'post_type'   => 'hotel_post',
                        );
                        $myhotels = get_posts( $args );
                        foreach ( $myhotels as $hotel ) {
                            $address = get_post_meta( $hotel->ID,'hotel_address');
                            $phone = get_post_meta( $hotel->ID,'hotel_phone');
                            $email = get_post_meta( $hotel->ID,'hotel_email');
                            echo '<div class="col">
                                    <p class="form__label form__label--address">'.$address[0].'</p>
                                    <p class="form__label form__label--tel"><span class="label-phone">'.__('Telephone',TEMPLATE_PREFIX).':</span> <a href="'.$phone[0].'" title="'.$phone[0].'">'.$phone[0].'</a></p>
                                    <p class="form__label form__label--email"><span class="label-mail">'.__('Email',TEMPLATE_PREFIX).':</span> <a href="mailto:'.$email[0].'" title="'.$email[0].'">'.$email[0].'</a></p>
                                </div>';
                        }
                    ?>
                </div>

                <div class="form--contact__frm">
                    <div class="row form__row">
                        <div class="col-md-12 ">
                            <div class="custom-select">
                                <select name="slt-hotel" id="slt-hotel" required class="js-custom-select">
                                    <option default>Hotel</option>
                                    <option value="Hotel 1">Hotel 1</option>
                                    <option value="Hotel 1">Hotel 1</option>
                                    <option value="Hotel 1">Hotel 1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form__row">
                        <div class="col-md-6">
                            <div class="custom-select">
                                <select name="slt-title" id="slt-title" class="js-custom-select">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Mss">Mss</option>
                                </select>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <input type="text" required name="txt_first_name" id="txt_first_name" placeholder="First name" class="form__input">
                        </div>
                    </div>

                    <div class="row form__row">
                       <div class="col-md-6">
                            <input type="text" required name="txt_last_name" id="txt_last_name" placeholder="Last name" class="form__input">
                        </div>
                        <div class="col-md-6">
                            <input type="email" required name="txt_email" id="txt_email" placeholder="Email address" class="form__input">
                            <span id="email-invalid" style="display:none">Must be a valid email address</span>
                        </div>
                    </div>

                    <div class="row form__row">
                       <div class="col-md-6">
                            <input type="text" name="txt_phone" id="txt_phone" placeholder="Phone number" class="form__input">
                        </div>
                        <div class="col-md-6">
                            <div class="custom-select">
                                <select name="slt-city" id="slt-city" class="js-custom-select">
                                    <option default>city</option>
                                    <option value="city">city</option>
                                    <option value="city">city</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                    <div class="row form__row">
                        <div class="col-md-12">
                            <textarea name="txt_comment" id="txt_comment" cols="5" rows="5" placeholder="Message" class="form__area"></textarea>
                        </div>
                    </div>
                    <div class="row form__row form__row--action">
                        <div class="col-md-12">
                            <input type="reset" value="reset" class="btn btn-reset">
                            <input type="submit" value="Send" class="btn btn-red btn-send">
                        </div>    
                    </div>

                </div>

            </form>
        </div> 
        <div class="center" style="display:none;" id="thankyou_message">
            <?php echo rwmb_meta('contact_message'); ?>
        </div>
    </div> 
</section>