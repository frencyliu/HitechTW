<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$locale = get_locale();
switch ($locale) {
    case 'en_US':
        $title = 'Team';
        $sub_title = 'Intellectual property has become the key factor allowing data on file to become profit on the market.';
        break;

    default:
        $title = '團隊介紹';
        $sub_title = '智慧財產將從文件清單上的數據變成制勝商場的關鍵';
        break;
}

$test = get_option('Team_Page', true);
?>
<section class=" wp-image-961">
    <div lc-helper="background" class="pt-4hr pb-5r wp-image-961" style="background:url(<?php echo site_url(); ?>/wp-content/uploads/2022/03/Rectangle-141.jpg)  center / cover no-repeat;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lc-block">
                        <div editable="rich">
                            <h1 class="mb-2r text-white text-center"><?= $title ?></h1>
                        </div>
                    </div><!-- /lc-block -->
                    <div class="lc-block">
                        <div editable="rich">
                            <p class="text-white text-center"><?= $sub_title ?></p>
                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container py-3hr team">
        <div class="row">

            <?php
            $authors = get_users(
                array(
                    'meta_key' => 'show_in_team',
                    'meta_value' => true
                )
            );
            $default_sort = array(); //預設排序 [$key] => $display_name
            foreach ($authors as $key => $author) :
                $display_name = $author->display_name;
                $default_sort[$key] = $display_name;
            endforeach;

            $new_authors_array = array(); //重新排列
            foreach ($test['sort_authors'] as $key => $author_display_name) {
                $i = array_search($author_display_name, $default_sort);
                if ($i !== false) {
                    $new_authors_array[$key] = $authors[$i];
                }
            }

            foreach ($new_authors_array as $author) :
                $email = $author->user_email;
                $phone = get_user_meta($author->ID, 'phone', true);
                $linkedin = get_user_meta($author->ID, 'linkedin', true);
                $avatar = (empty(get_user_meta($author->ID, 'simple_local_avatar', true)[192])) ? ('https://secure.gravatar.com/avatar/1c39955b5fe5ae1bf51a77642f052848?s=96&d=mm&r=g') : (get_user_meta($author->ID, 'simple_local_avatar', true)[192]);

                switch ($locale) {
                    case 'en_US':
                        $name =  get_user_meta($author->ID, 'display_name_en', true);
                        $job_title = get_user_meta($author->ID, 'job_title_en', true);
                        $user_excerpt = get_user_meta($author->ID, 'user_excerpt_en', true);
                        break;

                    default:
                        $name = $author->display_name;
                        $job_title = get_user_meta($author->ID, 'job_title', true);
                        $user_excerpt = get_user_meta($author->ID, 'user_excerpt', true);
                        break;
                }




            ?>
                <div class="col-lg-6">
                    <div class="lc-block text-gray-700 border-bottom border-gray-400 mb-2r">
                        <div class="row mb-1r">
                            <div class="col-auto">
                                <a href="<?php echo get_author_posts_url($author->ID); ?>">
                                    <img class="ratio ratio-1x1" src="<?php echo $avatar; ?>" sizes="(max-width: 5000px) 100vw, 5000px" alt="<?php echo $name; ?>" style="width:11.25rem;">
                                </a>
                            </div>
                            <div class="col d-flex flex-column justify-content-center ps-1r">
                                <a href="<?php echo get_author_posts_url($author->ID); ?>">
                                    <h6 class="text-black mb-2"><?php echo $name; ?></h6>
                                </a>
                                <p class="mb-0"><?php echo $job_title; ?></p>
                            </div>
                        </div>
                        <div editable="inline">
                            <p class="text-truncate-2line"><?php echo strip_tags($user_excerpt); ?></p>
                        </div>
                    </div><!-- /lc-block -->
                </div><!-- /col -->

            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--
<section>
    <div class="container mb-4r">
        <div class="row">
            <div class="col-md-12">
                    <a class="btn btn-outline-primary w-100" href="#" role="button">More &gt;</a>
            </div>
        </div>
    </div>
</section>
            -->

<?php get_footer();
