<?php

	$image = get_sub_field('image');
	$content = get_sub_field('content');
	$layout = get_sub_field('layout');

	$bg_style = ( !empty($image) ) ? ' style="background-image: url('.$image.')"' : '';
?>
<section class="content-block image_with_content flex">
	<?php if ( $layout == "left" ): ?>
		<div class="content col-sm-5 col-sm-offset-1">
			<?php echo $content; ?>
		</div>

		<div class="image col-sm-6"<?php echo $bg_style; ?>>
			&nbsp;
			<div class="tablet-only">
				<img src="<?php echo $image; ?>">
			</div>
		</div>
	<?php endif; ?>

	<?php if ( $layout == "right" ): ?>
		<div class="image col-sm-6"<?php echo $bg_style; ?>>
			&nbsp;
			<div class="tablet-only">
				<img src="<?php echo $image; ?>">
			</div>
		</div>

		<div class="content col-sm-5 col-sm-offset-1">
			<?php echo $content; ?>
		</div>
	<?php endif; ?>
</section>
