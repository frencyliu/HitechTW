<?php
add_filter( 'mb_settings_pages', 'add_ht_nav_submenu' );

function add_ht_nav_submenu( $settings_pages ) {
	$settings_pages[] = [
        'menu_title'  => __( '網站頂部選單', 'hitechtw' ),
        'id'          => 'ht_nav_menu',
        'option_name' => 'ht_nav_menu',
        'position'    => 2,
        'parent'      => 'edit.php?post_type=page',
        'capability'  => 'edit_posts',
        'style'       => 'no-boxes',
        'columns'     => 1,
        'icon_url'    => 'dashicons-admin-generic',
    ];

	return $settings_pages;
}


add_filter( 'rwmb_meta_boxes', 'ht_nav_custom_field' );

function ht_nav_custom_field( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'          => __( 'NAV', 'your-text-domain' ),
        'id'             => 'ht_nav',
        'settings_pages' => ['ht_nav_menu'],
        'fields'         => [
            [
                'name'    => __( '頂部文字', 'your-text-domain' ),
                'id'      => $prefix . 'ht_nav_text',
                'type'    => 'textarea',
                'columns' => 4,
            ],
            [
                'name'    => __( '按鈕文字', 'your-text-domain' ),
                'id'      => $prefix . 'ht_btn_text',
                'type'    => 'text',
                'columns' => 4,
            ],
            [
                'name'    => __( '按鈕連結', 'your-text-domain' ),
                'id'      => $prefix . 'ht_btn_link',
                'type'    => 'url',
                'columns' => 4,
            ],
        ],
    ];

    return $meta_boxes;
}


function ht_nav_function($atts = array())
{
    extract(shortcode_atts(array(), $atts));

    $data = get_option( 'ht_nav_menu' );

    $html = '';
    ob_start();
?>
<?php if(!empty($data['ht_nav_text'])): ?>
    <nav class="bg-primary py-2 top-nav">
        <div class="container">
            <div class="row flex-nowrap justify-content-center">
                <div class="col-lg-auto col d-flex align-items-center">
                    <p class="text-white mb-0 small"><?= $data['ht_nav_text'] ?></p>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <a href="<?= $data['ht_btn_link'] ?>" class="btn btn-sm btn-white py-1"><i class="fa-sharp fa-solid fa-circle-check text-primary me-2"></i><?= $data['ht_btn_text'] ?></a>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>

<?php
    $html .= ob_get_clean();


    return $html;
}

add_shortcode('ht_nav', 'ht_nav_function');
