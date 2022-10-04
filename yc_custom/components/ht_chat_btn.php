<?php
add_filter('mb_settings_pages', 'add_ht_chatbtn_submenu');

function add_ht_chatbtn_submenu($settings_pages)
{
    $settings_pages[] = [
        'menu_title'  => __('聊天按鈕', 'hitechtw'),
        'id'          => 'ht_chatbtn',
        'option_name' => 'ht_chatbtn',
        'position'    => 2,
        'parent'      => 'edit.php?post_type=page',
        'capability'  => 'edit_posts',
        'style'       => 'no-boxes',
        'columns'     => 1,
        'icon_url'    => 'dashicons-admin-generic',
    ];

    return $settings_pages;
}


add_filter('rwmb_meta_boxes', 'ht_chatbtn_custom_field');

function ht_chatbtn_custom_field($meta_boxes)
{
    $prefix = '';

    $meta_boxes[] = [
        'title'          => __('聊天按鈕', 'your-text-domain'),
        'id'             => 'ht_chatbtn',
        'settings_pages' => ['ht_chatbtn'],
        'fields'         => [
            [
                'name'    => __('Messenger', 'your-text-domain'),
                'id'      => $prefix . 'ht_fb',
                'type'    => 'url',
                'columns' => 12,
            ],
            [
                'name'    => __('LINE', 'your-text-domain'),
                'id'      => $prefix . 'ht_line',
                'type'    => 'url',
                'columns' => 12,
            ],
            [
                'name'    => __('電話', 'your-text-domain'),
                'id'      => $prefix . 'ht_phone',
                'type'    => 'text',
                'columns' => 12,
            ],
        ],
    ];

    return $meta_boxes;
}


function ht_chatbtn_function($atts = array())
{
    extract(shortcode_atts(array(), $atts));

    $data = get_option('ht_chatbtn');

    $html = '';
    ob_start();
?>

    <div class="d-flex flex-column position-fixed" style="right:1rem;bottom:1rem;z-index:9999;">
        <?php if (!empty($data['ht_fb'])) : ?>
            <a  class="nolightbox chatbtn_fb" target="_blank" href="<?= $data['ht_fb'] ?>">
                <img class="ht_chat_btn" src="<?= IMG_URL ?>/messenger.png"  alt="">
            </a>
        <?php endif; ?>
        <?php if (!empty($data['ht_line'])) : ?>
            <a  class="nolightbox chatbtn_line" target="_blank" href="<?= $data['ht_line'] ?>">
                <img class="ht_chat_btn" src="<?= IMG_URL ?>/line.png"  alt="">
            </a>
        <?php endif; ?>
        <?php if (!empty($data['ht_phone'])) : ?>
            <a  class="nolightbox chatbtn_phone" target="_blank" href="tel:<?= $data['ht_phone'] ?>">
                <img class="ht_chat_btn" src="<?= IMG_URL ?>/tel.png"  alt="">
            </a>
        <?php endif; ?>


    </div>

    <?php if (!empty($data['ht_chatbtn_text'])) : ?>

    <?php endif; ?>

<?php
    $html .= ob_get_clean();


    return $html;
}

add_shortcode('ht_chatbtn', 'ht_chatbtn_function');
