<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

//首頁輪播
$slider = get_post_meta(get_the_ID(), 'slide', true);

//還好有找高澄驗屋
$feature = get_post_meta(get_the_ID(), 'slide', true);
$title_1 = rwmb_get_value('title_1');
$subtitle_1 = rwmb_get_value('subtitle_1');
$img_1 = rwmb_get_value('img_1', ['size' => 'full']);
$counts = get_post_meta(get_the_ID(), 'count_group', true);


//最完整驗屋服務
$img_2_1 = rwmb_get_value('img_2_1', ['size' => 'full']);
$title_2_1 = rwmb_get_value('title_2_1');
$subtitle_2_1 = rwmb_get_value('subtitle_2_1');
$text_5p = rwmb_get_value('text_5p');

$group_6a = get_post_meta(get_the_ID(), 'group_6a', true);
$group_5p = get_post_meta(get_the_ID(), 'group_5p', true);

$btn_text_2_1 = rwmb_get_value('btn_text_2_1');
$btn_link_2_1 = rwmb_get_value('btn_link_2_1');



$google_bg = rwmb_get_value('google_bg', ['size' => 'full']);
$google_title1 = rwmb_get_value('google_title1');
$google_title2 = rwmb_get_value('google_title2');



//QA
if ($faqpost = get_page_by_path('faq', OBJECT, 'page')) {
    $faqpost_id = $faqpost->ID;
    $qas = get_post_meta($faqpost_id, 'house_check_qa');
    //只取4個
    $qas = array_slice($qas[0], 0, 4);
}




?>
<?php if (!empty($slider)) : ?>
    <section class="m-font">
        <div class="container-fluid px-0">
            <div class="col-lg-12">
                <div class="lc-block">

                    <?php if (count($slider) == 1) :
                        $img_html = '<img class="w-100 m-src" m-src="' .  wp_get_attachment_image_url($slider[0]['slide_img_mobile'], 'full') . '" src="' .  wp_get_attachment_image_url($slider[0]['slide_img'], 'full') . '">';
                        $img_html = handleLink($img_html, $slider[0]['slide_link'])
                    ?>
                        <?= $img_html ?>
                    <?php else : ?>
                        <div class="home-slide" style="max-width: 100%;">
                            <?php foreach ($slider as $slide) :
                                $img_html = '<img class="w-100 ratio ratio-11x5 m-src" m-src="' .  wp_get_attachment_image_url($slider[0]['slide_img_mobile'], 'full') . '" src="' .  wp_get_attachment_image_url($slide['slide_img'], 'full') . '">';
                                $img_html = handleLink($img_html, $slide['slide_link'])
                            ?>
                                <div>
                                    <?= $img_html ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <script>
                            (function($) {
                                $('.home-slide').slick({
                                    autoplay: true,
                                    autoplaySpeed: 3000,
                                    dots: true,
                                    arrows: false,
                                });
                            })(jQuery)
                        </script>
                    <?php endif; ?>



                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </section>
<?php endif; ?>

<section class="px-1r m-font">
    <div class="container bg-secondary-100 mt-5r px-2hr py-2hr mb-lg-2hr mb-1hr" id="counter">
        <div class="row">
            <div class="col-lg-8 text-center px-lg-1hr d-flex flex-column justify-content-center order-2 order-lg-1">
                <h1 class="text-gray-800 fw-bold mb-1r"><?= $title_1 ?></h1>
                <div class="text-gray-800 h5"><?= wpautop($subtitle_1) ?></div>
            </div>
            <div class="col-lg-4 px-lg-2r order-1 order-lg-2 text-center">
                <img src="<?= $img_1['url'] ?>" class="col-6 col-lg-12" alt="">
            </div>
        </div>
        <div class="row">
            <?php
            $count_ms = '';
            foreach ($counts as $key => $count) :
                if ($key !== 'ms') :
            ?>
                    <div class="col-lg-4">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <img width="100" src="<?= wp_get_attachment_image_url($count['icon'], 'full'); ?>" alt="">

                                </td>
                                <td>
                                    <p class="counter-value h1 fw-thin mb-1" data-count="<?= $count['count'] ?>" style="font-family:
Georgia">0</p>
                                    <p class="mb-0 h6 fw-normal"><?= $count['icon_text'] ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
            <?php
                else :
                    $count_ms = $count;
                endif;
            endforeach; ?>

        </div>
    </div>


    <script>
        (function($) {
            let a = 0;
            $(document).scroll(function() {

                const oTop = $('#counter').offset().top - window.innerHeight;
				
                if (a == 0 && $(window).scrollTop() > oTop) {
                    $('.counter-value').each(function() {
                        const $this = $(this),
                            countTo = $this.attr('data-count');
                        $({
                            countNum: $this.text()
                        }).animate({
                                countNum: countTo
                            },

                            {

                                duration: <?= (int) $count_ms  ?>,
                                easing: 'swing',
                                step: function() {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function() {
                                    $this.text(this.countNum);
                                    //alert('finished');
                                }

                            });
                    });
                    a = 1;
                }

            })
        })(jQuery)
    </script>
</section>

<section class="px-1r m-font">
    <div class="container bg-secondary-100 px-xl-2hr px-1r pt-2r pb-1hr mb-xl-2hr mb-1hr" id="iso">
        <div class="row">
            <div class="col-xl-3 px-1hr d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-6 offset-3 col-xl-12 offset-xl-0 text-center mb-1r"><img class="w-100" src="<?= $img_2_1['url'] ?>" alt=""></div>
                </div>
            </div>

            <div class="col-xl-9">
                <div class="row mb-2r">
                    <div class="col-12">
                        <h4 class="text-black fw-normal title-pipe text-center text-xl-start" style="margin-bottom:0.75rem"><?= $title_2_1 ?></h4>
                        <div class="text-gray-800 mb-2 ps-xl-1r text-center text-xl-start"><?= wpautop($subtitle_2_1) ?></div>
                        <div class="col-xl-2 d-flex justify-content-center align-items-end d-xl-none">
                            <a href="<?= $btn_link_2_1 ?>" class="btn btn-primary"><?= $btn_text_2_1 ?></a>
                        </div>

                    </div>
                </div>
                <div class="row d-none d-xl-flex">
                    <div class="col-xl-4 d-flex flex-column">
                        <h5 class="text-black fw-normal" style="margin-bottom:0.75rem"><?= $group_6a['text_6a'] ?></h5>
                        <ul class="text-gray-800 small mb-0 d-flex flex-column justify-content-between">
                            <?php foreach ($group_6a['subgroup_6a'] as $li) : ?>
                                <li><?= $li['6a'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-xl-6 d-flex flex-column">
                        <h5 class="text-black fw-normal" style="margin-bottom:0.75rem"><?= $group_5p['text_5p'] ?></h5>
                        <ul class="text-gray-800 small mb-0 d-flex flex-column justify-content-between" style="flex-grow: 1;">
                            <?php

                            foreach ($group_5p['subgroup_5p'] as $li) : ?>
                                <li><?= $li['5p'] ?></li>
                            <?php endforeach; ?>

                        </ul>



                    </div>
                    <div class="col-xl-2 d-flex align-items-end">
                        <a href="<?= $btn_link_2_1 ?>" class="btn btn-primary"><?= $btn_text_2_1 ?></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


<section class="px-1r d-block d-xl-none m-font">
    <div class="container bg-secondary-100 px-xl-2hr px-2r pt-2r pb-1hr mb-xl-2hr mb-1hr">
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-4">
                        <h5 class="text-black fw-normal" style="margin-bottom:0.75rem"><?= $group_6a['text_6a'] ?></h5>
                        <ul class="text-gray-800 small">
                            <?php foreach ($group_6a['subgroup_6a'] as $li) : ?>
                                <li><?= $li['6a'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


<section class="px-1r d-block d-xl-none m-font">
    <div class="container bg-secondary-100 px-xl-2hr px-2r pt-2r pb-1hr mb-xl-2hr mb-1hr">
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="text-black fw-normal" style="margin-bottom:0.75rem"><?= $group_5p['text_5p'] ?></h5>
                        <ul class="text-gray-800 small">
                            <?php
                            foreach ($group_5p['subgroup_5p'] as $li) : ?>
                                <li><?= $li['5p'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<section class="px-1r m-font">
    <div class="container py-1hr px-lg-2hr px-1r google-sec" style="background-image:url('<?= $google_bg['url'] ?>')">
        <div class="row">
            <div class="col-12">
                <p class="mb-1r h1 text-nowrap"><?= $google_title1 ?><br>
                <?= $google_title2 ?></p>
                <p class="h6 text-gray-800 bg-white mb-2r d-inline-block px-1r text-center text-lg-start">Google評論，滿分<span class="text-primary h3 fw-normal">5顆星</span>推薦，<br class="d-lg-none" />高澄專業驗屋，安心交屋</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded-2 pt-1hr pb-1r px-1r">
                    <h6 class="ps-1hr mb-1hr">高澄科技有限公司 專業驗屋 5.0 <i class="ms-1r fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></h6>
                    <?= do_shortcode('[trustindex data-widget-id=42bf7c5912cc3497fd53d5ce00]') ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="m-font">
    <div class="container pt-3hr mb-2hr">
        <div class="row">
            <div class="col-lg-12">
                <div class="lc-block mb-3r text-center">
                    <h2 editable="inline" class="text-gray-800">常見問題</h2>
                </div>
                <!-- /lc-block -->
            </div>
            <div class="col-lg-6">
                <div class="lc-block">

                    <div class="accordion hp" id="accordionPanelsStayOpenExample">
                        <?php foreach ($qas as $key => $qa) :
                            if ($key % 2 == 0) :
                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading-<?= $key ?>">
                                        <button class="accordion-button max-2-line collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-<?= $key ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse-<?= $key ?>">
                                            <?= $qa['question'] ?>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse-<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading-<?= $key ?>">
                                        <div class="accordion-body">
                                            <?= wpautop($qa['answer']) ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endif;
                        endforeach ?>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->

            <div class="col-lg-6">
                <div class="lc-block">

                    <div class="accordion hp" id="accordionPanelsStayOpenExample">
                        <?php foreach ($qas as $key => $qa) :
                            if ($key % 2 == 1) :
                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading-<?= $key ?>">
                                        <button class="accordion-button max-2-line collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-<?= $key ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse-<?= $key ?>">
                                            <?= $qa['question'] ?>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse-<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading-<?= $key ?>">
                                        <div class="accordion-body">
                                            <?= wpautop($qa['answer']) ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endif;
                        endforeach ?>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <!-- /lc-block -->
            <div class="lc-block"><a href="<?= site_url('faq') ?>" class="btn btn-outline-primary w-100">More &gt;</a></div><!-- /lc-block -->
        </div>

    </div>
</section>


<section class="m-font">
    <div class="container pt-3hr mb-2hr">
        <div class="row">
            <div class="col-lg-12">
                <div class="lc-block mb-3r text-center">
                    <h2 editable="inline" class="text-gray-800">最新消息<br></h2>
                </div>
                <!-- /lc-block -->
                <div class="lc-block">
                    <div lc-helper="posts-loop" class="live-shortcode">
                        <?= do_shortcode(' [lc_get_posts post_type="post" posts_per_page="3" output_view="yc_get_posts_blog_view" output_number_of_columns="3" output_hide_elements="Author" output_featured_image_class="card-img-top ratio-16x9" ]') ?>
                    </div>
                </div>
                <div class="lc-block"><a href="<?= site_url('news') ?>" class="btn btn-outline-primary w-100">More &gt;</a></div><!-- /lc-block -->
            </div>
        </div>

    </div>
</section>
<section class="m-font">
    <div class="container pt-3hr mb-2hr">
        <div class="row">
            <div class="col-lg-12">
                <div class="lc-block mb-3r text-center">
                    <h2 editable="inline" class="text-gray-800">近期案例<br></h2>
                </div>
                <!-- /lc-block -->
                <div class="lc-block d-none d-lg-block">
                    <div class="row">
                        <?php

                        //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'w2dc_listing',
                            'posts_per_page' => 9,
                            'orderby' => 'date',
                        );

                        $the_query = new WP_Query($args);
                        $count_posts = $the_query->found_posts;
                        $count_by_3 = floor($count_posts / 3);
                        $count_by_3 = ($count_by_3 >= 3) ? 3 : $count_by_3;
                        $count = 0;

                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();

                                get_template_part('loops/flip_card', 'flip_card', array(
                                    'column_classes' => 'col-xl-4',
                                    'output_number_of_columns'    => '3',
                                    'output_article_class'        => 'ratio ratio-4x3',
                                    'output_excerpt_text'         => '案例介紹',
                                    'output_featured_image_class' => 'card-img-top',
                                ));
                                if ($count_posts >= 3) {
                                    $count++;
                                    if ($count == $count_by_3 * 3) break;
                                }
                            endwhile;
                        endif;

                        ?>


                    </div>
                </div>
                <!-- /lc-block -->
                <!-- /lc-block -->
                <div class="lc-block d-lg-none">
                    <div class="row">
                        <?php

                        //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'w2dc_listing',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                        );

                        $the_query = new WP_Query($args);


                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();

                                get_template_part('loops/flip_card', 'flip_card', array(
                                    'column_classes' => 'col-xl-4',
                                    'output_number_of_columns'    => '3',
                                    'output_article_class'        => 'ratio ratio-4x3',
                                    'output_excerpt_text'         => '案例介紹',
                                    'output_featured_image_class' => 'card-img-top',
                                ));

                            endwhile;
                        endif;

                        ?>


                    </div>
                </div>
                <!-- /lc-block -->
                <div class="lc-block"><a href="<?= site_url('ht-cases') ?>" class="btn btn-outline-primary w-100">More &gt;</a></div><!-- /lc-block -->
            </div>
        </div>

    </div>
</section>




<?php get_footer();
