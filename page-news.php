<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$news_catid = 45; //高澄快訊 = 45
$featured_catid = 48; //人氣精選文章 = 48
$cat = get_category($news_catid);
$cat_name = $cat->name;

/**
 * 至頂文章
 */
/* Get all Sticky Posts */
$sticky = get_option('sticky_posts');

/* Sort Sticky Posts, newest at the top */
rsort($sticky);

echo do_shortcode( '[ht_banner]' );
?>


<!--高澄快訊-->
<section>
    <div class="container pt-5hr pb-5r">
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: '〉';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url() ?>" class="text-gray-700">首頁</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= get_category_link($news_catid) ?>" class="text-gray-900">高澄快訊</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <?php




                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    //'offset' => 1,
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'paged' => $paged,
                    'ignore_sticky_posts' => 1,
                    'post__in' => $sticky,
                    'cat' => $news_catid
                );
                // The Query
                $the_query = new WP_Query($args);
                // var_dump($the_query);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $first_post_id = get_the_ID();
                ?>
                        <div class="row ">
                            <div class="col-12 mb-2r">
                                <article role="article" id="post-<?php the_ID(); ?>" class="row post-item featured">
                                    <div class="col-md-6 px-md-0">
                                        <a class="nolightbox" href="<?php echo get_the_permalink(); ?>">
                                            <?php
                                            echo get_the_post_thumbnail(get_the_ID(), 'full', array('class'    => ' w-100 ratio ratio-16x9'));
                                            ?></a>
                                    </div><!-- /col -->
                                    <div class="col-md-6 pe-md-0 ps-md-1hr">
                                        <div class="h-100">
                                            <div editable="rich" class="d-flex h-100 flex-column justify-content-between">

                                                <?php


                                                $date = '<time>' . get_the_date('Y.m.d') . '</time>';

                                                $excerpt = apply_filters('NOOO_the_content',  wp_trim_words(wp_strip_all_tags((get_the_content())), 100, '...'));
                                                ?>

                                                <p class="text-gray-900 "><?php echo $date; ?></p>

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
                        $count = 0;

                        $remove_first_sticky_post = array_diff($sticky, [$first_post_id]);
                        if (!empty($remove_first_sticky_post)) {

                            $args = array(
                                'post_type' => 'post',
                                'post__in' => $remove_first_sticky_post,
                                'ignore_sticky_posts' => 1,
                                'cat' => $news_catid
                            );


                            // The Query
                            $the_query = new WP_Query($args);
                            //var_dump($the_query->the_post());
                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    get_template_part('loops/blog', array(
                                        'output_featured_image_class' => 'ratio-16x9'
                                    ));
                                    $count++;
                                    if ($count == 4) break;
                                endwhile;
                            endif;
                        }

                        if ($count < 4) {
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'post__not_in' => $sticky,
                                //'ignore_sticky_posts' => 1,
                                'cat' => $news_catid
                            );

                            // The Query
                            $the_query = new WP_Query($args);
                            //var_dump($the_query->the_post());
                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    get_template_part('loops/blog', array(
                                        'output_featured_image_class' => 'ratio-16x9'
                                    ));
                                    $count++;
                                    if ($count == 4) break;

                                endwhile;
                            endif;
                        }


                        ?>



                    </div>
                    <a href="<?= get_category_link($news_catid) ?>" class="w-100 btn btn-outline-primary">More 〉</a>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>


<!--人氣精選-->
<section>
    <div class="container pb-8r">
        <div class="row">
            <div class="col-md-12">
                <nav style="--bs-breadcrumb-divider: '〉';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url() ?>" class="text-gray-700">首頁</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= get_category_link($featured_catid) ?>" class="text-gray-900">人氣精選文章</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="lc-block">
                    <div class="row blog-posts">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $count = 0;

                        $args = array(
                            'post_type' => 'post',
                            'post__in' => array_diff($sticky, [$first_post_id]),
                            'ignore_sticky_posts' => 1,
                            'cat' => $featured_catid
                        );


                        // The Query
                        $the_query = new WP_Query($args);
                        //var_dump($the_query->the_post());
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();


                                get_template_part('loops/blog', array(
                                    'output_featured_image_class' => 'ratio-16x9'
                                ));
                                $count++;
                                if ($count == 4) break;
                            endwhile;
                        endif;

                        if ($count < 4) {
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'ignore_sticky_posts' => 1,
                                'cat' => $featured_catid
                            );

                            // The Query
                            $the_query = new WP_Query($args);
                            //var_dump($the_query->the_post());
                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    get_template_part('loops/blog', array(
                                        'output_featured_image_class' => 'ratio-16x9'
                                    ));
                                    $count++;
                                    if ($count == 4) break;

                                endwhile;
                            endif;
                        }
                        ?>



                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>



<?php get_footer();
