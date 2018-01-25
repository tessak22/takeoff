<?php
/**
 * breadcrumb nav
 *
 * @package takeoff
 */

$breadcrumbs = takeoff_get_breadcrumbs();
?>

<?php if (!empty($breadcrumbs)) : ?>
    <nav class="nav-breadcrumbs col-md-12 hidden-print">
        <ul>
            <?php
            foreach ($breadcrumbs as $crumb) {
                echo '<li>';
                echo (isset($crumb['link']) && $crumb['link']) ? '<a href="' . $crumb['link'] . '">': '';
                echo $crumb['name'];
                echo (isset($crumb['link']) && $crumb['link']) ? '</a>' : '';
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
<?php endif; ?>
