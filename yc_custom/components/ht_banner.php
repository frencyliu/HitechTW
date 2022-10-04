<?php

add_filter( 'rwmb_meta_boxes', 'custom_field_for_page' );

function custom_field_for_page( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'      => __( 'BANNER', 'hitechtw' ),
        'id'         => 'banner',
        'post_types' => ['page', 'ht-select'],
        'fields'     => [
            [
                'name'    => __( '桌機', 'hitechtw' ),
                'id'      => $prefix . 'pc_banner',
                'type'    => 'single_image',
                'columns' => 6,
            ],
            [
                'name'    => __( '手機', 'hitechtw' ),
                'id'      => $prefix . 'mobile_banner',
                'type'    => 'single_image',
                'columns' => 6,
            ],
        ],
    ];

    return $meta_boxes;
}

function ht_banner_function($atts = array())
{
    extract(shortcode_atts(array(), $atts));

    $banner_pc_img = rwmb_meta('pc_banner', ['size' => 'full']);
    $banner_mobile_img = rwmb_meta('mobile_banner', ['size' => 'full']);

    if (empty($banner_mobile_img)) {
        $banner_mobile_img = $banner_pc_img;
    }


    $html = '';
    ob_start();
?>

    <?php if ($banner_pc_img !== false) : ?>
        <section>
            <img class="w-100 m-src" m-src="<?= $banner_mobile_img['url']; ?>" src="<?= $banner_pc_img['url']; ?>" alt="">
        </section>
    <?php endif; ?>


<?php
    $html .= ob_get_clean();


    return $html;
}

add_shortcode('ht_banner', 'ht_banner_function');
