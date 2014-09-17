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
            <a href="<?php bloginfo('url'); ?>/about">about</a> /
            <a href="<?php bloginfo('url'); ?>/contact">contact</a> /
            <a href="https://github.com/leejordan/">github</a>
        </p>
    </div>

    <?php if (is_single()) : ?>
        <div class="container">
            <script>
                jQuery( document ).ready(function() {
                    jQuery("#browse-submit").hide();
                    jQuery("#further-reading #browse").change(function() {
                        window.location = jQuery("#further-reading select option:selected").val();
                    })
                });
            </script>
            <?php $currentTitle = get_the_title(); ?>
            <?php $args = array( 'numberposts' => '100' ); ?>
            <?php $recent_posts = get_posts( $args ); ?>
            <form id="further-reading" action="" method="post">
                <label for="browse" class="sr-only">
                    Browse posts: 
                </label>
                <select name="browse" id="browse">
                    <?php foreach ($recent_posts as $post) : ?>
                        <?php if (is_single()) : ?>
                            <option value="<?php the_permalink(); ?>"
                                <?php if ($currentTitle === get_the_title()) : ?>
                                    selected="selected"
                                <?php endif ?>
                                >
                                <?php the_title(); ?>
                            </option>
                        <? endif ?>
                    <? endforeach ?>
                </select>
                <input type="submit" value="Go" id="browse-submit" />
            </form>
        </div>
    <?php endif ?>
