<?php

/**
 * Hide or show admin bar on frontend, false = hide
 */
show_admin_bar( false );

/**
 * Register Custom Navigation Walker for Bootstrap
 */
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Enqueue scripts and styles.
 */
function takeoff_scripts() {
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

    wp_enqueue_style( 'takeoff-style', get_stylesheet_uri() );

    wp_enqueue_style( 'fontawesome-css', 'https://use.fontawesome.com/releases/v5.0.0/css/all.css' );

    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', true );

    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3', true );

    wp_enqueue_script( 'takeoff-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

    wp_enqueue_script( 'takeoff-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'takeoff_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function takeoff_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'takeoff' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'takeoff' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Left', 'takeoff' ),
        'id'            => 'footer-left',
        'description'   => esc_html__( 'Add widgets here.', 'takeoff' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Middle', 'takeoff' ),
        'id'            => 'footer-middle',
        'description'   => esc_html__( 'Add widgets here.', 'takeoff' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Right', 'takeoff' ),
        'id'            => 'footer-right',
        'description'   => esc_html__( 'Add widgets here.', 'takeoff' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'takeoff_widgets_init' );

/**
 * Insert google fonts
 */
function takeoff_google_fonts($str_fonts = false)
{
    if ($str_fonts) {
        // build output
        $arr_fonts = explode('|', $str_fonts); // break apart each font set
        foreach ($arr_fonts as $font) {
            if (false === strpos($font, ':')) {
                $arr_sets[] = $font . ':400'; // has no specific type, use 400
            } else {
                if (false === strpos($font, ',')) {
                    $arr_sets[] = $font; // has only one specific type
                } else {
                    // has multiple types
                    $arr_family = explode(':', $font);
                    $arr_types = explode(',', $arr_family[1]);
                    foreach ($arr_types as $type) {
                        $arr_sets[] = $arr_family[0] . ':' . $type;
                    }
                }
            }
        }
        echo "<!--[if gt IE 8]><!--> \n"
           . "<link rel='stylesheet' href='//fonts.googleapis.com/css?family=" . $str_fonts . "' /> \n"
           . "<!--<![endif]--> \n"
           . "<!--[if lte IE 8]> \n";
        foreach ($arr_sets as $set) {
            echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=" . $set . "' /> \n";
        }
        echo "<![endif]--> \n";
    }
}

/**
 * Breadcrumbs array
 *
 * @return array Breadrumbs string name, optional string link
 */
function takeoff_get_breadcrumbs()
{
    $breadcrumbs = array();
    $page_on_front = get_option('page_on_front');
    $page_for_posts = get_option('page_for_posts', true);

    // if exists, initialize with front page
    if ($page_on_front && !is_front_page()) {
        $breadcrumbs[] = array(
            'name' => get_the_title($page_on_front),
            'link' => get_permalink($page_on_front)
        );
    }

    if ($page_for_posts && is_home()) {
        $breadcrumbs[] = array(
            'name' => get_the_title($page_for_posts)
        );
    } elseif (is_404()) {
        $breadcrumbs[] = array(
            'name' => 'Page Not Found'
        );
    } elseif (is_search()) {
        $breadcrumbs[] = array(
            'name' => 'Search Results'
        );
    } elseif ($page_for_posts && (is_single() || is_category() || is_tag() || is_author() || is_day() || is_month() || is_year())) {
        // set blog for single and archives
        $breadcrumbs[] = array(
            'name' => get_the_title($page_for_posts),
            'link' => get_permalink($page_for_posts)
        );
        if (is_category()) {
            $breadcrumbs[] = array(
                'name' => single_cat_title('', false)
            );
        } elseif (is_tag()) {
            $breadcrumbs[] = array(
                'name' => single_tag_title('', false)
            );
        }
    } elseif (!is_front_page()) {
        $ancestors = array_reverse(get_ancestors(get_the_ID(), 'page'));
        foreach ($ancestors as $ancestor) {
            $breadcrumbs[] = array(
                'name' => get_the_title($ancestor),
                'link' => get_permalink($ancestor)
            );
        }
        $breadcrumbs[] = array(
            'name' => get_the_title()
        );
    }

    return $breadcrumbs;
}

/**
 * Display an alternate title
 *
 * These are for seo when we need one "menu" title and another via title_alternate custom field
 *
 * @param string for output before title
 * @param string for output after title
 * @param bool will echo on true
 *
 * @return string title in some cases
 */
function takeoff_the_alternate_title($before = '', $after = '', $echo = true)
{
    // based on the_title() in /wp-includes/post-template.php
    $title = takeoff_get_the_alternate_title();
    if (0 == strlen($title)) {
        return;
    }
    $title = $before . $title . $after;
    if ($echo) {
        echo $title;
    } else {
        return $title;
    }
}
/**
 * Determine the alternate title
 *
 * @param mixed post that should be checked
 *
 * @return string alternate title
 */
function takeoff_get_the_alternate_title($post = 0)
{
    // based on get_the_title() in /wp-includes/post-template.php
    $post = get_post($post);
    $title = isset($post->post_title) ? $post->post_title : '';
    $id = isset($post->ID) ? $post->ID : 0;

    // alternate is found here
    $title_alternate = get_post_meta($id, 'title_alternate', true);
    $title = ('' != $title_alternate) ? $title_alternate : $title;

    if (!is_admin()) {
        if (!empty($post->post_password)) {
            $protected_title_format = apply_filters('protected_title_format', __('Protected: %s'));
            $title = sprintf($protected_title_format, $title);
        } elseif (isset($post->post_status) && 'private' == $post->post_status) {
            $private_title_format = apply_filters('private_title_format', __('Private: %s'));
            $title = sprintf($private_title_format, $title);
        }
    }
    return apply_filters('the_title', $title, $id);
}

/**
 * Comments Callback / Layout of the Comments List
 */
function takeoff_comments_callback($comment, $args, $depth){
   //checks if were using a div or ol|ul for our output
   $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
     <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
        <div class="comment-author-avatar">
            <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
        <div class="comment-content">
            <div class="comment-author-name">
                <?php printf( __( '%s ' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
            </div>
            <div class="comment-meta">
                <time datetime="<?php comment_time( 'c' ); ?>">
                    <?php
                       /* translators: 1: comment date, 2: comment time */
                       printf( __( '%1$s' ), get_comment_date( '', $comment ), get_comment_time() );
                    ?>
                </time> 
                <p><?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?></p>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                <?php endif; ?>
            </div>

            <div class="comment-details">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->
            <div class="comment-reply">
                <?php
                    comment_reply_link( array_merge( $args, array(
                       'add_below' => 'div-comment',
                       'depth'     => $depth,
                       'max_depth' => $args['max_depth'],
                       'before'    => '<p class="reply call-to-action">',
                       'after'     => '</p>'
                    ) ) );
                ?>
            </div>
        </div>
     </article><!-- .comment-body -->
     <?php
}
/**
 * Move Comment Field below Name & Email
 */
function takeoff_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'takeoff_move_comment_field_to_bottom' );
/**
 * Edit comment notification for non-logged in users
 */
function takeoff_pre_comment_text( $arg ) {
  $arg['comment_notes_before'] = "Your email address will not be published.";
  return $arg;
}
add_filter( 'comment_form_defaults', 'takeoff_pre_comment_text' );

/**
 * Add ACF Options for Theme Settings
 */
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}



