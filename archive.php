<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$term = get_queried_object();
$term_name = $term->name;
?>
<section>
    <div lc-helper="background" class="pt-5hr pb-6r" style="background:url(<?= IMG_URL ?>/post_cat_bg.jpg)  center / cover no-repeat;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-md-end text-center">
                        <h1 class="mb-2r text-white"><?= $term_name ?></h1>
                        <p class="text-white"><?php echo $term->description; ?></p>
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
                <?php

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    //'offset' => 1,
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $term->taxonomy,
                            'terms'    => $term->term_id,
                        ),
                    ),

                );
                // The Query
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                        <div class="row ">
                            <div class="col-12 mb-2r">
                                <article role="article" id="post-<?php the_ID(); ?>" class="row post-item featured">
                                    <div class="col-md-6 px-md-0">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <?php
                                            echo get_the_post_thumbnail(get_the_ID(), 'full', array('class'    => ' w-100 ratio ratio-16x9'));
                                            ?></a>
                                    </div><!-- /col -->
                                    <div class="col-md-6 pe-md-0 ps-md-1hr">
                                        <div class="h-100">
                                            <div editable="rich" class="d-flex h-100 flex-column justify-content-between">

                                                <?php
                                                $authors = get_post_meta(get_the_ID(), 'multi_author', true);
                                                $user = get_userdata($authors[0]);
                                                $author = $user->data->display_name;
                                                //var_dump($author);

                                                $date = '<time>' . get_the_date('Y.m.d') . '</time>';

                                                $excerpt = apply_filters('NOOO_the_content',  wp_trim_words(wp_strip_all_tags((get_the_content())), 100, '...'));
                                                ?>

                                                <p class="text-gray-900 "><?php echo $date . ' ' . $author; ?></p>

                                                <a href="<?php echo get_the_permalink(); ?>">
                                                    <h3 class="max-3-line h4 text-gray-900 mb-2"><?php echo get_the_title(); ?></h3>
                                                </a>
                                                <p class="text-gray-700 "><?php echo $excerpt; ?></p>
                                                <a href="<?php echo get_the_permalink(); ?>" class="text-primary-d-100 pt-1  ">了解更多<i class="far fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div><!-- /lc-block -->
                                    </div><!-- /col -->
                                </article>
                            </div>
                        </div>
                <?php
                    //get_template_part('loops/blog');
                    endwhile;
                endif;
                ?>


                <div class="lc-block">
                    <div class="row blog-posts">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'offset' => 1,
                            'post_type' => 'post',
                            'posts_per_page' => 8,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $term->taxonomy,
                                    'terms'    => $term->term_id,
                                ),
                            ),
                        );
                        // The Query
                        $the_query = new WP_Query($args);

                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                                get_template_part('loops/blog');
                            endwhile;
                        endif;
                        ?>



                    </div>
                    <?php if ($the_query->max_num_pages > 1) : ?>
                        <div total_page="<?php echo $the_query->max_num_pages; ?>" class="loadmore w-100 btn btn-primary">Load More</div>
                        <span class="no-more-post"></span>
                    <?php endif; ?>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>



<?php get_footer();
