<?php
/* automatic feed links */
add_theme_support('automatic-feed-links');
add_theme_support( 'post-thumbnails' );

/* javascript */
wp_enqueue_script("jquery");
wp_enqueue_script("respond", get_template_directory_uri() . '/js/respond.min.js');

/* facebook and twitter meta data */
function socialMeta() {
    global $post;

    if(is_singular()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        $post_author_id = get_post_field( 'post_author', $post->ID );
        ?>

<meta property="og:title" content="<?php echo the_title(); ?>"/>
<meta property="og:description" content="<?php echo $excerpt; ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
<meta property="og:site_name" content="<?php echo bloginfo('name'); ?> - <?php echo bloginfo('description'); ?>"/>
<meta property="og:image" content="<?php echo $img_src[0]; ?>"/>

<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="<?php echo the_permalink(); ?>" />
<meta name="twitter:title" value="<?php echo the_title(); ?>" />
<meta name="twitter:description" value="<?php echo $excerpt; ?>" />
<meta name="twitter:image" value="<?php echo $img_src[0]; ?>" />
<meta name="twitter:site" value="@<?php echo get_the_author_meta( 'twitter', $post_author_id)?>" />

<?php
    } else {
?>

<meta property="og:title" content="<?php echo bloginfo('name'); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo bloginfo('url'); ?>" />
<meta property="og:description" content="<?php echo bloginfo('description'); ?>"/>

<?php
    }
}
add_action('wp_head', 'socialMeta', 5);

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    <h3>Extra profile information</h3>

    <table class="form-table">

        <tr>
            <th><label for="twitter">Twitter</label></th>

            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter username.</span>
            </td>
        </tr>

    </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
}

/* nav */
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/* custom text on home page */
function register_homepage_intro() {

    register_sidebar( array(
        'name'          => 'home_page_intro',
        'id'            => 'home_page_intro',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'register_homepage_intro' );

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
