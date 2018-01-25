<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package takeoff
 */

?>

	<footer class="site-footer">
		<div class="mega-footer container">
			<div class="row">
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'footer-left' ); ?>
				</div>
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'footer-middle' ); ?>
				</div>
				<div class="col-sm-4">
					<?php dynamic_sidebar( 'footer-right' ); ?>
				</div>
			</div>
		</div>
		<div class="legal container">	
			<div class="row">
				<div class="copyright col-sm-6">
					&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?>
				</div>
				<div class="credits col-sm-6 pull-right">
					<a href="https://tessak22.com" target="_blank">Site Credits</a>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>

	<?php if( have_rows('body_code_snippets', 'option') ): ?>
	    <?php while( have_rows('body_code_snippets', 'option') ): the_row(); ?>
	        <?php the_sub_field('code'); ?>
	    <?php endwhile; ?>
	<?php endif; ?>

</body>
</html>
