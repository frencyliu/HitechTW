<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

echo do_shortcode( '[ht_banner]' );
?>




<div class="container">
    <div class="row">
        <div class="col-lg-12 py-5">
            <?php

            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            else :
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            endif;
            ?>
        </div>
    </div>
</div>


<?php get_footer();
