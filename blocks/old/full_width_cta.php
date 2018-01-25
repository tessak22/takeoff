<?php
	$sectiontitle = get_sub_field('section_title');
	$titlecolor = get_sub_field('section_title_color');
	$backgroundcolor = get_sub_field('background_color');
	$backgroundpattern = get_sub_field('background_pattern');
	$textcolor = get_sub_field('text_color');
	$content = get_sub_field('content');
	$cta = get_sub_field('cta_text');
	$ctaurl = get_sub_field('cta_url');
?>

<section class="content-block full_width_cta flex <?php echo $backgroundpattern; ?> text-<?php echo $textcolor; ?> row" style="background-color: <?php echo $backgroundcolor; ?>">

	<div class="full_width_cta_content col-sm-5 col-sm-offset-1">

		<h3 class="section-title" style="color: <?php echo $titlecolor; ?>"><?php echo $sectiontitle; ?></h3>
		<?php echo $content; ?>

	</div>

	<div class="full_width_cta_button col-sm-2 col-sm-offset-3 pull-right">

		<a class="btn btn-default" href="<?php echo $ctaurl; ?>"><?php echo $cta; ?></a>

	</div>

</section>
