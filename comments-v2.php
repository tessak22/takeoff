<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package takeoff
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'takeoff' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'takeoff' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'div',
					'short_ping' => true,
					'callback' => 'takeoff_comments_callback',
				) );
			?>
		</div><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'takeoff' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	//Disabling URL field
	function takeoff_disable_comment_url( $fields ) { 
	    unset( $fields['url'] );
	    return $fields;
	}
	add_filter('comment_form_default_fields','takeoff_disable_comment_url');

	//To edit defaults in comment field
	function takeoff_modify_comment_defaults( $defaults ) {
	    $defaults['comment_notes_after'] = '';
	    $defaults['comment_notes_before'] = '';
	    $defaults['title_reply'] = 'Leave A Comment';
	    $defaults['comment_field'] = '';

	    return $defaults;
	}
	add_filter( 'comment_form_defaults', 'takeoff_modify_comment_defaults' );

	//To modify structure of input fields and the wrapping html markup
	function takeoff_modify_comment_form_fields( $fields ){

	    $fields['author'] = '<div class="col-xs-12 col-sm-4 col-md-4 form-group">' 
	                . '<input class="form-control height-in" placeholder="Enter Name" id="author" name="author" type="text" value="' 
	                . esc_attr( $commenter['comment_author'] ) 
	                . '" size="30"' 
	                . $aria_req 
	                . ' /></div>';

	    $fields['email']  = '<div class="col-xs-12 col-sm-4 col-md-4 form-group">' 
	                . '<input class="form-control height-in" placeholder="Enter Email" id="email" name="email" ' 
	                . ( $html5 ? 'type="email"' : 'type="text"' ) 
	                . ' value="' 
	                . esc_attr(  $commenter['comment_author_email'] ) 
	                . '" size="30"' 
	                . $aria_req 
	                . ' /></div>';

	    $fields['comment_field'] = '<div class="col-xs-12 col-sm-12 col-md-12 form-group top-equal">
	                        <textarea class="form-control" placeholder="Comment" id="comment" name="comment" cols="45" rows="7" aria-required="true"></textarea>
	                        </div>';    

	    $fields['comment_notes_after'] = '<input type="submit" class="btn btn-1 btn-1a ct-us-send" id="submit-new" value="' . __( 'Submit' ) . '" />';

	    return $fields;
	}

	add_filter('comment_form_default_fields','takeoff_modify_comment_form_fields');
	?>

</div><!-- #comments -->
