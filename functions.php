<?php
/* automatic feed links */
add_theme_support('automatic-feed-links');
add_theme_support( 'post-thumbnails' );

function post_link_attributes($output) {
    $code = 'class="tag-pill"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
?>
