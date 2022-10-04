<?php if (is_active_sidebar( 'main-sidebar' )): ?>

    <div class="main-sidebar col-md-3 pt-1r pe-md-0" id="wrapper-main-sidebar">
        <?php do_action('before_sidebar'); ?>
        <?php
        /* echo '<p class="text-gray-900 mb-1hr">搜尋</p>'; */
        get_search_form();
        echo '<p class="mt-1hr text-gray-900 mb-1hr">關於高澄</p>';
        echo '<p class="text-gray-700 mb-1hr small">' . get_bloginfo('description') . '</p>';

        echo do_shortcode( '[yc_latest_news title="最新文章"]' );
        echo do_shortcode( '[yc_get_terms title="分類" view="list" taxonomy="category"]' );
        echo do_shortcode( '[yc_get_terms title="標籤" view="tag" taxonomy="post_tag"]' );

        ?>
    </div>

<?php endif ?>

