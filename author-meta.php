<?php

$display_name = get_the_author_meta( 'display_name', $post->post_author ); 
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );
$user_description = get_the_author_meta( 'user_description', $post->post_author );
$author_avatar = get_avatar( get_the_author_meta('user_email') , 150 );
$author_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
$twitter = get_the_author_meta( 'twitter', $post->post_author );
$facebook = get_the_author_meta( 'facebook', $post->post_author );
?>
<div class="author-meta row">
	<div class="author-avatar col-sm-2">
		<a href="<?php echo $author_posts; ?>"><?php echo $author_avatar; ?></a>
	</div>
	<div class="author-details col-sm-10">
		<h2>About the Author</h2>
		<h4><a href="<?php echo $author_posts; ?>"><?php echo $display_name; ?></a></h4>
		<p><?php echo $user_description; ?></p>
		<!--enable if Yoast SEO is installed 
		<ul class="author-social list-inline">
			<li><a href="<?php //echo $twitter; ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
			<li><a href="<?php //echo $facebook; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
		</ul>-->
	</div>	
</div>