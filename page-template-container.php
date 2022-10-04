<?php

/**
 * Template Name: Container Page
 *
 */


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();



echo do_shortcode( '[ht_banner]' );

if($post->post_name == 'contact-us'){
    $bg = 'background:url(' . site_url() . '/wp-content/uploads/2022/03/shutterstock_647355280-1.png)  center / cover no-repeat;';
}else{
    $bg = '';
}

/*

*/
?>
<section style="<?= $bg ?>">
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 py-5">
            <?php

            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'textdomain');
            endif;
            ?>
        </div>
    </div>
</div>
</section>

<?php get_footer();
