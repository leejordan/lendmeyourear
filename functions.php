<?php
/* automatic feed links */
add_theme_support('automatic-feed-links');
add_theme_support( 'post-thumbnails' );

/* javascript */
wp_enqueue_script("jquery");

/* comments */
function themeComments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="pull-right">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                    <?php printf(__('%1$s'), get_comment_date()) ?>
                </a>
            </div>
            <div class="pull-left author-wrap">
                <?php printf(__('<p class="author">%s</p>'), get_comment_author_link()) ?>
            </div>
            <hr>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>
            <?php comment_text() ?>
            <?php edit_comment_link(__('(edit)'),'  ','') ?>
            <div class="reply pull-right">
                <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply ', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            <div class="clearfix"></div>
        </div>
<?php
    }

?>
