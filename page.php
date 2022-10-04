<?php

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

            <?php

            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'textdomain');
            endif;
            ?>


<?php get_footer();
