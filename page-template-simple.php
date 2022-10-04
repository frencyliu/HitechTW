<?php

/**
 * Template Name: 簡單版型 (ex小狗吸塵器)
 * 需要在 /assets/js/admin.js 調整後台選單
 */


// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

/**
 * 高澄嚴選
 */



[
    'brand_name'    => $brand_name,
    'brand_image' => $brand_image
] = rwmb_meta('brand_data_left');
$brand_image = wp_get_attachment_image_url($brand_image, 'full');

[
    'title_name'    => $title_name,
    'fb_link'       => $fb_link,
    'site_link'     => $site_link,
    'brand_content' => $brand_content
] = rwmb_meta('brand_data_right');


/**
 * 簡單版型 simple_template
 */

$text_area = rwmb_meta('simple_group_left');
$images = rwmb_meta('img', ['size' => 'full']);

echo do_shortcode( '[ht_banner]' );

?>


<section class="mt-5r mb-3r">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="lc-block">
                    <div editable="rich">
                        <h1 class="mb-3r"><?= $brand_name ?></h1>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="lc-block mb-2r"><a href="<?= $brand_image ?>"><img class="w-100" src="<?= $brand_image ?>"></a></div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-lg-6">
                <div class="lc-block position-relative">


                    <div editable="rich">
                        <?php if(!empty($title_name)): ?>
                        <div class="border-gray-900 ps-2r mb-2r" style="border-left:1rem solid">
                            <h2 class="text-gray-900"><?= $title_name ?></h2>
                        </div>
                        <?php endif; ?>
                        <div style="text-align:justify;">
                            <?= wpautop($brand_content); ?>
                        </div>
                    </div>


                    <div class="position-absolute end-0" style="top:-1rem;">
                        <?php if (!empty($fb_link)) : ?>
                            <a href="<?= $fb_link ?>" target="_blank" class="nolightbox me-2" rel="noopener"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAiCAYAAAA6RwvCAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAIOSURBVHgB7VjLccIwEF17cuAWqCDiAMNwcjowFUAHmAqSDmIqyKQCkgpCKsAdhBOfm6ggPnKCvDXrjPDEQIhtOPjNLCuLtfUs7a7WsghotVoKamRZlrPdbqtUADBWiLHGaA4Xi4W2hMQEwjqAaCoAIFIFkZ6M17nBj88kbNu+n81mUyoQ7Xbb2Ww2n2iObDDrgtlH0SQYMmaA8R2bfQJkvuhyWPEy2XQluBoiN5QxEIUuVB+isOwh9Ao6QDBMOUwpbyJxLoK40qUxeFV88EFsPJB5++3+LJdmIiSG6/W6hgHr8/m8xm30DcSmnnZzJkT4TWmXEDlL+lrrMP5P2sGxZ2S1NH32h+Vy6ccdSqlqpVLhJVGSRSl3IrxHQe0lRJDgjKm4fYxEZkRko9TxtTguR80LZunxlGfkmkd4hz3V9uwZMfJFKjAjXdjdGV1BWvj+Z2kUxDtkIL7jGF2rNNssfKSDtwzMDsmgVnzdbDZ7SG7vdCCMC9lrMDMuayS31FIjixl5gh+wr/ysv+SQZ8PGpSi36TBPIq7RjoiABIezZxpx8XXoIWcTwdu/QrFwBKVlrCjl0wkoC6MkSiJJlESSKIkkYUvNoOhCQMa95TKTPzl5I3IbjYZDBYM/wjERPch471iCzyv+UlUZ8GhXKgZ8ER858EuinbbjKpLNENKJagYh48vJQJEHNUxywPXLN4EM3Y/4CBrmAAAAAElFTkSuQmCC" width="34" height="34"></a>
                        <?php endif; ?>
                        <?php if (!empty($site_link)) : ?>
                            <a href="<?= $site_link ?>" target="_blank" rel="noopener" class="nolightbox"><img src="data:image/png;base64,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" width="34" height="34"></a>
                        <?php endif; ?>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->

            <div class="col-12 mt-2r">
                <hr class="opacity-1 text-gray-900">
            </div>
        </div>
    </div>
</section>



<section class="mb-3r">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3r">
                <?php foreach ($text_area as $key => $text_single_area) :
                    [
                        'title' => $title,
                        'content' => $content,
                        'btn_text' => $btn_text,
                        'btn_link' => $btn_link,
                        'in_new_window' => $in_new_window,
                    ] = $text_single_area;

                ?>
                    <div class="lc-block border-gray-900 ps-2r mb-1hr" style="border-left:1rem solid">
                        <h2 class="text-gray-900"><?= $title ?></h2>
                    </div>
                    <div class="lc-block mb-3r">
                        <div editable="rich">
                            <?= wpautop($content); ?>
                        </div>

                    </div>
                    <?php if (!empty($btn_text)) : ?>
                        <div class="lc-block text-end"><a class="btn btn-primary w-100" href="<?= $btn_link ?>" <?= ($in_new_window) ? 'target="_blank"' : '' ?> role="button" rel="noopener"><?= $btn_text ?></a></div><!-- /lc-block -->
                    <?php endif; ?>
                <?php endforeach; ?>
            </div><!-- /col -->
            <?php if(!empty($images)): ?>
            <div class="col-lg-6">
                <?php foreach ($images as $image): ?>
                <div class="lc-block">
                    <a href="<?= $image['url'] ?>">
                        <img src="<?= $image['url'] ?>" alt="<?= $image['name'] ?>" class="w-100">
                    </a>
                </div>
                <?php endforeach; ?>
            </div><!-- /col -->
            <?php endif; ?>
        </div>
    </div>
</section>








<?php get_footer();
