<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="col-md-12">
    <div class="container">
        <div class="row align-items-start pt-3hr">

            <?php
            if (have_posts()) {

                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content');
                } // endwhile;



            } else {
                get_template_part('template-parts/section', 'no-results');
            } // endif;




            get_sidebar();

            ?>
        </div>
    </div>
</section>




<?php get_footer();