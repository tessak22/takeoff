<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package takeoff
 */

get_header(); ?>

<header class="document-header container-fluid">
    <div class="row">
        <div class="page-title col-md-12">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</header>


<div class="main-content container-fluid">
    <div class="row">
        <div class="content col-sm-9" role="main">

            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('content');
                }
            ?>

            <?php if ('post' == get_post_type()) : ?>
                <footer class="article-footer">
                    <?php get_template_part('nav', 'posts'); ?>
                </footer>
            <?php endif; ?>
        </div>
    <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
