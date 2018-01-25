<?php
	$sectiontitle = get_sub_field('section_title');
	$sectiondescription = get_sub_field('section_description');
	$titlecolor = get_sub_field('section_title_color');
?>

<section class="content-block three_columns_services container">
	<h2 class="section-title text-center"><?php echo $sectiontitle; ?></h2>
	<p class="text-center"><?php echo $sectiondescription; ?></p>

	<div class="row">

		<?php
		// loop through the repeater content
		while( have_rows('service_items') ): the_row(); 
			$title = get_sub_field('title');
			$image = get_sub_field('image');
			$category = get_sub_field('category');
			$link = get_sub_field('link');
		?>
		
		<div class="three_columns_services_item col-sm-4 text-center">
			<?php if ( $title ): ?>
				<h3><?php echo $title; ?></h3>
			<?php endif; ?>

			<?php if ( $category ): ?>
				<p><?php echo $category; ?></p>
			<?php endif; ?>

			<?php if ( $image ): ?>
				<a href="<?php echo $link; ?>"><img class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $title; ?>"></a>
			<?php endif; ?>
		</div>

		<?php endwhile; ?>

	</div>

</section>
