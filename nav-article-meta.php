<?php
/**
 * meta for posts
 *
 * @package takeoff
 */

$meta_author = get_the_author();
$meta_date = get_the_date();
$meta_categories = get_the_category_list(', ');
$meta_tags = get_the_tag_list('', ', ');
$meta_comments = (comments_open() || '0' != get_comments_number()) ? get_comments_link() : '';
?>

<?php if ($meta_author || $meta_date || $meta_categories || $meta_tags) : ?>
    <nav class="nav-article-meta">
        <ul>
            <?php
            echo ($meta_author) ? '<li>By: ' . $meta_author . '</li>' : '';
            echo ($meta_date) ? '<li>' . $meta_date . '</li>' : '';
            echo ($meta_categories) ? '<li>Categories: ' . $meta_categories . '</li>' : '';
            echo ($meta_tags) ? '<li>Tags: ' . $meta_tags . '</li>' : '';
            echo ($meta_comments) ? '<li>Comments: <a href="' . $meta_comments . '">' . get_comments_number() . '</a></li>' : '';
            ?>
        </ul>
    </nav>
<?php endif; ?>
