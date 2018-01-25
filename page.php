<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package takeoff
 */

get_header(); ?>

<div class="document-header container-fluid">
	<div class="row">
		<div class="page-title col-sm-12">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>

<section class="main-content container">
	<div class="row">
		<div class="content col-sm-12" role="main">
			<?php get_template_part('variant', 'before-content'); ?>
			<?php
			  while (have_posts()) {
			      the_post();
			      get_template_part('template-parts/content');
			  }
			?>
			<?php get_template_part('variant', 'after-content'); ?>
		</div>
	</div>
</section>


<?php //each page builder has its own section
	get_template_part('inc', 'page-builder'); 
?>

<?php get_footer(); ?>
