<?php

/**
 * 同時給shortcode和loop使用
 *
 * @todo Ajax load more
 * @todo pin to top
 * @todo 只撈分類
 */



$the_post = isset($args['the_post']) ? $args['the_post'] : $post;
$args['column_classes'] = isset($args['column_classes']) ? $args['column_classes'] : 'col-xxl-3 col-xl-6';
$args['output_article_class'] = isset($args['output_article_class']) ? $args['output_article_class'] : '';
$args['output_featured_image_format'] = isset($args['output_featured_image_format']) ? $args['output_featured_image_format'] : 'full';
$args['output_featured_image_class'] = isset($args['output_featured_image_class']) ? $args['output_featured_image_class'] : 'ratio-4x3';
$args['output_hide_elements'] = isset($args['output_hide_elements']) ? $args['output_hide_elements'] : '';
$args['output_excerpt_length'] = isset($args['output_excerpt_length']) ? $args['output_excerpt_length'] : '100';
$args['output_excerpt_text'] = isset($args['output_excerpt_text']) ? $args['output_excerpt_text'] : '閱讀更多';
$args['$output_heading_tag'] = isset($args['$output_heading_tag']) ? $args['$output_heading_tag'] : 'h3';

$address = empty(get_post_meta($the_post->ID, '_address_line_1', true)) ? '' : '<i class="fa-light fa-location-dot me-2"></i>' . get_post_meta($the_post->ID, '_address_line_1', true);




?>

<div class="<?php echo $args['column_classes']; ?> mb-2r px-1hr">
    <article role="article" id="post-<?php echo $the_post->ID; ?>" class="row flip-card <?php echo $args['output_article_class']; ?>">
        <div class="flip-item <?php echo ($args['output_article_class'] == 'featured') ? ('col-md-6 px-0') : ('col-12 px-md-0'); ?>">
            <a class="nolightbox" href="<?php echo get_the_permalink($the_post); ?>">
                <?php
                $post_thumbnail = get_the_post_thumbnail($the_post, $args['output_featured_image_format'], array('class'    => $args['output_featured_image_class'] . ' object-fit-cover'));
                if (empty($post_thumbnail)) {
                    $post_thumbnail = '<img class="' . $args['output_featured_image_class'] . ' card-img-top w-100 ratio wp-post-image object-fit-cover" src="' . wp_get_attachment_image_url(get_post_meta($the_post->ID, 'featured_image', true), 'full') . '">';
                    $post_thumbnail = (!empty(get_post_meta($the_post->ID, 'featured_image', true))) ? $post_thumbnail : ('<img class="' . $args['output_featured_image_class'] . ' card-img-top w-100 ratio wp-post-image object-fit-cover" src="' . site_url() . '/wp-content/uploads/2022/06/索引.jpg">');
                }
                echo $post_thumbnail;
                ?>
            </a>
        </div><!-- /col -->
        <div class="flip-content bg-primary rounded-1 p-1hr <?php echo ($args['output_article_class'] == 'featured') ? ('col-md-6') : ('col-12'); ?>">

            <div class="h-100 d-flex flex-column">
                <div class="col-auto">
                    <?php
                    $excerpt = (strpos($args['output_hide_elements'], 'excerpt')  === false  && $args['output_excerpt_length'] != 0) ? (apply_filters('NOOO_the_content',  wp_trim_words(wp_strip_all_tags(($the_post->post_content)), $args['output_excerpt_length'], $args['output_excerpt_text']))) : ('');
                    ?>


                    <?php
                    $title_class = ($args['output_article_class'] == 'featured') ? ('h4 mb-2') : ('h6');
                    if (strpos($args['output_hide_elements'], 'title')  === false) {
                        echo '<' . $args['$output_heading_tag'] . ' class="max-1-line text-white ' . $title_class . '">' . get_the_title($the_post) . '</' . $args['$output_heading_tag'] . '>';
                    }
                    ?>
                    <p class="text-white small mb-2"><?= $address ?></p>
                </div>
                <div class="col border-top border-bottom border-gray-100 overflow-hidden text-white">
                    <?=
                    $featured_text = get_post_meta($the_post->ID, 'featured_text', true);
                    wpautop($featured_text) ?>
                </div>
                <div class="col-auto text-end pt-1r">
                    <a href="<?php echo get_the_permalink($the_post); ?>" class="nolightbox text-gray-900 btn btn-secondary-100 pt-1  <?php echo ($args['output_article_class'] == 'featured') ? ('') : (''); ?>"><?= $args['output_excerpt_text'] ?></a>
                </div>
            </div>


        </div><!-- /col -->
    </article>
</div>