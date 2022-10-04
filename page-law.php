<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$sec = get_post_meta(get_the_ID(), 'sec', true);
$sec_img_url = wp_get_attachment_image_url($sec['image'], 'full');
$lawers = get_post_meta(get_the_ID(), 'lawer', true);


echo do_shortcode('[ht_banner]');

?>

<section class="pt-2r pb-5r wp-image-1977" style="background:url(https://test.hitechtw.com/wp-content/uploads/2022/06/Frame-26.png)  center / cover no-repeat;">
	<div class="container mb-2r">
		<div class="row">
			<div class="col-lg-3 text-center text-md-center">
				<div class="lc-block">
					<img class="img-fluid" src="<?= $sec_img_url ?>" srcset="" sizes="" alt="" width="244" height="244">
				</div><!-- /lc-block -->
			</div><!-- /col -->
			<div class="col-lg-9 d-flex align-items-center">
				<div class="lc-block border-gray-900 ps-2r pe-2r" style="border-left:1rem solid">
					<h1 class="text-primary"><?= $sec['title'] ?></h1>
					<p class="text-gray-900"><?= $sec['subtitle'] ?></p>
				</div><!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>



    <?php foreach ($lawers as $lawer) :
        $phto = wp_get_attachment_image_url($lawer['photo'], 'full' );

        ?>
        <div class="container mb-2r">
		<div class="row">
			<div class="col-lg-3 d-flex align-items-center justify-content-center justify-content-md-start">
				<div class="lc-block">
					<img class="img-fluid" src="<?= $phto ?>" srcset="" sizes="" alt="" width="215" height="215">
				</div><!-- /lc-block -->
			</div><!-- /col -->
			<div class="col-lg-9 text-gray-900  px-2r px-md-1r">
				<div class="row align-items-center w-100">
					<p class="col-auto mb-0 text-nowrap" style="width:5.5rem;"><?= $lawer['job_title'] ?></p>
					<h4 class="col-auto" style="width:7.5rem;"><?= $lawer['name'] ?> </h4>
					<div class="col">
						<div class="bg-gray-500 w-100" style="height:7px"></div>
					</div>
				</div>

				<div class="row w-100 mt-2r">
					<div class="col-lg-5">
                    <?= $lawer['html1'] ?>
					</div>





					<div class="col-lg-7">
                    <?= $lawer['html2'] ?>
					</div>
				</div>



			</div><!-- /col -->
		</div>
	</div>
    <?php endforeach ?>

</section>


<?php get_footer();
