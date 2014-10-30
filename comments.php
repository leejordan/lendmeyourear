<?php /* This comments.php file is mostly copied from TwentyTen, the default WordPress theme. */ ?>
<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. */
					wp_list_comments('callback=themeComments'); ?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<!-- Uncomment to show a "comments are closed" message when comments are closed for a page or post. 
    <p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
    -->
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php
	$comment_args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => __( 'Leave a Comment' ),
	  'title_reply_to'    => __( 'Leave a Comment to %s' ),
	  'cancel_reply_link' => __( 'Cancel Comment' ),
	  'label_submit'      => __( 'Submit Comment' ),

	  'comment_field' =>  '<div class="form-group"><label for="comment">Comment:</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true" placeholder="your comment"></textarea></div>',

	  'must_log_in' => '<p class="must-log-in">' .
	    sprintf(
	      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>',

	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',

	  'comment_notes_before' => null,

	  'comment_notes_after' => '<p class="form-allowed-tags"><small>wrap any code samples in &lt;pre class="prettyprint"&gt;...&lt;/pre&gt;</small></p>',

	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<div class="form-group">' .
	      '<p class="comment-form-author">' .
	      '<label for="author">' . __( 'Name: ', 'domainreference' ) . '</label> ' .
	      '<input id="author" class="form-control" placeholder="name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . ' /></p>' .
	      '</div>',

	    'email' =>
	      '<div class="form-group">' .
	      '<p class="comment-form-email">' .
	      '<label for="email">' . __( 'Email address:', 'domainreference' ) . '</label> ' .
	      '<input id="email" class="form-control" placeholder="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' /></p>' .
	      '</div>',
	    )
	  ),
	);
?>

<?php comment_form($comment_args); ?>

</div><!-- #comments -->
