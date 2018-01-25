<?php
/**
 * content output, list
 *
 * @package Takeoff
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<?php if (!is_search() && has_post_thumbnail()) : ?>
	        <figure class="blog-thumb col-sm-3">
	            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
	        </figure>
		<?php endif; ?>

		<div class="blog-content col-md-<?php echo (has_post_thumbnail()) ? '9' : '12'; ?>">
		    <header class="article-header">
		        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		        <?php
		        if ('post' == get_post_type()) {
		            get_template_part('nav', 'article-meta');
		        }
		        ?>
		    </header>
		    <?php the_excerpt(); ?>
		    <p class="call-to-action"><a href="<?php the_permalink(); ?>">Read Full Article</a></p>
		</div>
	</div>
</article>