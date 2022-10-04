<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$sliders = get_post_meta(get_the_ID(), 'slider');
$iso_imgs = get_post_meta(get_the_ID(), 'iso_img');
$secs = get_post_meta(get_the_ID(), 'sec', true);

$iso_title = get_post_meta(get_the_ID(), 'iso_title', true);
$slider_title = get_post_meta(get_the_ID(), 'slider_title', true);





echo do_shortcode('[ht_banner]');


?>


<?php if (!empty($secs)) :

    foreach ($secs as $key => $sec) :
        $mt = (($key % 2) == 0) ? 'mt-lg-10r mt-2r' : '';

?>

        <section class="<?= $mt ?> mb-4hr m-font">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row justify-content-center">
                            <div class="col-5 col-lg-12 mb-1r">
                                <img src="<?= wp_get_attachment_image_url($sec['img'], 'full') ?>" class="w-100" alt="">
                            </div>
                        </div>

                    </div><!-- /col -->
                    <div class="col-lg-8 pe-lg-3r font-list">
                        <?= $sec['html'] ?>
                    </div><!-- /col -->
                </div>
            </div>
        </section>
<?php
    endforeach;
endif; ?>

<?php if (!empty($iso_imgs)) : ?>
    <section>
        <div class="container mb-2hr">
            <div class="row mb-2hr">
                <div class="col-12">
                    <div class="title-line">
                        <h5 class="fw-normal"><?= $iso_title ?></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="w-100 pt-2hr pb-1hr px-1hr">

                        <div class="cert-slide">
                            <?php foreach ($iso_imgs as $slider) : ?>
                                <div class="px-2">
                                    <a href="<?= wp_get_attachment_image_url($slider, 'full') ?>">
                                        <img class="ratio ratio-3x4" style="object-fit:contain !important;" src="<?= wp_get_attachment_image_url($slider, 'full') ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php endif; ?>

<?php if (!empty($sliders)) : ?>
    <section>
        <div class="container mb-2hr">
            <div class="row mb-2hr">
                <div class="col-12">
                    <div class="title-line">
                        <h5 class="fw-normal"><?= $slider_title ?></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="w-100 bg-gray-400 pt-2hr pb-1hr px-1hr">

                        <div class="cert-slide">
                            <?php foreach ($sliders as $slider) : ?>
                                <div class="px-2">
                                    <a href="<?= wp_get_attachment_image_url($slider, 'full') ?>">
                                        <img class="ratio ratio-4x3" src="<?= wp_get_attachment_image_url($slider, 'full') ?>" alt="">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php endif; ?>

<script>
    (function($) {
        $('.cert-slide').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: false,
            dots: true,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    })(jQuery)
</script>


<?php get_footer();
