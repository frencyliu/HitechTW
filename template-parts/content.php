<?php

$URL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


$locale = get_locale();
if ($locale == 'en_US') {
    $word_count = str_word_count(strip_tags(get_the_content()));
    $new_insight = "New Insight";
} else {
    $word_count = mb_strlen(strip_tags(get_the_content()));
    $new_insight = "最新洞見";
}
$mins_to_read = ceil($word_count / 250);
/*echo '字數統計：';
var_dump($word_count);*/
?>


<div id="posts" class="col-md-9 pe-md-7hr ps-md-3r text-gray-900 click_to_see_big_img">
    <?php
    echo get_the_post_thumbnail(get_the_ID(), 'full', array('class'    => 'w-100 ratio ratio-16x9 mb-3hr'));
    ?>
    <p class="mt-0 mb-1r"><?php echo date('F dS, Y', get_post_time('U')); ?> ‧ <?php echo $mins_to_read; ?> min read</p>
    <h1 class="mb-2r"><?php the_title(); ?></h1>
    <div class="post-meta mb-3hr">
        <div class="col-md-12">
            <div class="row">
                <div class="col-auto post_cat">
                    <?php
                    $cats = get_the_category();
                    $parent_cats = array(1, 7, 11, 54);
                    if (!empty($cats)) {
                        foreach ($cats as $cat) {

                            if (!in_array($cat->term_id, $parent_cats)) {
                                echo '<a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a>';
                            }
                        }
                    }
                    //var_dump($cat);
                    ?>
                </div>

            </div>
        </div>
    </div>


    <div class="post-body">
        <?php echo the_content(); ?>
    </div>


    <!-- <div class="col-md-12 share-btn" style="margin-top:1.25rem;">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h6 class="text-gray-600 mb-0"><?php _e('Share This Information.', 'bootstrap-basic4'); ?></h6>
            </div>
            <div class="col-auto share-btn-icon">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $URL; ?>" target="_blank">
                    <i class="fab fa-facebook-f"></i></a>

                <a href="https://twitter.com/intent/tweet?url=<?php echo $URL; ?>" target="_blank"><i class="fab fa-twitter"></i></a>



                <i class="fab fa-linkedin-in">

                    <script type="IN/Share" data-url="<?php echo $URL; ?>"></script>
                </i>

                <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo get_permalink() ?>"><i class="fal fa-envelope"></i></a>

            </div>
        </div>
    </div> -->

    <!-- <div class="col-12 mt-3r">
        <h6 class="text-gray-600 pb-2 mb-2r border-bottom border-gray-400"><?= $new_insight ?></h6>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC',
                'meta_key' => '_locale',
                'meta_value' => $locale,
            );


            $posts = get_posts($args);
            ?>
            <?php foreach ($posts as $the_post) :


                $multi_authors_id = get_post_meta($the_post->ID, 'multi_author', true);
                if (!empty($multi_authors_id)) {
                    $user = get_userdata($multi_authors_id[0]);
                    switch ($locale) {
                        case 'en_US':
                            $name = get_user_meta($multi_authors_id[0], 'display_name_en', true);
                            break;

                        default:
                            $name = $user->data->display_name;
                            break;
                    }


                    $author_url = get_author_posts_url($multi_authors_id[0]);
                    $author = '<a class="text-gray-500" href="' . $author_url . '">' . $name . '</a>';
                } else {
                    $author = '';
                }




                $date = '<time>' . get_the_date('Y.m.d', $the_post) . '</time>';
            ?>


                <div class="col-md-4 mb-2r px-md-1hr">
                    <article role="article" id="post-<?php echo $the_post->ID; ?>" class="">
                        <a href="<?php echo get_the_permalink($the_post); ?>">
                            <h3 class="fs-1r max-3-line text-primary-d-100 mb-2"><?php echo get_the_title($the_post); ?></h3>
                        </a>
                        <p class="text-gray-500 pb-1 small"><?php echo $date . ' ' . $author; ?></p>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </div> -->



</div>


<script>
    //FB分享按鈕
    jQuery('.fa-facebook-f').on('click', function() {
        FB.ui({
                method: 'share',
                href: location.href, //當前網址
            },
            // callback
            /*function(response) {
                if (response && !response.error_message) {
                    alert('Posting compseted.');
                } else {
                    alert('Error while posting.');
                }
            }*/
        );
    });
</script>

<script src="https://platform.linkedin.com/in.js" type="text/javascript">
    lang: en_US
</script>