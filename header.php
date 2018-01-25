<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and header section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tessak22
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<title><?php is_front_page() ? bloginfo('name') : wp_title(' - ' . get_bloginfo('name'), true, 'right'); ?></title>
	<?php wp_head(); ?>
	<?php takeoff_google_fonts('Montserrat:300,400,700|Lato:300,400,700'); ?>
	<?php if( have_rows('head_code_snippets', 'option') ): ?>
	    <?php while( have_rows('head_code_snippets', 'option') ): the_row(); ?>
	        <?php the_sub_field('code'); ?>
	    <?php endwhile; ?>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
	<header class="site-header">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Takeoff</a>
				</div>
				<?php
					wp_nav_menu( array(
					    'theme_location'    => 'main',
					    'depth'             => 2,
					    'container'         => 'div',
					    'container_class'   => 'collapse navbar-collapse',
					    'container_id'      => 'bs-example-navbar-collapse-1',
					    'menu_class'        => 'nav navbar-nav',
					    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					    'walker'            => new WP_Bootstrap_Navwalker(),
					) ); 
				?>
			</div>
		</nav>
	</header>
