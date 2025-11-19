<?php get_header(); ?>

    <!-- BREADCRUMBS -->
    <div class="breadcrumbs d-none d-sm-block">
        <div class="container">
			<?php adsTmpl::breadcrumbs() ?>
        </div>
    </div>

    <!-- CONTACT-US -->
    <div class="page-content">
        <div class="container">
            <h1><?php _e( 'Contact Us', 'rap' ); ?></h1>
            <div class="row page-contact gy-5">
                <div class="col-12 col-lg-6">
                    <p class="d-block d-sm-none"><?php _cz('tp_contactUs_text') ?></p>
                    <form class="contact-form row g-3" method="POST">

                       <div class="item col-12">
                            <label for="nameClient" class="form-label"><?php _e( 'Your Name', 'rap' ); ?><span class="required_item">*</span></label>
                            <input id="nameClient" type="text" name="nameClient" value="" placeholder="<?php _e( 'Your Name', 'rap' ); ?>" class="form-control form-control-lg" required="required">
                        </div>
                        <div  class="item col-12">
                            <label for="email" class="form-label"><?php _e( 'Email', 'rap' ); ?><span class="required_item">*</span></label>
                            <input id="email" type="email" name="email" value="" placeholder="<?php _e( 'Email', 'rap' ); ?>" class="form-control form-control-lg" required="required">
                        </div>
                        <div  class="item col-12">
                            <label for="message" class="form-label"><?php _e( 'Message', 'rap' ); ?><span class="required_item">*</span></label>
                            <textarea id="message" name="message" placeholder="<?php _e( 'Your Message', 'rap' ); ?>" class="form-control" rows="6" required="required"></textarea>
                        </div>

	                    <?php
	                    $options = new \ads\adsOptions();
	                    $args = $options->get('ads_recaptcha_options');
	                    ?>

	                    <?php if ($args['recaptcha_status'] == 1): ?>

                            <div class="item col-12">
                                <div class="wrap-g-recaptcha clearfix">
                                    <div class="g-recaptcha" data-sitekey="<?php echo $args['recaptcha_site_key']; ?>"></div>
                                </div>
                                <input type="hidden" id="recaptcha" name="recaptcha">
                            </div>
                            <?php endif; ?>

                        <?php if( cz( 'cm_readonly2' ) ) : ?>

                            <div class="item col-12 conditions-contact">
                                <div class="form-check">
                                    <input name="terms" value='0' type='hidden'/>
                                    <input class="form-check-input in-conditions-contact" id="terms" name="terms" type="checkbox" value="1" />
                                    <label class="form-check-label" for="terms"><?php echo cz( 'tp_readonly_read_required_text2' ) ?></label>
                                </div>
                                <div class="conditions-help errorcheck">
                                    <span><?php echo cz( 'cm_readonly_notify2') ?></span>
                                </div>
                            </div>

                        <?php endif;?>


                        <div  class="item col-12">
                            <button type="submit" name="contactSender" value="Send" class="btn btn-primary btn-lg"><?php _e( 'Send Message', 'rap' ); ?></button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 address">
                    <p class="d-none d-sm-block"><?php _cz('tp_contactUs_text') ?></p>
					<?php if ( cz( 's_mail' ) ): ?>
                        <p>
                            <a href="mailto:<?php echo cz( 's_mail' ); ?>" target="_blank"> <?php echo cz( 's_mail' ); ?></a>
                        </p>
					<?php endif; ?>
					<?php if ( cz( 's_link_fb_page' ) ): ?>
                        <p><a href="<?php echo cz( 's_link_fb_page' ); ?>" target="_blank" rel="nofollow">
                                <span class=""><i class="fa fa-facebook"></i><?php _e( 'Like Us', 'rap' ); ?></span></a>
                        </p>
					<?php endif; ?>
					<?php if ( cz( 's_link_in_page' ) ): ?>
                        <p><a href="<?php echo cz( 's_link_in_page' ); ?>" target="_blank" rel="nofollow">
                                <span class=""><i class="fa fa-instagram"></i><?php _e( 'Find us', 'rap' ); ?></span></a>
                        </p>
					<?php endif; ?>
					<?php if ( cz( 's_link_tw' ) ): ?>
                        <p><a href="<?php echo cz( 's_link_tw' ); ?>" target="_blank" rel="nofollow">
                                <span class=""><i class="fa fa-twitter"></i><?php _e( 'Follow Us', 'rap' ); ?></span></a>
                        </p>
					<?php endif; ?>
					<?php if ( cz( 's_link_pt' ) ): ?>
                        <p><a href="<?php echo cz( 's_link_pt' ); ?>" target="_blank" rel="nofollow">
                                <span class=""><i class="fa fa-pinterest-p"></i><?php _e( 'Add Us', 'rap' ); ?></span></a>
                        </p>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>