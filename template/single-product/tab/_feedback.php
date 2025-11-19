<?php $reviews = adsTmpl::review(); ?>

        <div class="sm-feedback">
            <?php if($reviews->countFeedback() > 0):?>
            <?php get_template_part( 'template/single-product/_feedback-static' ) ?>
            <?php endif; ?>

            <?php
            /**
             * The default WordPress comments template outputs the “Leave a comment”
             * form along with other core comment markup. The /item/ templates no
             * longer need that UI, so we completely short-circuit it unless a
             * developer explicitly re-enables it via the
             * `raphael_single_product_enable_wp_comments` filter.
             */
            if ( apply_filters( 'raphael_single_product_enable_wp_comments', false ) ) {
                comments_template( '/template/single-product/_review.php' );
            }
            ?>
        </div>

