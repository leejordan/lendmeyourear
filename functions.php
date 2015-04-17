<?php
/* automatic feed links */
add_theme_support('automatic-feed-links');
add_theme_support( 'post-thumbnails' );

/* javascript */
wp_enqueue_script("jquery");
wp_enqueue_script("respond", get_template_directory_uri() . '/js/respond.min.js');

/* nav */
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/* comments */
function postHasComments( $type, $post_id ) {
    $comments = get_comments(array('status' => 'approve', 'comment_type' => $type, 'post_id' => $post_id));
    $comments = separate_comments( $comments );
    return 0 < count( $comments[ $type ] );
}

function themeComments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $comment_type = get_comment_type();
    if($comment_type == 'comment') {
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="pull-right date-wrap">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                    <?php printf(__('%1$s'), get_comment_date()) ?>
                </a>
            </div>
            <div class="pull-left author-wrap">
                <?php printf(__('<p class="author">%s</p>'), get_comment_author_link()) ?>
            </div>
            <div class="clearfix"></div>
            <div class="comment-body-wrap">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>
                <?php edit_comment_link(__('(edit)'),'  ','') ?>
                <div class="reply pull-right">
                    <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply ', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
<?php
    };}
?>

<?php
function themeTrackbacks($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $comment_type = get_comment_type();
    if($comment_type == 'trackback' || $comment_type == 'pingback') {
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="pull-left author-wrap">
                <?php printf(__('<p class="author">%s</p>'), get_comment_author_link()) ?>
            </div>
            <div class="clearfix"></div>
        </div>
<?php
    };}
?>
