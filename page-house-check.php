<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$qas = get_post_meta( get_the_ID(), 'house_check_qa' );
$texts = get_post_meta( get_the_ID(), 'text_group' , true);

echo do_shortcode( '[ht_banner]' );

?>

<section class="my-3r">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="lc-block border-gray-900 ps-2r" style="border-left:1rem solid">
					<h1 class="text-primary"><?= $texts['title'] ?></h1>
					<p class="text-gray-900"><?= $texts['subtitle'] ?></p>
				</div>
			</div><!-- /col -->
		</div>
	</div>
</section>
<section class="mb-10r">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="lc-block">

                <div class="accordion hp" id="accordionPanelsStayOpenExample">
                        <?php foreach ($qas[0] as $key => $qa): ?>
						<div class="accordion-item">
							<h2 class="accordion-header" id="panelsStayOpen-heading-<?= $key ?>">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-<?= $key ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse-<?= $key ?>">
									<?= $qa['question'] ?>
								</button>
							</h2>
							<div id="panelsStayOpen-collapse-<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading-<?= $key ?>">
								<div class="accordion-body">
                                <?= wpautop($qa['answer']) ?>
								</div>
							</div>
						</div>
                        <?php endforeach ?>
					</div>
				</div><!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>
</section>


<?php get_footer();


