<?php

	$bigtext = get_sub_field('big_text');
	$content = get_sub_field('content');

?>
<section class="content-block big_text_with_content flex row">

	<div class="big_text">
		<div><?php echo $bigtext; ?></div>
	</div>

	<div class="big_text_content content">
		<?php echo $content; ?>
	</div>

</section>
