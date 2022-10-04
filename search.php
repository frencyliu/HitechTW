<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>
<section>
    <div lc-helper="background" class="pt-4hr pb-5r wp-image-1118" style="background:url(<?php echo site_url(); ?>/wp-content/uploads/2022/03/Rectangle-14.png)  center / cover no-repeat;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mb-2r text-white"><?php
                                                        printf(
                                                            /* translators: %s: query term */
                                                            esc_html__('搜尋: %s', 'picostrap'),
                                                            '<span class="text-white">"' . get_search_query() . '"</span>'
                                                        );
                                                        ?></h1>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container pt-5hr pb-8r">
        <div class="row">
            <div class="col-md-12">
                <div class="lc-block">
                    <div class="row blog-posts">
                        <?php
                         if (have_posts()) :
                            while (have_posts()) : the_post();
                                get_template_part('loops/blog');
                            endwhile;
                        endif;
                        ?>



                    </div>
                    <div class="col-12">
                    <?php picostrap_pagination() ?>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>


<?php get_footer();
