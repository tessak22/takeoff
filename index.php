<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package takeoff
*/

get_header(); ?>

<div class="document-header container-fluid">
	<div class="row">
		<div class="page-title col-sm-12">
		    <h1>
		      <?php
		        if (is_category()) {
		            single_cat_title();
		        } elseif (is_tag()) {
		            single_tag_title();
		        } elseif (is_author()) {
		            echo 'Author: ' . get_the_author();
		        } elseif (is_day()) {
		            echo 'Archive: ' . get_the_date('l, F j, Y');
		        } elseif (is_month()) {
		            echo 'Archive: ' . get_the_date('j Y');
		        } elseif (is_year()) {
		            echo 'Archive: ' . get_the_date('Y');
		        } elseif (is_search()) {
		            echo 'Results for: ' . get_search_query();
		        } elseif (is_home() && is_front_page()) {
		            // Settings > Reading > Front Page Displays > Your Latest Posts
		            echo get_bloginfo('name');
		        } elseif (is_home()) {
		            // Settings > Reading > Front Page Displays > Static Page > Posts Page
		            echo get_the_title(get_option('page_for_posts', true));
		        } else {
		            echo 'Archives';
		        }
		      ?>
		    </h1>
		</div>
	</div>
</div>

<section class="main-content container">
	<div class="row">
		<div class="content content-list col-sm-8" role="main">
			<?php
				if (have_posts()) {
				  while (have_posts()) {
				      the_post();
				      get_template_part('content', 'list');
				  }
				  get_template_part('nav', 'archive');
				} else {
				  get_template_part('content', 'none');
				}
			?>
		</div>
		<div class="sidebar col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>