<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

global $post;
$post_id = $post->ID;
$banner_text = get_post_meta($post_id, 'ht_select_banner_text', true)?:'人氣設計';

$banner_img = get_post_meta($post_id, 'ht_select_banner_image', true)?:( IMG_URL . '/ht-select-bg.jpg');
$subtitle = get_post_meta($post_id, 'ht_select_subtitle', true);
$subtitle = (empty($subtitle))?'':'<br>' . $subtitle;
$address = get_post_meta($post_id, '_address_line_1', true);
$content = wpautop(get_the_content());
$images = get_post_meta($post_id, 'ht_select_images');

echo do_shortcode( '[ht_banner]' );

?>
<style>
.sticky-div{
    position: relative;
}

@supports (position: sticky) {
    .sticky-div{
        position: sticky;
        top: 10rem;
    }
}
    </style>





<section>
    <div class="container mt-3r">
        <div class="row">
            <div class="col-md-6 position-relative">
                <div class="sticky-div">
                <h1 class="text-black"><?= $post->post_title ?></h1>
                <?php if (!empty($address)) : ?>
                    <p class="mb-0 d-md-none"><i class="fa-solid fa-location-dot me-2"></i><?= $address ?></p>
                <?php endif; ?>
                <div class="mt-4r">
                    <?= $content ?>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (!empty($address)) : ?>
                    <p class="mb-0 d-none d-md-block"><i class="fa-solid fa-location-dot me-2"></i><?= $address ?></p>
                <?php endif; ?>

                <div class="row mt-4r">
                    <?php foreach ($images as $image) :
                        $url = wp_get_attachment_url($image);
                    ?>
                        <div class="col-12 mb-1hr">
                            <a href="<?= $url ?>" title="<?= get_the_title($image) ?>">
                                <img src="<?= $url ?>" class="img-fluid" title="<?= get_the_title($image) ?>" alt="<?= get_the_title($image) ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>




<?php get_footer();