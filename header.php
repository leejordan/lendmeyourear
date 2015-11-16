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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="SHORTCUT ICON" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('main');
      document.createElement('footer');
   </script>
<![endif]-->
</head>
<body ontouchstart="" <?php body_class(); ?>>
    <header class="container-sm theme-header" role="banner">
        <a class="theme-header__title" href="<?php bloginfo('url'); ?>">
            <?php bloginfo('name'); ?>
            <br>
            <span class="theme-header__title__subtitle">
                <?php bloginfo('description'); ?>
            </span>
        </a>
    </header>

    <?php if (is_home()) : ?>

        <section class="container-sm theme-intro" role="intro">
            <?php dynamic_sidebar( 'home_page_intro' ); ?>
        </section>

    <?php endif ?>
