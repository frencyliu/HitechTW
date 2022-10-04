<?php if ($listing->locations): ?>
<div class="row mx-0 py-1r w2dc-field w2dc-field-output-block w2dc-show-on-map <?php echo $content_field->printClasses($css_classes); ?>" data-location-id="<?php echo $location->id; ?>">
<!--ICON-->
<div class="col-auto d-flex align-items-center">
<?php if ($content_field->icon_image || !$content_field->is_hide_name): ?>
	<span class="w2dc-field-caption <?php w2dc_is_any_field_name_in_group($group); ?>">
		<?php if ($content_field->icon_image): ?>
		<span <?php echo $content_field->getIconImageTagParams(); ?>></span>
		<?php endif; ?>
		<?php if (!$content_field->is_hide_name): ?>
		<span class="w2dc-field-name"><?php echo $content_field->name?>:</span>
		<?php endif; ?>
	</span>
	<?php endif; ?>
</div>
<!--ADDRESS-->
<div class="col">


	<?php foreach ($listing->locations AS $location): ?>
		<address class="w2dc-location" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<?php if ($location->map_coords_1 && $location->map_coords_2): ?><span class="w2dc-show-on-map" data-location-id="<?php echo $location->id; ?>"><?php endif; ?>
                <h2 class="text-gray-900 fs-1r mt-0 mb-2"><?php echo $listing->title(); ?></h2>
<span class="w2dc-field-content w2dc-field-addresses">
			<?php echo $location->getWholeAddress(); ?>
			<?php if ($location->map_coords_1 && $location->map_coords_2): ?></span><?php endif; ?>
			<?php echo w2dc_get_distance($location); ?>
		</address>
	<?php endforeach; ?>
	</span>
    <a href="<?= get_permalink($listing->post->ID) ?>" class="mt-2 text-white btn btn-sm btn-primary">查看案例</a>
</div>



</div>
<?php endif; ?>

