<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;


?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- wp_head begin -->
    <?php wp_head(); ?>
    <!-- wp_head end -->

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>


    <header class="fixed-top">
        <?= do_shortcode( '[ht_nav]' ) ?>
        <nav class="bg-white navbar navbar-light navbar-expand-xl w-100 py-2 py-lg-1hr">
            <div class="container-fluid">
                <a href="<?= site_url(); ?>" class="d-flex align-items-center me-lg-4hr text-dark text-decoration-none">
                    <?= do_shortcode('[yc_get_site_logo width="300" height="60"]'); ?>

                </a>
                <button class="navbar-toggler" type="button" id="dropdown-btn">
                    <span class="navbar-toggler-icon d-flex align-items-center"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end text-center" id="dropdown-content">
                    <ul class="navbar-nav me-0 me-lg-3 mb-2 mb-lg-0">
                        <li class="nav-item text-start position-relative">
                            <a class="nav-link dropdown-toggle py-xl-2" href="#" id="nav-service" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                關於我們</a>
                            <ul class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= site_url('about') ?>">品牌介紹</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('faq') ?>">常見問題</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('news'); ?>">最新消息</a></li>
                            </ul>
                        </li>
                        <li class="nav-item text-start">
                            <a class="nav-link" aria-current="page" href="<?= site_url('process') ?>">驗屋流程及檢測項目</a>
                        </li>
                        <li class="nav-item text-start position-relative">
                            <a class="nav-link dropdown-toggle py-xl-2" href="#" id="nav-service" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                特色服務</a>
                            <ul class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= site_url('房屋檢驗') ?>">房屋檢驗</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('law') ?>">法律諮詢</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('house-check') ?>">房屋健檢</a></li>
                            </ul>
                        </li>
                        <li class="nav-item text-start position-relative">
                            <a class="nav-link dropdown-toggle py-xl-2" href="#" id="nav-collect" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                驗屋實例</a>
                            <ul class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= site_url('ht-cases') ?>">實際案例</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('google') ?>">GOOGLE好評</a></li>
                            </ul>
                        </li>

                        <li class="nav-item text-start position-relative">
                            <a class="nav-link dropdown-toggle py-xl-2" href="#" id="nav-collect" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                高澄嚴選</a>
                            <?php
                            /**
                             * @todo
                             */
                            // wp_nav_menu(array(
                            //     'theme_location' => 'primary',
                            //     'container' => false,
                            //     'menu_class' => '',
                            //     'fallback_cb' => '__return_false',
                            //     'items_wrap' => '<ul id="%1$s" aria-labelledby="dropdownMenuButton1" class="dropdown-menu py-0 %2$s">%3$s</ul>',
                            //     'walker' => new bootstrap_5_wp_nav_menu_walker(),

                            // ));
                            ?>
                            <ul class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= site_url('室內設計') ?>">室內設計</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('淨水器') ?>">淨水器</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('小狗吸塵器') ?>">小狗吸塵器</a></li>
                            </ul>

                        </li>
                        <li class="nav-item text-start">
                            <a class="nav-link" aria-current="page" href="<?= site_url('hiring'); ?>">人才招募</a>
                        </li>
                        <li class="nav-item text-start">
                            <a class="nav-link" aria-current="page" href="<?= site_url('contact-us'); ?>">聯絡我們</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <script>
        document.querySelectorAll('.dropdown a').forEach(function(e) {
            e.addEventListener('click', function(event) {
                //event.preventDefault();
                event.target.classList.toggle('expanded');
            });
        });
        document.getElementById('dropdown-btn').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('dropdown-content').classList.toggle('slide-expanded');
            document.getElementById('dropdown-content').classList.toggle('show');
        });
    </script>





    <main id='theme-main'>