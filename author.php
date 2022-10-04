<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$author_id = get_queried_object_id();
$locale = get_locale();
switch ($locale) {
    case 'en_US':
        $name =  get_user_meta($author_id, 'display_name_en', true);
        $job_title = get_user_meta($author_id, 'job_title_en', true);
        $user_excerpt = get_user_meta($author_id, 'user_excerpt_en', true);
        $profile_title = '';
        $latest_insights = 'Latest Insights';
        break;

    default:
        $name =  get_user_meta($author_id, 'display_name', true);
        $job_title = get_user_meta($author_id, 'job_title', true);
        $user_excerpt = get_user_meta($author_id, 'user_excerpt', true);
        $profile_title = '簡歷';
        $latest_insights = '最近文章';
        break;
}

$email = get_the_author_meta('user_email', $author_id);
$phone = get_the_author_meta('phone', $author_id);
$linkedin = get_the_author_meta('linkedin', $author_id);
$avatar_arr = get_the_author_meta('simple_local_avatar', $author_id);
$avatar = empty($avatar_arr['full']) ? ('https://secure.gravatar.com/avatar/1c39955b5fe5ae1bf51a77642f052848?s=96&d=mm&r=g') : ($avatar_arr['full']);

//var_dump($avatar_arr);

?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 px-0">
                <div class="lc-block">
                    <img class="w-100 ratio ratio-1x1" alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>">
                </div><!-- /lc-block -->
            </div><!-- /col -->
            <div class="col-md-9 bg-secondary px-0">
                <div class="lc-block h-100">
                    <div class="row h-100">
                        <div class="col-sm-6 col-xl-4 ps-xl-8r py-1r px-3hr d-flex flex-column justify-content-center align-items-sm-center align-items-start">
                            <h3 class="text-primary-d-100 mb-0 text-nowrap"><?php echo $name; ?></h3>
                            <h6 class="text-white text-nowrap"><?php echo $job_title; ?></h6>
                        </div>
                        <div class="col-sm-6 col-xl-8 text-white d-flex flex-column justify-content-center ">
                            <?php if ($author_id != 18) : //YP不顯示
                            ?>
                                <div class="w-100 author-contact ps-3r py-1r">
                                    <?php if (!empty($phone)) : ?>
                                        <a class="text-white" href="tel:<?php echo $phone; ?>" target="_blank">
                                            <p class="mb-2"><i class="fas fa-phone-alt me-2"></i><?php echo $phone; ?></p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($email)) : ?>
                                        <a class="text-white" href="mailto:<?php echo $email; ?>" target="_blank">
                                            <p class="mb-2"><i class="fas fa-envelope me-2"></i><?php echo $email; ?></p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($linkedin)) : ?>
                                        <a class="text-white" href="<?php echo $linkedin; ?>" target="_blank">
                                            <p class="mb-2"><i class="fab fa-linkedin me-2"></i><?php echo $linkedin; ?></p>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>
<section class="py-4hr">
    <div class="container">
        <div class="row">
            <div class="col-md-8 border-end border-gray-500 pe-lg-3hr px-2r">
                <div class="user_excerpt text-gray-700 mb-3r">
                    <h5><?= $profile_title ?></h5>
                    <?php echo wpautop($user_excerpt); ?>
                </div>
            </div><!-- /col -->
            <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'meta_query' => array(
                    'relation' => 'AND',
                    'author_clause' => array(
                        'key' => 'multi_author',
                        'value' => serialize(strval($author_id)),
                        'compare' => 'LIKE'
                    ),
                    'locale_clause' => array(
                        'key' => '_locale',
                        'value' => get_locale(),
                    ),
                ),
            );


            $posts = get_posts($args);

            if (!empty($posts)) :
            ?>

                <div class="col-md-4 px-lg-4hr px-2r">
                    <div class="lc-block mb-1r">
                        <div editable="rich"><?= $latest_insights ?><br></div>
                    </div><!-- /lc-block -->
                    <div class="lc-block recent-post">
                        <?php foreach ($posts as $the_post) : ?>

                            <div class="col-12">
                                <article role="article" id="post-<?php echo $the_post->ID; ?>" class="border-bottom border-gray-400">
                                    <a href="<?php echo get_the_permalink($the_post); ?>">
                                        <h3 class="h6 text-gray-800 mb-1"><?php echo get_the_title($the_post); ?></h3>
                                    </a>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer();
