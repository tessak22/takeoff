<?php
	$sectiontitle = get_sub_field('section_title');
	$backgroundcolor = get_sub_field('background_color');
	$backgroundpattern = get_sub_field('background_pattern');
	$textcolor = get_sub_field('text_color');
	$titlecolor = get_sub_field('section_title_color');
?>

<section class="content-block three_columns <?php echo $backgroundpattern; ?> text-<?php echo $textcolor; ?> row" style="background-color: <?php echo $backgroundcolor; ?>">

	<div class="three_columns_content col-sm-10 col-sm-offset-1">

		<h2 class="section-title text-center" style="color: <?php echo $titlecolor; ?>"><?php echo $sectiontitle; ?></h2>

		<div class="row">
		<?php
		// loop through the repeater content
		while( have_rows('three_columns_content') ): the_row(); 
				$icon = get_sub_field('icon');
				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$readmore = get_sub_field('read_more');
		?>

			<div class="three_colum_content_block col-sm-4 text-center">
				<?php if ( $icon ): ?>
					<img src="<?php echo $title; ?>" alt="<?php echo $title; ?>">
				<?php endif; ?>

				<?php if ( $title ): ?>
					<h3><?php echo $title; ?></h3>
				<?php endif; ?>

				<?php if ( $content ): ?>
					<p><?php echo $content; ?></p>
				<?php endif; ?>

				<?php if ( $readmore ): ?>
					<p class="call-to-action"><a href="<?php echo $readmore; ?>">Read More</a></p>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>
		</div>

	</div>

</section>
