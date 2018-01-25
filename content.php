<?php
/**
 * default content output
 * page
 * single
 * attachment
 *
 * @package takeoff
 */

// get article title (only displayed if conditions are met below)
$article_title = takeoff_get_the_alternate_title();
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php if ('post' == get_post_type() || $article_title != get_the_title()) : ?>
        <header class="article-header">
            <?php
            if ('post' == get_post_type()) {
                get_template_part('nav', 'article-meta');
            }
            ?>
        </header>
    <?php endif; ?>

    <?php the_content(); ?>

    <?php
        if ('post' == get_post_type()) {
            get_template_part('author', 'meta');
        }
    ?>

    <?php comments_template(); ?>

</article>
