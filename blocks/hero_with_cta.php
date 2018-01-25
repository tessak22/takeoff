<?php
	
	$title = get_sub_field('title');
	$image = get_sub_field('image');
	$content = get_sub_field('content');
	$cta = get_sub_field('cta');
	$cta_url = get_sub_field('cta_url');
	$overlay = get_sub_field('overlay');
	$bg_style = ( !empty($image) ) ? 'url('.$image.')' : '';
?>
<section class="content-block hero_with_cta container-fluid cover-image" style="background-image: <?php if ( $overlay == "1" ): ?> url('<?php bloginfo('template_url') ?>/images/document-header-bg-gradient.png'),<?php endif; ?> <?php echo $bg_style; ?>">
	<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 text-center">
		<?php if ( $title ): ?>
			<h1><?php echo $title; ?></h1>
		<?php endif; ?>

		<?php if ( $content ): ?>
			<p><?php echo $content; ?></p>
		<?php endif; ?>

		<?php if ( $cta ): ?>
			<p><a class="btn btn-default" href="<?php echo $cta_url; ?>"><?php echo $cta; ?></a></p>
		<?php endif; ?>
	</div>
</section>
