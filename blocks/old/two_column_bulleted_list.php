<?php
	$sectiontitle = get_sub_field('section_title');
	$backgroundcolor = get_sub_field('background_color');
	$backgroundpattern = get_sub_field('background_pattern');
	$textcolor = get_sub_field('text_color');
	$titlecolor = get_sub_field('section_title_color');
	$content = get_sub_field('content');
?>

<section class="content-block two_column_bulleted_list <?php echo $backgroundpattern; ?> text-<?php echo $textcolor; ?> row" style="background-color: <?php echo $backgroundcolor; ?>">

	<div class="col-sm-10 col-sm-offset-1">
		<div class="row">

			<h2 class="section-title text-center" style="color: <?php echo $titlecolor; ?>"><?php echo $sectiontitle; ?></h2>

			<?php if ( $content ): ?>
				<?php echo $content; ?>
			<?php endif; ?>

		</div>
	</div>

</section>
