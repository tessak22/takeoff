<?php
/**
 * archive nav, for lists of posts
 *
 * @package takeoff
 */

/**
 * Get pagination nav
 * Show all items if 2-7 pages
 * Show following for 8 or more pages
 *     << 1 ... 4 5 6 ... 10 >>
 */
global $wp_query;
$big = 999999999;
$args = array(
    'base'               => str_replace($big, '%#%', get_pagenum_link($big)),
    'format'             => '?page=%#%',
    'total'              => $wp_query->max_num_pages,
    'current'            => max(1, get_query_var('paged')),
    'show_all'           => (8 > $wp_query->max_num_pages) ? true : false,
    'end_size'           => 1,
    'mid_size'           => 1,
    'prev_next'          => true,
    'prev_text'          => '&laquo',
    'next_text'          => '&raquo',
    'type'               => 'list',
    'add_args'           => false,
    'add_fragment'       => '',
    'before_page_number' => '',
    'after_page_number'  => ''
);
$pagination = paginate_links($args);
?>

<?php if ($pagination) : ?>
    <nav class="nav-pagination hidden-print">
        <?php echo $pagination; ?>
    </nav>
<?php endif; ?>
