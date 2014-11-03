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
    <div class="panel-container">
        <div class="header">
            <h1>
                <a tabindex="1" class="pill" href="<?php bloginfo('url'); ?>">
                    <?php bloginfo('name'); ?>
                    <span class="subheader">
                        <?php bloginfo('description'); ?>
                    </span>
                </a>
            </h1>
            <div class="header-link-section">
                <a tabindex="2" class="pill" href="<?php bloginfo('url'); ?>/about">
                    about me
                </a>
            </div>
             <div class="clearfix"></div>
        </div>
    </div>

    <?php if (!is_single() && !is_page()) : ?>
        <div class="panel-container">
            <hr>
            <?php
                $tags = get_tags();
                if ($tags) {
                    foreach ($tags as $tag) {
                        echo '<a tabindex="4" data-filter="<?= $tag->id ?>" class="pill ' . $tag->name . (is_tag($tag->name) ? ' active' : null) . '" href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts tagged with %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> ';
                    }
                }
            ?>
            <hr>
        </div>
    <?php endif ?>
