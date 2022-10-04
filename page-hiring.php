<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

echo do_shortcode( '[ht_banner]' );

?>

<section class="mb-5r">
    <div class="container mt-4r">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="lc-block">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item col-6" role="presentation">
                            <button class="nav-link rounded-0 pb-1hr text-center w-100 h6 fw-light active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">福利制度</button>
                        </li>
                        <li class="nav-item col-6" role="presentation">
                            <button class="nav-link rounded-0 pb-1hr text-center w-100 h6 fw-light" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">工作機會</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3r" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <?php rwmb_the_value('hiring_benifit'); ?>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <?php
                                $job_group = rwmb_meta('job_group');
                                foreach ($job_group as $job) :
                                    if($job['is_show']):
                                ?>
                                 <div class="job-item border-bottom border-gray-600 border-1 pb-3r mb-3r">
                                    <h6 class="text-primary-d-200"><?= handleLink($job['job_title'], $job['104link'], true) ?></h6>
                                    <p class="text-gray-900"><?= $job['job_area'] ?><?= $job['job_exp'] ?><?= $job['education'] ?></p>
                                    <p class="text-gray-700 fw-light">
                                        <?= wpautop($job['job_description']) ?>
                                    </p>
                                    <?php
                                    foreach ($job['job_tag'] as $tag) :
                                    ?>
                                        <span class="bg-gray-300 rounded-pill small fw-light py-1 px-2 me-2"><?= $tag ?></span>
                                    <?php endforeach; ?>

                                    </div>
                                <?php
                            endif;
                            endforeach; ?>



                        </div>
                    </div>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>


<?php get_footer();
