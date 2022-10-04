<?php

// Exit if accessed directly.

defined('ABSPATH') || exit;

get_header();

$imgs = get_post_meta(get_the_ID(), 'img_group', true );

echo do_shortcode( '[ht_banner]' );
?>
<style>
    .wp-gr.wpac .wp-google-review .wp-google-stars,
    .wp-gr.wpac .wp-google-review .wp-google-text {
        display: block;
    }

    .wp-gr.wpac .wp-google-reviews {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-column-gap: 1.5rem;
        grid-row-gap: 1.5rem;
    }

    .wp-gr.wpac .wp-google-review {
        padding: 1rem !important;
        background-color: #f0f0f0 !important;
        border-radius: 5px !important;
        margin-top: 0px !important;
    }

    .wp-gr.wpac .wp-google-review .wp-google-text {
        height: 100px;
        overflow: auto !important;
        padding-right: 0.5rem !important;
    }

    .wp-google-left img {
        max-width: unset !important;
    }

    .wp-star svg path {
        fill: #f4b82b !important;
    }

    .container .wp-gr .wp-google-rating {
        color: #f4b82b !important;
    }

    .wp-google-powered {
        display: none !important;
    }

    .wp-gr.wpac .wp-google-place {
        margin-bottom: 2rem !important;
    }

    .wp-google-place .wp-google-right {
        padding-left: 0.5rem !important;
    }

    .google-girl {
        position: absolute;
        top: -7.5rem;
        right: 2rem;
        width: 10rem;
        z-index: 9;
    }

    .fa-star-sharp {
        color: #f6bb06;
        margin-right: 0.25rem;
        font-size: 0.7em;
    }

    .fa-star-sharp.first {
        margin-left: 0.5rem;
    }


    @media (max-width:991px) {
        .wp-gr.wpac .wp-google-reviews {
            grid-template-columns: 100% !important;
        }

        .google-girl {
            position: absolute;
            top: -3.75rem;
            right: 2rem;
            width: 5rem;
        }
    }

    @media (max-width:576px) {
        .google-girl {
            position: absolute;
            top: -2.25rem;
            right: 2rem;
            width: 3rem;
        }
    }
</style>

<section>
    <div class="container">
        <?php foreach ($imgs as $key => $img): ?>
            <img class="w-100 m-src" m-src="<?= wp_get_attachment_image_url($img['g_img_mobile'], 'full') ?>" src="<?= wp_get_attachment_image_url($img['g_img_pc'], 'full') ?>" alt="">
            <?php endforeach; ?>

    </div>
</section>

<section>
    <div class="container mb-5r">
        <div class="col-12 shadow p-2r position-relative">
            <img class="google-girl" src="<?= IMG_URL ?>/google-girl.png" alt="">
            <h1 class="h4 text-gray-900 fw-normal">高澄科技有限公司 專業驗屋</h1>
            <p class="rating h4 text-gray-900 fw-normal">5.0 <i class="fa-solid fa-star-sharp first"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i><i class="fa-solid fa-star-sharp"></i></p>
            <?= do_shortcode('[trustindex data-widget-id=b2dddcd9107335015d569af83f]'); ?>


        </div>
    </div>
</section>

<?php get_footer();
