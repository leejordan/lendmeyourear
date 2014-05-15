<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<?php wp_title(' - ', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href='http://fonts.googleapis.com/css?family=Signika+Negative:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="SHORTCUT ICON" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="header">
        <h1>
            <a href="<?php bloginfo('url'); ?>">
                <?php bloginfo('name'); ?>
                <span class="subheader">
                    <?php bloginfo('description'); ?>
                </span>
            </a>
        </h1>
        <p>
            <a href="<?php bloginfo('url'); ?>">home</a> /
            <a href="#">about</a> /
            <a href="#">contact</a> /
            <a href="https://github.com/leejordan/">github</a>
        </p>
    </div>
