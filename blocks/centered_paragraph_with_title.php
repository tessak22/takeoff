<?php

	$title = get_sub_field('title');
	$content = get_sub_field('content');

?>
<section class="content-block centered_paragraph_with_title flex">
	<div class="content col-sm-10 col-sm-offset-1 text-center">
		<?php if ( $title ): ?>
			<h3><?php echo $title; ?></h3>
		<?php endif; ?>
		<?php echo $content; ?>
	</div>
</section>
