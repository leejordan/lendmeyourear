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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="SHORTCUT ICON" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body ontouchstart="" <?php body_class(); ?>>
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
        <div class="clearfix"></div>
    </div>
