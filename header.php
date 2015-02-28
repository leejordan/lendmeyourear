<?php
    if (isset($_POST['browse'])) {
         header("Location: $_POST[browse]");
    }
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>
<?php wp_title(' - ', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="SHORTCUT ICON" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="post-container">
        <div class="header">
            <h1>
                <a href="<?php bloginfo('url'); ?>">
                    <?php bloginfo('name'); ?>
                    <span class="subheader">
                        <?php bloginfo('description'); ?>
                    </span>
                </a>
            </h1>
            <div class="header-link-section">
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
        </div>
    </div>

    <?php /* begin the loop */ if (have_posts()) : ?>
        <?php if (is_archive() || is_home()) : ?>
            <div class="highlight-container">
                <div class="panel-container tag-list">
                    <?php
                        $tags = get_tags();
                        if ($tags) {
                            foreach ($tags as $tag) {
                                echo '<a data-filter="' . $tag->name . '" class="pill' . (is_tag($tag->name) ? ' active' : null) . '" href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts tagged with %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> ';
                            }
                        }
                    ?>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>
